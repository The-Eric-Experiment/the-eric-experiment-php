const { src, dest } = require('gulp');
const { exclude } = require('gulp-ignore');
const path = require("path");

exports.build = function (destination) {
  return () => src(path.join(__dirname, "./src/**/*.*"))
    .pipe(exclude("gulpfile.js"))
    .pipe(exclude(".gitignore"))
    .pipe(dest(path.join(destination, "templates/retro")));
};