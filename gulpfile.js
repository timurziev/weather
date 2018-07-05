var gulp = require('gulp');
var sass = require('gulp-sass');

gulp.task('default', function(){
    //
});

gulp.task('sass', function () {
    return gulp.src('css/scss/*.scss')
        .pipe(sass({
            // outputStyle: 'compressed'
        })
        .on('error', sass.logError))
        .pipe(gulp.dest('css'));
});

gulp.task('watch', function () {
    gulp.watch('css/scss/*.scss', ['sass']);
});
