const speed = 4;

function Point(c) {
  this.x = parseInt(Math.random() * c.width);
  this.y = parseInt(Math.random() * c.height);
  this.xVel = parseInt(Math.random() * 2) == 1 ? 1 : -1;
  this.yVel = parseInt(Math.random() * 2) == 1 ? 1 : -1;
}

function Shape(c, ctx) {
  this.color = "#" + Math.floor(Math.random() * 16777215).toString(16);
  this.points = [];

  for (var i = 0; i < 4; i++) {
    this.points.push(new Point(c));
  }

  this.draw = function () {
    ctx.strokeStyle = this.color;
    ctx.beginPath();
    ctx.moveTo(this.points[0].x, this.points[0].y);

    for (var i = 1; i < this.points.length; i++) {
      var p = this.points[i];

      ctx.lineTo(p.x, p.y);
    }

    ctx.lineTo(this.points[0].x, this.points[0].y);
    ctx.closePath();
    ctx.stroke();
  };

  this.update = function () {
    for (var i = 0; i < this.points.length; i++) {
      var p = this.points[i];

      p.x += p.xVel * speed;
      p.y += p.yVel * speed;

      if (p.x > c.width) p.xVel = Math.abs(p.xVel) * -1;
      if (p.x < 0) p.xVel = Math.abs(p.xVel);

      if (p.y > c.height) p.yVel = Math.abs(p.yVel) * -1;
      if (p.y < 0) p.yVel = Math.abs(p.yVel);
    }
  };
}

module.exports = function mystifyBackground() {
  const container = document.createElement("section");
  container.className = "mystify-container";
  const c = document.createElement("canvas");
  container.appendChild(c);
  document.body.appendChild(container);
  const ctx = c.getContext("2d");

  c.width = window.innerWidth;
  c.height = window.innerHeight;

  const s = new Shape(c, ctx);
  const s2 = new Shape(c, ctx);

  function render() {
    ctx.fillStyle = "rgba(0,0,0,0.1)";
    ctx.fillRect(0, 0, c.width, c.height);

    s.update();
    s.draw();

    s2.update();
    s2.draw();
  }

  window.requestAnimFrame = (function () {
    return (
      window.requestAnimationFrame ||
      window.webkitRequestAnimationFrame ||
      window.mozRequestAnimationFrame ||
      function (callback) {
        window.setTimeout(callback, 1000 / 60);
      }
    );
  })();

  (function animloop() {
    $(document.body).css("background", "#000");

    requestAnimFrame(animloop);
    render();

    window.onresize = function () {
      c.width = container.clientWidth;
      c.height = container.clientHeight;
    };
  })();
};
