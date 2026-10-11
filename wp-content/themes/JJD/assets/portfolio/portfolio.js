/* Portfolio Landing — vanilla JS (no framework). */
(function () {
  /* ---------- halftone photo + cursor swell ---------- */
  function initSwell(cnv) {
    var ctx = cnv.getContext('2d');
    var dpr = Math.min(window.devicePixelRatio || 1, 2);
    function size() {
      var W = cnv.clientWidth, H = cnv.clientHeight;
      cnv.width = W * dpr; cnv.height = H * dpr;
      ctx.setTransform(dpr, 0, 0, dpr, 0, 0);
      return { W: W, H: H };
    }
    var dim = size(); var W = dim.W, H = dim.H;
    var gap = 10, cols = Math.ceil(W / gap), rows = Math.ceil(H / gap);
    var bright = null;

    var img = new Image();
    img.onload = function () {
      var off = document.createElement('canvas'); off.width = cols; off.height = rows;
      var ox = off.getContext('2d');
      var asp = W / H, iasp = img.width / img.height, dw = cols, dh = rows, dx = 0, dy = 0;
      if (iasp > asp) { dh = rows; dw = rows * iasp; dx = (cols - dw) / 2; }
      else { dw = cols; dh = cols / iasp; dy = (rows - dh) / 2; }
      ox.drawImage(img, dx, dy, dw, dh);
      var d = ox.getImageData(0, 0, cols, rows).data;
      bright = new Float32Array(cols * rows);
      for (var k = 0; k < cols * rows; k++) {
        var o = k * 4;
        var l = (0.299 * d[o] + 0.587 * d[o + 1] + 0.114 * d[o + 2]) / 255;
        l = Math.min(1, Math.max(0, (l - 0.42) * 1.05 + 0.5));
        bright[k] = 0.10 + l * 0.85;
      }
      draw();
    };
    img.src = cnv.getAttribute('data-photo');

    var aim = { x: W * 0.6, y: H * 0.45 }, cur = { x: W * 0.6, y: H * 0.45 };
    var aimHover = 0, hover = 0, R = 190;
    cnv.addEventListener('pointermove', function (e) { var r = cnv.getBoundingClientRect(); aim.x = e.clientX - r.left; aim.y = e.clientY - r.top; });
    cnv.addEventListener('pointerenter', function () { aimHover = 1; start(); });
    cnv.addEventListener('pointerleave', function () { aimHover = 0; });

    function draw() {
      ctx.clearRect(0, 0, W, H);
      ctx.fillStyle = 'white'; ctx.fillRect(0, 0, W, H);
      if (!bright) return;
      for (var j = 0; j < rows; j++) for (var i = 0; i < cols; i++) {
        var cx = i * gap + gap / 2, cy = j * gap + gap / 2;
        var dx = cx - cur.x, dy = cy - cur.y;
        var dist = Math.sqrt(dx * dx + dy * dy);
        var fall = Math.max(0, 1 - dist / R);
        var bulge = fall * fall * 0.55 * hover;
        var sxp = cx - dx * bulge, syp = cy - dy * bulge;
        var si = Math.round((sxp - gap / 2) / gap), sj = Math.round((syp - gap / 2) / gap);
        si = si < 0 ? 0 : si >= cols ? cols - 1 : si;
        sj = sj < 0 ? 0 : sj >= rows ? rows - 1 : sj;
        var dark = 1 - bright[sj * cols + si];
        var rad = dark * gap * 0.56;
        rad += fall * fall * gap * 0.42 * hover;
        rad = Math.min(rad, gap * 0.62);
        if (rad < 0.3) continue;
        var px = cur.x + dx * (1 + bulge * 0.9), py = cur.y + dy * (1 + bulge * 0.9);
        ctx.fillStyle = (fall > 0.45 && hover > 0.3) ? '#000000' : '#16130f';
        ctx.beginPath(); ctx.arc(px, py, rad, 0, 7); ctx.fill();
      }
      if (hover > 0.02) {
        ctx.beginPath(); ctx.arc(cur.x, cur.y, R * 0.62, 0, 7);
        ctx.strokeStyle = 'rgba(216,73,47,' + (0.35 * hover).toFixed(3) + ')'; ctx.lineWidth = 1.5; ctx.stroke();
      }
    }

    var running = false, idleFrames = 0;
    function tick() {
      cur.x += (aim.x - cur.x) * 0.14; cur.y += (aim.y - cur.y) * 0.14;
      hover += (aimHover - hover) * 0.08;
      draw();
      if (aimHover === 0 && hover < 0.01 && Math.abs(aim.x - cur.x) < 0.4 && Math.abs(aim.y - cur.y) < 0.4) {
        if (++idleFrames > 4) { running = false; return; }
      } else { idleFrames = 0; }
      requestAnimationFrame(tick);
    }
    function start() { if (running) return; running = true; idleFrames = 0; tick(); }

    var rz;
    window.addEventListener('resize', function () {
      clearTimeout(rz);
      rz = setTimeout(function () {
        var d2 = size(); W = d2.W; H = d2.H; cols = Math.ceil(W / gap); rows = Math.ceil(H / gap);
        bright = null; var s = img.src; img.src = ''; img.src = s; start();
      }, 150);
    });
    start();
  }

  function boot() {
    var cnv = document.getElementById('jj-cnv-swell');
    if (cnv) initSwell(cnv);
  }
  if (document.readyState === 'loading') document.addEventListener('DOMContentLoaded', boot);
  else boot();
})();
