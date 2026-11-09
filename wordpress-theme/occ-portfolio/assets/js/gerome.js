/* Gerome's page: draws the digital-camo texture once (seeded, so it never changes). */
(function () {
	'use strict';
	var size = 480, cell = 16, n = size / cell;
	var c = document.createElement('canvas');
	c.width = c.height = size;
	var g = c.getContext('2d');
	if (!g) return;
	var s = 20260611;
	var rnd = function () {
		s = (Math.imul(s, 1664525) + 1013904223) >>> 0;
		return s / 4294967296;
	};
	g.fillStyle = '#2a3220';
	g.fillRect(0, 0, size, size);
	var layers = [['#3a4527', 26], ['#4b5a2f', 22], ['#5d6c39', 14], ['#58452f', 14], ['#8a7a5a', 5]];
	layers.forEach(function (layer) {
		g.fillStyle = layer[0];
		for (var b = 0; b < layer[1]; b++) {
			var x = Math.floor(rnd() * n), y = Math.floor(rnd() * n);
			var len = 4 + Math.floor(rnd() * 14);
			for (var i = 0; i < len; i++) {
				var w = 1 + Math.floor(rnd() * 3), h = 1 + Math.floor(rnd() * 2);
				for (var dx = 0; dx < w; dx++) {
					for (var dy = 0; dy < h; dy++) {
						g.fillRect(((x + dx) % n) * cell, ((y + dy) % n) * cell, cell, cell);
					}
				}
				x = (x + (rnd() < 0.5 ? -1 : 1) + n) % n;
				y = (y + (rnd() < 0.5 ? -1 : 0) + n) % n;
			}
		}
	});
	document.documentElement.style.setProperty('--camo', 'url(' + c.toDataURL('image/png') + ')');
})();
