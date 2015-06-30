var gulp = require('gulp'),
    less = require('gulp-less'),
    jscs = require('gulp-jscs'),
    jshint = require('gulp-jshint'),

gulp.task('styles', function () {
  return gulp.src('assets/less/main.less')
  .pipe(less())
  .pipe(gulp.dest('assets/dist'));
});

gulp.task('lint', function () {
  return gulp.src('scripts/js/**/*.js')
  .pipe(jscs())
  .pipe(jshint())
  .pipe(jshint.reporter('jshint-stylish'));
});

gulp.task('build', ['styles']);
gulp.task('default', ['build']);
gulp.task('watch', ['build'], function () {
  gulp.watch('assets/less/**/*.less', ['styles']);
});
