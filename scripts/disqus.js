import { css, appendCss } from "./css";

appendCss(css`
  #disqus_thread {
    color: #ffffff;
    /* background: url(/templates/modern/public/Fine_Speckled0001A16B.gif); */
    // color: $font-dark-grey;
    /* font-family: $font-family; */
    margin-top: 8px;
  }
`);

(function () {
  var d = document;
  var s = d.createElement("script");
  s.src = "https://the-eric-experiment.disqus.com/embed.js";
  s.setAttribute("data-timestamp", +new Date());
  (d.head || d.body).appendChild(s);
})();
