const { src, dest, series } = require("gulp");
const webpack = require("webpack");
const gulpWebpack = require("webpack-stream");
const rename = require("gulp-rename");
const path = require("path");
const sass = require("gulp-sass")(require("sass"));

function buildStyles(destination) {
  return () =>
    src(path.join(__dirname, "./src/scss/index.scss"))
      .pipe(sass({ outputStyle: "compressed" }).on("error", sass.logError))
      .pipe(
        rename(function (path) {
          // Updates the object in-place
          path.basename = "modern";
        })
      )
      .pipe(dest(path.join(destination, "./css")));
}

function buildClientJs(destination) {
  return () =>
    src(path.join(__dirname, "./src/client/index.js"))
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

exports.build = function () {
  const templatePath = path.join(__dirname, "./src");
  return series(buildStyles(templatePath), buildClientJs(templatePath));
};
