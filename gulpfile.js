const { series, src, dest } = require("gulp");
const path = require("path");
const webpack = require("webpack");
const gulpWebpack = require("webpack-stream");
const rename = require("gulp-rename");

function buildClientJs(destination) {
  return () =>
    src(path.join(__dirname, "./scripts/tee.js"))
      .pipe(
        gulpWebpack(
          {
            mode: "production",
            devtool: false,
            resolve: {
              // Add `.ts` as a resolvable extension.
              extensions: [".vue", ".js"],
              // alias: { vue: "vue/dist/vue.esm.js" },
            },
            module: {
              rules: [
                {
                  test: /\.css$/,
                  use: ["style-loader", "css-loader"],
                },
              ],
            },
            plugins: [
              // new webpack.ProvidePlugin({
              //   $: "jquery",
              //   jQuery: "jquery",
              // }),
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

const destination = path.join(__dirname, "./dist");

// exports.build = build;
exports.default = series(
  // buildStyles(templatePath),
  buildClientJs(destination)
);
