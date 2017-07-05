
module.exports = function (grunt) {
    // Project configuration.
    grunt.initConfig({
        //pkg: grunt.file.readJSON('package.json'),
        sass: {
			dist: {
				files: {
					'style.css' : 'scss/underscores/style.scss'
				}
			}
		},

		watch: {
			css: {
				files: 'scss/**/*.scss',
				tasks: ['sass']
			}
		},

        addtextdomain: {
            options: {
                //i18nToolsPath: '/home/patryk/public_html/wpdev/trunk/tools/i18n', // Path to the i18n tools directory.
                //textdomain: 'pencil',    // Project text domain.
                updateDomains: true  // List of text domains to replace.
            },
            target: {
                files: {src: [
                    '*.php',
                    '**/*.php',
                    '!node_modules/**',
                    '!tests/**',
                    '!vendor/**'
                ]}
            }
        },

        makepot: {
            target: {
                options: {
                    cwd: '',                          // Directory of files to internationalize.
                    domainPath: '/languages',         // Where to save the POT file.
                    exclude: [],                      // List of files or directories to ignore.
                    include: [],                      // List of files or directories to include.
                    mainFile: '',                     // Main project file.
                    potComments: '',                  // The copyright at the beginning of the POT file.
                    potFilename: '',                  // Name of the POT file.
                    potHeaders: {
                        poedit: true,                 // Includes common Poedit headers.
                        'x-poedit-keywordslist': true // Include a list of all possible gettext functions.
                    },                                // Headers to add to the generated POT file.
                    processPot: null,                 // A callback function for manipulating the POT file.
                    type: 'wp-theme',                // Type of project (wp-plugin or wp-theme).
                    updateTimestamp: true,             // Whether the POT-Creation-Date should be updated without other changes.
                    updatePoFiles: false              // Whether to update PO files in the same directory as the POT file.
                }
            }
        },

        postcss: {
            options: {
              //map: true, // inline sourcemaps

              processors: [
                //require("postcss-import")(),
                //require("postcss-url")(),
                require('postcss-cssnext')(),
                //require('autoprefixer')({browsers: 'last 2 versions'}), // add vendor prefixes
                require('postcss-discard-duplicates')()
                //require('cssnano')(), // minify the result
                //require('rtlcss')() // right to left
                //require("postcss-browser-reporter")(),
                //require("postcss-reporter")(),
              ]
            },
            dist: {
              src: 'style.css'
            }
        },

        wpcss: {
            target: {
                options: {
                    commentSpacing: true // Whether to clean up newlines around comments between CSS rules.
                    //config: ''           // Which CSSComb config to use for sorting properties.
                },
                files: {'style.css' : 'style.css'}
                //files: {'rtl.css' : 'rtl.css'}
            }
        },
/*        rtlcss: {
            'default':{
                target: 'style.css',
                expand : true,
                //dest   : '',
                src    : 'rtl.css'
            }
        },
*/
        perfbudget: {
          default: {
            options: {
              url: 'http://THEME_SLUG.dev.limestreet.pl/',
              key: 'A.eac3cfd59f876326152463fcacabf220',
	      timeout: '600',
	      //repeatView: true,
	      //location: 'ec2-eu-central-1',
	      budget: {
		visualComplete: '10000',
		render: '10000',
		//requests: '100',
		SpeedIndex: '10000'
	      }
            }
          }
        },

        pagespeed: {
          options: {
            //nokey: true,
	    key: 'AIzaSyBnA8a5PGowgM6PqFVBUHyEKNrLtnEuJBA',
            url: 'http://THEME_SLUG.dev.limestreet.pl/'
          },
          desktop: {
            options: {
              url: 'http://THEME_SLUG.dev.limestreet.pl/',
	      paths: [ '/', 'shop/', '?s=post', '?s=gergeafer', 'blog/', 'blog/the-padded-seat-means-you-sit-comfortably/', 'blog/category/design/', 'blog/audio-post-abstrait/', 'blog/how-to-design-more-with-less/', 'blog/video-post-to-bring-you-joy/', 'blog/author/martha-inez/', 'blog/tag/wordpress/', 'cart/', 'product-category/summer-2016/', 'product/black-concrete-planter-for-succulents/' ],
              locale: 'en_GB',
              strategy: 'desktop',
              threshold: 20
            }
          },
	  mobile: {
            options: {
              url: 'http://THEME_SLUG.dev.limestreet.pl/',
	      paths: [ '/', 'shop/', '?s=post', '?s=gergeafer', 'blog/', 'blog/the-padded-seat-means-you-sit-comfortably/', 'blog/category/design/', 'blog/audio-post-abstrait/', 'blog/how-to-design-more-with-less/', 'blog/video-post-to-bring-you-joy/', 'blog/author/martha-inez/', 'blog/tag/wordpress/', 'cart/', 'product-category/summer-2016/', 'product/black-concrete-planter-for-succulents/' ],
              locale: 'en_GB',
              strategy: 'mobile',
              threshold: 20
            }
          }
        },
	
/*	uncss: {
	    dist: {
	      options: {
		stylesheet: ['style.css']
	      },
	      files: [{
		nonull: true,
		src: [''],
		dest: 'style.css'
	      }]
	    }
	}
*/
        //jshint: {
            //options: grunt.file.readJSON('.jshintrc'),
            //target: [
              //  '*.js',
                //'**/*.js',
                //'js/*.js',
                //'js/pencil.js',
                //'js/customizer.js',
                //'js/navigation.js',
                //'js/skip-link-focus-fix.js'
                //'!*.min.js',
                //'!**/*.min.js',
                //'!node_modules/**',
                //'!vendor/**',
                //'!tests/**',
                //'!Gruntfile.js',
                //'!**/jquery.magnific-popup.js',
                //'!**/smoothscroll.js',
                //'!**/theia-sticky-sidebar.js',
                //'!**/slick.js'
            //]
            //}
    });

    //grunt.loadNpmTasks( 'grunt-contrib-sass' );
    grunt.loadNpmTasks( 'grunt-wp-i18n' );
    grunt.loadNpmTasks( 'grunt-postcss' );
    grunt.loadNpmTasks( 'grunt-wp-css' );
    //grunt.loadNpmTasks( 'grunt-contrib-jshint' );
    //grunt.loadNpmTasks( 'grunt-rtlcss' );
    grunt.loadNpmTasks( 'grunt-perfbudget' );
    grunt.loadNpmTasks( 'grunt-pagespeed' );
    grunt.loadNpmTasks( 'grunt-sass' );
    grunt.loadNpmTasks( 'grunt-contrib-watch' );
    //grunt.loadNpmTasks( 'grunt-uncss' );
    //grunt.registerTask('default', [ 'watch']);
    grunt.registerTask('default', [ 'addtextdomain', 'makepot', 'postcss', 'wpcss']);

};
