window.addEventListener('load', function() {

	const topbar = document.querySelector('.topbar');
	const mainContent = document.querySelector('.container-none');
	document.querySelector('.buttonSlide').onclick = function() {
		mainContent.classList.toggle('container');
		topbar.classList.toggle('topbar-sticky');
  };

})