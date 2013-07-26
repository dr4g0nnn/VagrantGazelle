Vagrant Gazelle Build
=====================
Combined with a vanilla Debian Wheezy box, this Vagrantfile and associated files
allows for the creation of a machine running [Gazelle][1] without any
interaction from the user.

Once set up, the gazelle source files will be present in `src/`, which is shared
to `/var/www/` on the machine. A port forward from port 80 on the guest to 8080
on the host will also be established.

Usage
-----
1.  Install a vagrant box for Debian Wheezy
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
