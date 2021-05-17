
const { src, dest, watch, parallel, series } = require('gulp');

const scss = require('gulp-sass');
const concat = require('gulp-concat');
const browserSync = require('browser-sync').create();
const uglify = require('gulp-uglify-es').default;
const autoprefixer = require('gulp-autoprefixer');
const imagemin = require('gulp-imagemin');
const del = require('del');
const gutil = require('gulp-util');
const ftp = require('vinyl-ftp');

function browsersync() {
    browserSync.init({
        server: {
            baseDir: "app/"
        }
    });
}

function cleanDist() {
    return del('dist')
}


function images() {
    return src('app/images/**/*')
        .pipe(imagemin([
            imagemin.gifsicle({ interlaced: true }),
            imagemin.mozjpeg({ quality: 75, progressive: true }),
            imagemin.optipng({ optimizationLevel: 5 }),
            imagemin.svgo({
                plugins: [
                    { removeViewBox: true },
                    { cleanupIDs: false }
                ]
            })
        ]))
        .pipe(dest('dist/images'))
}


function scripts() {
    return src([
        './node_modules/jquery/dist/jquery.js',
        './node_modules/slick-carousel/slick/slick.js',
        './node_modules/vivus/dist/vivus.js',
        './node_modules/wow.js/dist/wow.js',
        './node_modules/odometer/odometer.js',
        './node_modules/jquery-zoom/jquery.zoom.js',
        './node_modules/magnific-popup/dist/jquery.magnific-popup.js',
        'app/js/main.js'
    ])
        .pipe(concat('main.min.js'))
        // .pipe(uglify())
        .pipe(dest('app/js'))
        .pipe(dest('D:\\AWork\\portfolio\\wp-content\\themes\\portfolio\\assets\\js'))
        .pipe(browserSync.stream())
}

function styles() {
    return src([
        'app/scss/style.scss',
    ])
        .pipe(scss({ outputStyle: 'compressed' })) // expanded красивый перенос, compressed минифицированный
        .pipe(concat('style.min.css'))
        .pipe(autoprefixer({
            overrideBrowserslist: ['last 10 versions'],
            grid: true
        }))
        .pipe(dest('app/css'))
        .pipe(concat('style.css'))
        .pipe(dest('D:\\AWork\\portfolio\\wp-content\\themes\\portfolio'))
        .pipe(browserSync.stream())
}

function css() {
    return src([
        'node_modules/normalize.css/normalize.css',
        'node_modules/slick-carousel/slick/slick.css',
        'node_modules/wow.js/css/libs/animate.css',
        'node_modules/odometer/themes/odometer-theme-default.css',
        'node_modules/magnific-popup/dist/magnific-popup.css',
    ])
        .pipe(concat('_libs.scss'))
        .pipe(dest('app/scss'))
        .pipe(browserSync.stream())
}

function build() {
    return src([
        'app/css/style.min.css',
        'app/fonts/**/*',
        'app/js/main.min.js',
        'app/*.html'
    ], { base: 'app' })
        .pipe(dest('dist'))
}

function watching() {
    watch(['app/scss/**/*.scss'], styles);
    watch(['app/js/**/*.js', '!app/js/main.min.js'], scripts);
    watch(['app/*.html']).on('change', browserSync.reload);
}



function deploy () {

	var conn = ftp.create( {
		host:     'host',
		user:     'user',
		password: 'password',
		log:      gutil.log
	} );

	var globs = [
		'dist/**/*',
	];

	// using base = '.' will transfer everything to /public_html correctly
	// turn off buffering in gulp.src for best performance

	return src( globs, { base: '.', buffer: false } )
		.pipe( conn.newer( '/www/portfolio' ) ) // only upload newer files
		.pipe( conn.dest( '/www/portfolio' ) );

}

exports.styles = styles;
exports.css = css;
exports.watching = watching;
exports.browsersync = browsersync;
exports.scripts = scripts;
exports.images = images;
exports.cleanDist = cleanDist;
exports.deploy = deploy;


exports.build = series(cleanDist, images, build);
exports.default = parallel(css, styles, scripts, browsersync, watching);