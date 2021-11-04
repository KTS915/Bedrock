/*
Bedrock JavaScript files
Author: Tim Kaye
*/
document.addEventListener('DOMContentLoaded', function() {
	'use strict'; // satisfy code inspectors

	/* SHOW AND HIDE MENU AND TOGGLE BUTTONS ON MOBILE */
	if (window.matchMedia("screen and (max-width: 767px)").matches) {
		document.getElementById('menu-toggle').addEventListener('click', function() {
			this.setAttribute('hidden', 'hidden');
			document.querySelector('.main-navigation').style.display = 'block';
			document.getElementById('menu-toggle-close').removeAttribute('hidden');
			document.getElementById('menu-toggle-close').focus();
		});
		document.getElementById('menu-toggle-close').addEventListener('click', function() {
			this.setAttribute('hidden', 'hidden');
			document.querySelector('.main-navigation').style.display = 'none';
			document.getElementById('menu-toggle').removeAttribute('hidden');
			document.getElementById('menu-toggle').focus();
		});
	}
	
	/* RELOAD ON RESIZE BEYOND MEDIA QUERY BREAKPOINT */
	var windoe = window;
	var windowWidth = window.innerWidth;

	window.addEventListener('resize', function() {
		if ((windowWidth >= 768 && window.innerWidth < 768) || (windowWidth < 768 && window.innerWidth >= 768)) {
			if (windoe.RT) {
				clearTimeout(windoe.RT);
			}
			windoe.RT = setTimeout(function() {
				this.location.reload(false); /* false to get page from cache */
			}, 100);
		}
	});

});
