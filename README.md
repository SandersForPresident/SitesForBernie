# SandersForPresident WordPress Theme

![build status](https://api.travis-ci.org/SandersForPresident/Wordpress.svg)

This is a reusable theme for Bernie Sanders campaign microsites.

## Installing

Clone the git repo `git@github.com:SandersForPresident/Wordpress.git` and then rename the directory to the name of your theme or website.

## Theme Development

SandersForPresident uses [gulp](gulp) as a build system and [bower](bower) as a front end package manager.

### Install gulp and bower
Building the theme requires [node.js](node). We recommend you update to the latest version of npm: `npm install -g npm@latest`.

From the command line:

1. Install [gulp](gulp) and [bower](bower) globally with `npm install -g gulp bower`
2. Run `npm install` in the theme directory
3. Run `bower install`

You now have all the necessary dependencies to run the build process.

### Building the project
The following gulp tasks are available:
- `gulp build` -- Build the assets
- `gulp lint` -- Validate the JS
- `gulp watch` -- Rebuild the assets when the source files change

## Contributing
Contributions are encouraged and welcome by everyone! We have [contributing guidelines](contributing) to help get you started.

[gulp]:(http://gulpjs.com/)
[bower]:(http://bower.io/)
[node]:(https://nodejs.org/download/)
[contributing]:(https://github.com/SandersForPresident/Wordpress/blob/master/CONTRIBUTING.md)
