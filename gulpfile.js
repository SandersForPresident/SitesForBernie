var gulp = require('gulp'),
    less = require('gulp-less');

gulp.task('styles', function () {
  gulp.src('assets/less/main.less')
  .pipe(less())
  .pipe(gulp.dest('assets/dist'));
});

gulp.task('build', ['styles']);
gulp.task('default', ['build']);
gulp.task('watch', ['build'], function () {
  gulp.watch('assets/less/**/*.less', ['styles']);
});
