const { src, dest, series } = require("gulp");
const webpack = require("webpack");
const gulpWebpack = require("webpack-stream");
const rename = require("gulp-rename");
const path = require("path");
const sass = require("gulp-sass")(require("sass"));

function buildStyles(destination) {
  return () =>
    src(path.join(__dirname, "./modern/scss/index.scss"))
      .pipe(sass({ outputStyle: "compressed" }).on("error", sass.logError))
      .pipe(
        rename(function (path) {
          // Updates the object in-place
          path.basename = "modern";
        })
      )
      .pipe(dest(path.join(destination, "./css")));
}

function copyPhp(destination) {
  return () =>
    src(path.join(__dirname, "./modern/**/*.php")).pipe(dest(destination));
}

function copyPublic(destination) {
  return () =>
    src(path.join(__dirname, "./modern/public/*.*")).pipe(
      dest(path.join(destination, "./public"))
    );
}

function buildClientJs(destination) {
  return () =>
    src(path.join(__dirname, "./modern/client/index.js"))
      .pipe(
        gulpWebpack(
          {
            mode: "production",
            devtool: "cheap-source-map",
            resolve: {
              // Add `.ts` as a resolvable extension.
              extensions: [".vue", ".js"],
              // alias: { vue: "vue/dist/vue.esm.js" },
            },
            module: {
              rules: [],
            },
            plugins: [
              new webpack.ProvidePlugin({
                $: "jquery",
                jQuery: "jquery",
              }),
              // make sure to include the plugin!
              // new VueLoaderPlugin(),
            ],
          },
          webpack
        )
      )
      .pipe(
        rename(function (path) {
          // Updates the object in-place
          path.basename = "client";
        })
      )
      .pipe(dest(path.join(destination, "./js")));
}

exports.build = function (destination) {
  const templatePath = path.join(destination, "templates/modern");
  return series(
    copyPhp(templatePath),
    buildStyles(templatePath),
    copyPublic(templatePath),
    buildClientJs(templatePath)
  );
};
