Vagrant Gazelle Build
=====================
Combined with a vanilla Debian Wheezy box, this Vagrantfile and associated files
allows for the creation of a machine running [Gazelle][1] without any
interaction from the user.

Once set up, the gazelle source files will be present in `src/`, which is shared
to `/var/www/` on the machine. A port forward from port 80 on the guest to 8080
on the host will also be established.

__PLEASE NOTE:__ This setup is not suitable for use in production; all boxes
created by this set up are identical, and therefore passwords & similar used in
Gazelle & MySQL are known to all.

Usage
-----
1.  Install a vagrant box for Debian Wheezy or [build your own][7]
2.  Get the source:
     ```
         git clone git@github.com:dr4g0nnn/VagrantGazelle.git
     ```
3.  Boot the box:
     ```
         cd VagrantGazelle; vagrant up
     ```
4.  Wait, while the install script sets everything up.
5.  Log into your newly set up box as usual:
     ```
         vagrant ssh
     ```   

Windows specific configuration  
------------------------------
On windows it might fail due to no vbox addons being installed with the error  
```
Vagrant was unable to mount VirtualBox shared folders. This is usually
because the filesystem "vboxsf" is not available. This filesystem is
made available via the VirtualBox Guest Additions and kernel module.
Please verify that these guest additions are properly installed in the
guest. This is not a bug in Vagrant and is usually caused by a faulty
Vagrant box. For context, the command attempted was:

mount -t vboxsf -o uid=1000,gid=1000 var_www_ /var/www

The error output from the command was:

mount: unknown filesystem type 'vboxsf'
````
It can be fixed by installing vagrant-vbguest

```
vagrant plugin install vagrant-vbguest
vagrant destroy && vagrant up
```  

If the above doesn't seem to work for you, You can try editing the `config.vm.synced_folder` to the following

```
config.vm.synced_folder "src/", "/var/www/", nfs: true
```

Building your own Debian Wheezy base box
----------------------------------------

If you, like me, do not trust random Vagrant boxes found on the internet, you
can create your own easily using [Veewee][6].

This method requires Ruby to be installed.

```
    git clone https://github.com/jedi4ever/veewee.git && cd veewee
    gem install bundler
    bundle install --path=.bundle

    bundle exec veewee vbox define 'debian-wheezy' 'Debian-7.1.0-amd64-netboot'
    bundle exec veewee vbox build 'debian-wheezy'
    bundle exec veewee vbox export 'debian-wheezy'

    vagrant box add 'debian-wheezy' 'debian-wheezy.box'
```

__NOTE:__ Here Veewee is shown being checked out and used directly rather than
installed, this is because at the time of writing the copy of Veewee in the gem
repository was not able to be installed.

Contributing
------------

Additions, fixes & improvements to this project are welcome:

1. [Fork][4] this repository
2. Make your changes
3. Commit them to your fork
4. Send me a [pull request][5]!

License
-------

These files are available under the terms of the MIT license; see [LICENSE][2]
or [MIT license at opensource.org][3].

[1]: https://github.com/WhatCD/Gazelle "Gazelle"
[2]: LICENSE "License"
[3]: http://opensource.org/licenses/MIT "MIT License"
[4]: https://help.github.com/articles/fork-a-repo "Forking"
[5]: https://help.github.com/articles/using-pull-requests "Pull Requests"
[6]: https://github.com/jedi4ever/veewee "Veewee"
[7]: #building-your-own-debian-wheezy-base-box
