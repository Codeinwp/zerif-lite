/* jshint node:true */
/* global require, process */
var timeGrunt = require('time-grunt');
var path = require('path');
var loadGruntConfig = require('load-grunt-config');

module.exports = function (grunt) {
    'use strict';

    timeGrunt(grunt);

    var project = {
        paths: {
            get config() {
                return this.grunt;
            },
            css: 'css/',
            grunt: 'grunt/',
            images: 'images/',
            js: 'js/',
            languages: 'languages/',
            logs: 'logs/'
        },
        files: {
            css: [
                '*.css',
                'css/*.css',
                '!css/*.min.css',
                '!css/vendor/*.css'
            ],
            js: [
                '*.js',
                'grunt/**/*.js',
                'js/**/*.js',
                'js/**/*.js',
                '!js/**/*.min.js',
                '!js/vendor/*.js'
            ],
            php: [
                '**/*.php',
                '!node_modules/**/*.php'
            ],
            get config() {
                return project.paths.config + '*.js';
            },
            grunt: 'Gruntfile.js'
        },
        pkg: grunt.file.readJSON('package.json')
    };

    loadGruntConfig(grunt, {
        configPath: path.join(process.cwd(), project.paths.config),
        data: project,
        jitGrunt: {
            staticMappings: {
            }
        }
    });
};