/**
 * Version File for Grunt
 *
 * @package zerif-lite
 */
/* jshint node:true */
// https://github.com/kswedberg/grunt-version
module.exports = {
    package_ti: {
        options: {
            prefix: '"version"\\:\\s+"'
        },
        src: 'package.json'
    },
    style: {
        options: {
            prefix: 'Version\\:\\s+'
        },
        src: 'style.css'
    },
    functions: {
        options: {
            prefix: 'ZERIF_LITE_VERSION\', \''
        },
        src: 'functions.php'
    }
};