module.exports = function(grunt) {
  require('jit-grunt')(grunt);
  var EOL = require('os').EOL;
  var config = {
    pkg: grunt.file.readJSON('package.json'),
    sass: {
      dist: {
        options: {
          style: "compressed"
        },
        files: {
          "assets/css/woowrap.css": "assets/sass/wrap.scss",
        }
      }
    },
    watch: {
      styles: {
        files: ['assets/sass/*.scss'], // which files to watch
        tasks: ['sass'],
        options: {
          nospawn: true
        }
      }
    },
  };
  grunt.initConfig(config);
  grunt.registerTask('default', ['sass', 'watch']);
};



