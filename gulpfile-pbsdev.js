var gulp = require("gulp");
var browserSync = require("browser-sync").create();
var sass = require("gulp-sass");
//var autoprefixer = require('gulp-autoprefixer');

gulp.task("browser-sync", function () {
  browserSync.init({
    proxy: "https://pbs.countzero.xyz",
  });
});

gulp.task("sass", function () {
  gulp
    .src("./scss/*.scss")
    .pipe(sass().on("error", sass.logError))
    //.pipe(autoprefixer())
    .pipe(gulp.dest("./css"));
});

gulp.task("watch", function () {
  gulp.watch("*.php").on("change", browserSync.reload);
  gulp.watch("inc/*.php").on("change", browserSync.reload);
  gulp.watch("template-parts/*.php").on("change", browserSync.reload);
  gulp.watch("templates/*.php").on("change", browserSync.reload);
  gulp.watch("./scss/*.scss", ["sass"]);
  gulp.watch("css/*.css").on("change", browserSync.reload);
});

gulp.task("default", ["browser-sync", "watch"]);
