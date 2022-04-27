/**
 * METEOR
 */

function makeid(length) {
  var result = "";
  var characters =
    "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
  var charactersLength = characters.length;
  for (var i = 0; i < length; i++) {
    result += characters.charAt(Math.floor(Math.random() * charactersLength));
  }
  return result;
}

function randomIntFromInterval(min, max) {
  // min and max included
  return Math.floor(Math.random() * (max - min + 1) + min);
}

function generateMeteor() {
  const delay = Math.ceil(Math.random() * (5 - 1) + 1) * 1000;
  setTimeout(() => {
    const containment = document.getElementsByClassName("meteor-container")[0];
    const ch = containment.scrollHeight;
    const cw = containment.clientWidth;
    const duration = Math.ceil(Math.random() * (10 - 0.75) + 0.75);
    percent = cw / (cw + ch);
    // This is where I am calculating the chances of it coming from the top
    const fromTop = Math.random() < percent;
    const fromRight = !fromTop;
    // if it is from top, then top is 0, otherwise it's randomly any vertical pixel
    const top = fromTop ? 0 : randomIntFromInterval(0, ch - 100);
    // if it is from the right, then right is 0, otherwise it's randomly any horizontal pixel.
    const right = fromRight ? 0 : randomIntFromInterval(100, cw);

    // This is where we generate the meteor for the meteor itself.
    const meteor = document.createElement("span");
    const className = "meteor-" + makeid(10);
    const distance = randomIntFromInterval(Math.round(cw * 0.5), cw);
    const style = document.createElement("style");
    style.type = "text/css";
    var keyFrames = `
        @keyframes animate-${className} {
            0% {
                transform: rotate(350deg) translateX(0);
                opacity: 0;
            }
            5% {
                opacity: 1;
            }
            70% {
                opacity: 1;
            }
            100% {
                transform: rotate(350deg) translateX(-${distance}px);
                opacity: 0;
            }
        }
  
        .${className} {
            animation: animate-${className} 3s linear infinite;
            top: ${top}px;
            right: ${right}px;
            left: initial;
            animation-duration: ${duration}s;
        }
  
        .${className}::before {
            animation: animate-tail ${duration}s linear infinite;
        }
    `;

    style.innerHTML = keyFrames;
    document.getElementsByTagName("head")[0].appendChild(style);

    meteor.className = "meteor " + className;

    containment.appendChild(meteor);
    setTimeout(() => {
      containment.removeChild(meteor);
      document.getElementsByTagName("head")[0].removeChild(style);

      generateMeteor();
    }, duration * 1000);
  }, delay);
}

module.exports = function meteorBackground() {
  const section = document.createElement("section");
  section.className = "meteor-container";
  document.body.appendChild(section);

  const container = $("#root");

  const observer = new ResizeObserver(function () {
    $(".meteor-container").css("height", container[0].clientHeight);
  });

  container.children().each(function (_, child) {
    observer.observe(child);
  });

  let meteors = Math.round((container[0].clientHeight / 400) * 4);
  while (meteors--) {
    generateMeteor();
  }
};
