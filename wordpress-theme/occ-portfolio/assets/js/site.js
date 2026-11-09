/* Shared behaviour for all four pages: mobile menu, scroll fade-in, photo lightbox. */
(function () {
	'use strict';

	/* ---- mobile menu ---- */
	var button = document.querySelector('[data-nav-toggle]');
	var menu = document.querySelector('[data-nav]');
	if (button && menu) {
		var setOpen = function (open) {
			menu.classList.toggle('is-open', open);
			button.setAttribute('aria-expanded', String(open));
		};
		button.addEventListener('click', function () {
			setOpen(!menu.classList.contains('is-open'));
		});
		menu.addEventListener('click', function (e) {
			if (e.target.closest('a')) setOpen(false);
		});
		document.addEventListener('keydown', function (e) {
			if (e.key === 'Escape') setOpen(false);
		});
	}

	/* ---- fade in on scroll (skipped if the visitor prefers reduced motion) ---- */
	var items = document.querySelectorAll('[data-reveal]');
	var reduce = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
	if (reduce || !('IntersectionObserver' in window)) {
		items.forEach(function (el) { el.classList.add('is-visible'); });
	} else {
		var io = new IntersectionObserver(function (entries) {
			entries.forEach(function (entry) {
				if (entry.isIntersecting) {
					entry.target.classList.add('is-visible');
					io.unobserve(entry.target);
				}
			});
		}, { threshold: 0.12 });
		items.forEach(function (el) { io.observe(el); });
	}

	/* ---- photo lightbox ---- */
	var triggers = document.querySelectorAll('[data-lightbox]');
	if (triggers.length && typeof HTMLDialogElement !== 'undefined') {
		var dialog = document.createElement('dialog');
		dialog.className = 'lightbox';
		dialog.innerHTML = '<button type="button" class="lightbox__close" aria-label="Close photo">×</button><img alt=""><p class="lightbox__cap"></p>';
		document.body.appendChild(dialog);
		var img = dialog.querySelector('img');
		var cap = dialog.querySelector('.lightbox__cap');
		triggers.forEach(function (t) {
			t.addEventListener('click', function () {
				var src = t.querySelector('img');
				img.src = src.currentSrc || src.src;
				img.alt = src.alt;
				cap.textContent = t.getAttribute('data-caption') || '';
				dialog.showModal();
			});
		});
		dialog.addEventListener('click', function (e) {
			if (e.target === dialog || e.target.closest('.lightbox__close')) dialog.close();
		});
	}
})();
