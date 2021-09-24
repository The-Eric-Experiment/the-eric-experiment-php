const { series, src, dest } = require("gulp");
const {
  build: buildTemplateModern,
} = require("./template-modern/gulpfile.dev");
const path = require("path");

function configs() {
  return src(["./configs/*.*", "./configs/.htaccess"]).pipe(
    dest(path.join(__dirname, "blog-engine"))
  );
}

const build = series(buildTemplateModern(), configs);

exports.build = build;
exports.default = series(build);
