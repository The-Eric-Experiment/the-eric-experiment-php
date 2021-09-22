const { src, dest } = require('gulp');
const { exclude } = require('gulp-ignore');
const path = require("path");

exports.build = function (destination) {
  return () => src(path.join(__dirname, "./**/*.*"))
    .pipe(exclude("gulpfile.js"))
    .pipe(exclude(".gitignore"))
    .pipe(dest(destination));
};