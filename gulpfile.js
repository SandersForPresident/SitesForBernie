var argv = require('minimist')(process.argv.slice(2)),
    gulp = require('gulp'),
    less = require('gulp-less'),
    jscs = require('gulp-jscs'),
    jshint = require('gulp-jshint'),
    concat = require('gulp-concat'),
    uglify = require('gulp-uglify'),
    gulpif = require('gulp-if');

gulp.task('styles', function () {
  return gulp.src('assets/less/main.less')
  .pipe(less())
  .pipe(gulp.dest('assets/dist'));
});

gulp.task('js:client', function () {
  gulp.src('assets/js/**/*.js')
  .pipe(concat('main.js'))
  .pipe(gulpif(argv.production, uglify()))
  .pipe(gulp.dest('assets/dist'));
})

gulp.task('js:vendor', function () {
  gulp.src([])
  .pipe(concat('vendor.js'))
  .pipe(gulpif(argv.production, uglify()))
  .pipe(gulp.dest('assets/dist'));
});

gulp.task('lint', function () {
  return gulp.src('scripts/js/**/*.js')
  .pipe(jscs())
  .pipe(jshint())
  .pipe(jshint.reporter('jshint-stylish'));
});

gulp.task('build', ['styles', 'js:client', 'js:vendor']);
gulp.task('default', ['build']);
gulp.task('watch', ['build'], function () {
  gulp.watch('assets/less/**/*.less', ['styles']);
  gulp.watch('assets/js/**/*.js', ['js:client']);
});
