document.addEventListener('DOMContentLoaded', function() {
	let bodyElement = document.querySelector('body');
	let devTool = document.querySelector('.version');

	devTool.addEventListener('click', () => {
		bodyElement.classList.toggle('active-debug');
	});
});
