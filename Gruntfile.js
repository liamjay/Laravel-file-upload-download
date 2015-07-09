module.exports = function(grunt) {
	require('load-grunt-tasks')(grunt);

	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),

		recess: {
			my_target: {
				options: {
					compile: true,
					compress: true
				},

				files: {
					'public/css/onecomponent.min.css': ['public/less/app.less']
				}
			}
		},

		watch: {
			styles: {
				files: ['public/less/*.less'],
				tasks: ['recess']
			}
		}
	});

	grunt.registerTask('default', ['watch']);
	grunt.registerTask('all', ['recess']);
};