function clipboard(url) {
	console.log(url);
	const el = document.createElement('textarea');
	el.value = url;
	document.body.appendChild(el);
	el.select();
	document.execCommand('copy');
	document.body.removeChild(el);
	alert(LANGUAGE_FILE.text_copied);
}
