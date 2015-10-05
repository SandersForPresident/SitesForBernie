# SandersForPresident WordPress Theme

![build status](https://api.travis-ci.org/SandersForPresident/WordPress.svg)

This is a reusable theme for Bernie Sanders campaign microsites.

## Installing

Clone the git repo `git@github.com:SandersForPresident/Wordpress.git` and then rename the directory to the name of your theme or website.

* Install and Activate https://wordpress.org/plugins/advanced-custom-fields/

## Using Vagrant for local development

Vagrant will create a virtual machine for local development.  You will need to install three packages:

* [Vagrant](http://www.vagrantup.com/downloads.html)
* [Anisble](http://docs.ansible.com/intro_installation.html)
* [VirtualBox](https://www.virtualbox.org/wiki/Downloads)

After setting up these three packages, you will be able to run the following command locally to create your own virutal server:

```shell
vagrant up
```

After it downloads a linux VM and configures it, you should be able to point your browser at http://192.168.33.10/ and get a local copy of the theme running.  The WordPress admin will be setup with a username of `admin` and a password of `secret`.

If you want to look around on the server you can `vagrant ssh` and to shut off the server when you aren't using it you can `vagrant halt`.  If you want to destroy the VM entirey (start fresh, wipe database, etc) you can `vagrant destroy`.

You can customize the installation a bit by looking at the [ansible variables](ansible/group_vars/all.yml)

## Theme Development

SandersForPresident uses [gulp][gulp] as a build system and [bower][bower] as a front end package manager.

### Install gulp and bower
Building the theme requires [node.js][node]. We recommend you update to the latest version of npm: `npm install -g npm@latest`.

From the command line:

1. Install [gulp][gulp] and [bower][bower] globally with `npm install -g gulp bower`
2. Run `npm install` in the theme directory
3. Run `bower install`

You now have all the necessary dependencies to run the build process.

### Building the project
The following gulp tasks are available:
- `gulp build` -- Build the assets
- `gulp lint` -- Validate the JS
- `gulp watch` -- Rebuild the assets when the source files change

## Contributing
Contributions are encouraged and welcome by everyone! We have [contributing guidelines][contributing] to help get you started.

[gulp]:http://gulpjs.com/
[bower]:http://bower.io/
[node]:https://nodejs.org/download/
[contributing]:https://github.com/SandersForPresident/Wordpress/blob/master/CONTRIBUTING.md
