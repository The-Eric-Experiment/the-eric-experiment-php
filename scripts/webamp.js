import { css, appendCss } from "./css";

appendCss(css`
  #webamp-div {
    position: relative;
    width: 100%;
    height: 300px;
    background-color: #3a6ea5;
    overflow: hidden;
  }
`);

function loadWebamp(callback) {
  if (!document.querySelector("table#header")) {
    setTimeout(() => loadWebamp(callback), 100);
    return;
  }

  let previousHeight = 0;
  let timeout;

  // wait for table#header to reach its maximum height
  // by checking if it's growing and each height doing a timeout
  // that is disabled if it grows more, if the timeout reaches the end
  // then we continue loading the webamp script
  // we can use the resize observer each time it's called it resets the timeout
  const observer = new ResizeObserver((entries) => {
    const header = document.querySelector("table#header");
    const currentHeight = header.clientHeight;
    if (currentHeight > previousHeight) {
      console.log(currentHeight, previousHeight);
      previousHeight = currentHeight;
      clearTimeout(timeout);
      timeout = setTimeout(() => {
        observer.disconnect();
        const script = document.createElement("script");
        script.src = "/public/js/webamp.bundle.min.js";
        script.onload = callback;
        script.onerror = function () {
          console.error("Failed to load Webamp script.");
        };
        document.head.appendChild(script);
      }, 1000);
    }
  });

  observer.observe(document.querySelector("table#header"));
}

loadWebamp(function () {
  const tables = Array.from(document.querySelectorAll("table.music-playlist"));
  const initialTracks = tables.flatMap((table) => {
    const trs = Array.from(table.getElementsByTagName("tr"));
    return trs.flatMap((tr) => {
      const url = tr.dataset.url?.replace(/\.rpm$/, ".mp3");

      if (!url) {
        return [];
      }

      return [
        {
          metaData: {
            artist: tr.dataset.artist,
            title: tr.dataset.title,
            duration:
              typeof tr.dataset.duration === "string"
                ? parseFloat(tr.dataset.duration)
                : tr.dataset.duration,
          },
          url,
        },
      ];
    });
  });

  const [table1, ...restOfTables] = tables;

  const webampDiv = document.createElement("div");
  webampDiv.id = "webamp-div";

  table1.replaceWith(webampDiv);

  restOfTables?.forEach((t) => t.remove());

  if (window.Webamp && Webamp.browserIsSupported()) {
    const webamp = new Webamp({
      initialTracks,
      __butterchurnOptions: {
        importButterchurn: () => {
          // Only load butterchurn when music starts playing to reduce initial page load
          return import("butterchurn");
        },
        getPresets: async () => {
          // Load presets from preset URL mapping on demand as they are used
          const resp = await fetch(
            // NOTE: Your preset file must be served from the same domain as your HTML
            // file, or served with permissive CORS HTTP headers:
            // https://developer.mozilla.org/en-US/docs/Web/HTTP/CORS
            "https://unpkg.com/butterchurn-presets-weekly@0.0.2/weeks/week1/presets.json"
          );
          const namesToPresetUrls = await resp.json();
          return Object.keys(namesToPresetUrls).map((name) => {
            return { name, butterchurnPresetUrl: namesToPresetUrls[name] };
          });
        },
        butterchurnOpen: false,
      },
      windowLayout: {
        main: {
          position: { top: 0, left: 0 },
        },
        equalizer: {
          position: { top: 116, left: 0 },
        },
        playlist: {
          position: { top: 0, left: 275 },
          size: { extraHeight: 4, extraWidth: 0 },
        },
      },
      zIndex: 9999,
    });

    if (document.getElementById("webamp-div")) {
      webamp.renderWhenReady(document.getElementById("webamp-div"));
    }
  } else {
    console.error("Webamp is not supported in this browser.");
  }
});
