/* jshint node:true */
module.exports = function (grunt) {
	'use strict';

	grunt.initConfig({
		// Setting folder templates.
		dirs: {
			js: 'js',
			css: 'css'
		},

		// JavaScript linting with JSHint.
		jshint: {
			options: {
				jshintrc: '.jshintrc'
			},
			all: [
				'Gruntfile.js',
				'<%= dirs.js %>/*.js',
				'!<%= dirs.js %>/*.min.js',
				'!<%= dirs.js %>/html5shiv.js',
				'!<%= dirs.js %>/jquery.cycle2.js',
				'!<%= dirs.js %>/jquery.cycle2.swipe.js'
			]
		},

		// Compress files and folders.
		compress: {
			options: {
				archive: 'spacious-modified.zip'
			},
			files: {
				src: [
					'**',
					'!.*',
					'!*.md',
					'!*.zip',
					'!.*/**',
					'!Gruntfile.js',
					'!package.json',
					'!node_modules/**'
				],
				dest: 'spacious-modified',
				expand: true
			}
		}
	});

	// Load NPM tasks to be used here
	grunt.loadNpmTasks('grunt-contrib-compress');
	grunt.loadNpmTasks('grunt-contrib-jshint');

	// Register tasks
	grunt.registerTask('default', ['jshint', 'compress']);
};
