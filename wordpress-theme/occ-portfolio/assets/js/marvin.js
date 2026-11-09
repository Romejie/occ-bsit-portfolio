/* Marvin's page: types out the terminal intro (skipped if the visitor prefers reduced motion). */
(function () {
	'use strict';
	var reduce = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
	var nodes = Array.prototype.slice.call(document.querySelectorAll('[data-type]'));
	if (reduce || !nodes.length) return;
	var texts = nodes.map(function (n) { return n.textContent; });
	nodes.forEach(function (n) { n.textContent = ''; });
	var i = 0;
	function next() {
		if (i >= nodes.length) return;
		var node = nodes[i], full = texts[i];
		var isCmd = !!node.closest('.term__cmd');
		var c = 0;
		(function tick() {
			node.textContent = full.slice(0, ++c);
			if (c < full.length) {
				setTimeout(tick, isCmd ? 32 : 7);
			} else {
				i++;
				setTimeout(next, isCmd ? 120 : 80);
			}
		})();
	}
	next();
})();
