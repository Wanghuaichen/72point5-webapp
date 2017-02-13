module.exports = function(grunt) {
	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),
		sass: {
			dist: {
				files: {
					'public/style.css' : 'public/sass/style.scss'
				}
			}
		},
		watch: {
			css: {
				files: 'public/sass/**/*scss',
				tasks: ['sass']
			}
		}
	});
	grunt.loadNpmTasks('grunt-contrib-sass')
	grunt.loadNpmTasks('grunt-contrib-watch')
	grunt.registerTask('default', ['watch']);
}
