const ImgFile = document.getElementById('photo_file');
const ImgFileWindows = document.getElementById('photo_file_windows');
const ImgLabel = document.querySelector('#labelFile span');
const ImgLabel2 = document.querySelector('#labelFile span');
const ImgUrl = document.querySelector('#photo');
const Form = document.querySelector('#creation-form');

ImgFile.addEventListener('change', function (e) {
	const file = e.target.files[0];
	if (file.name.lenght != 0) {
		ImgLabel.innerHTML = file.name;
		ImgUrl.readonly = true;
		ImgUrl.value = null;
	}
});

ImgUrl.addEventListener('change', function () {
	if ((ImgUrl.readonly = true && ImgFile.files.length >= 1)) {
		ImgFile.value = null;
		ImgLabel.innerHTML = 'Choisir une image';
		ImgUrl.readonly = false;
	}
});

Form.addEventListener('submit', function (e) {
	if (ImgUrl.value == '' && ImgFile.files.length == 0) {
		e.preventDefault();
		alert('Veuillez choisir une image au minimum');
	}
});

if (ImgFileWindows) {
	ImgFileWindows.addEventListener('change', function (e) {
		const file = e.target.files[0];
		if (file.name.lenght != 0) {
			ImgLabel2.innerHTML = file.name;
		}
	});
}
