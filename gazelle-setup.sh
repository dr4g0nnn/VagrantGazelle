#!/bin/sh

if [ -f ~/.runonce ]
then
    echo "Gazelle setup already run, skipping..."
    exit
fi
touch ~/.runonce

echo mysql-server mysql-server/root_password password em%G9Lrey4^N | sudo debconf-set-selections
echo mysql-server mysql-server/root_password_again password em%G9Lrey4^N | sudo debconf-set-selections

sudo apt-get update
sudo apt-get install -y git nginx memcached mysql-client mysql-server php5-fpm php5-memcached php5-memcache php5-mcrypt php5-mysql php5-cli sphinxsearch
sudo /etc/init.d/php5-fpm restart

#sed -i s/'index index.html index.htm;'/'index index.html index.htm index.php;'/ /etc/nginx/sites-available/default

sudo cp /vagrant/nginx.conf /etc/nginx/sites-available/default
sudo cp /vagrant/php.ini /etc/php5/fpm/php.ini

echo "START=yes" | sudo tee /etc/default/sphinxsearch > /dev/null

sudo mkdir -p /var/www/tmp
sudo git clone https://github.com/WhatCD/Gazelle.git /var/www/tmp
sudo rsync -a /var/www/tmp/ /var/www/
sudo rm -rf /var/www/tmp

mysql -uroot -pem%G9Lrey4^N < /var/www/gazelle.sql

sudo cp /vagrant/sphinx.conf /var/www/
sudo mkdir -p /var/data/sphinx
sudo mkdir -p /var/log/searchd
sudo ln -s /var/www/sphinx.conf /etc/sphinxsearch/sphinx.conf
sudo indexer -c /etc/sphinxsearch/sphinx.conf --all
sudo chown -R sphinxsearch /var/data/sphinx
sudo chown -R sphinxsearch /var/log/searchd

sudo memcached -d -m 64 -s /var/run/memcached.sock -a 0777 -t16 -C -u root
echo '#!/bin/sh\nmemcached -d -m 64 -s /var/run/memcached.sock -a 0777 -t16 -C -u root' > /etc/init.d/memcached
chmod +x /etc/init.d/memcached
update-rc.d memcached defaults

sudo cp /vagrant/config.php /var/www/classes/config.php

sudo cp /vagrant/crontab /etc/cron.d/

sudo /etc/init.d/nginx restart
