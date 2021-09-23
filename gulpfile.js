const { series, src, dest } = require("gulp");
const clean = require("gulp-clean");
const { build: buildEngine } = require("./blog-engine/gulpfile");
const { build: buildTemplateRetro } = require("./template-retro/gulpfile");
const { build: buildTemplateModern } = require("./template-modern/gulpfile");
const path = require("path");

const buildFolder = path.join(__dirname, "./build");

// The `clean` function is not exported so it can be considered a private task.
// It can still be used within the `series()` composition.
function empty() {
  // body omitted
  return src("./build/", { read: false }).pipe(clean());
}

function configs() {
  return src("./configs/*.php").pipe(dest(buildFolder));
}

const build = series(
  buildEngine(buildFolder),
  buildTemplateRetro(buildFolder),
  buildTemplateModern(buildFolder),
  configs
);

exports.build = build;
exports.default = series(empty, build);
