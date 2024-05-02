function hideAll() {
	if (document.getElementById('zebra-b-div')) {
		document.getElementById('zebra-b-div').style.display = 'none';
	}
	if (document.getElementById('decals-b-div')) {
		document.getElementById('decals-b-div').style.display = 'none';
	}
	if (document.getElementById('template-b-div-a')) {
		document.getElementById('template-b-div-a').style.display = 'none';
	}
	if (document.getElementById('template-b-div')) {
		document.getElementById('template-b-div').style.display = 'none';
	}
	if (document.getElementById('novalife-b-div')) {
		document.getElementById('novalife-b-div').style.display = 'none';
	}
	if (document.getElementById('community-b-div')) {
		document.getElementById('community-b-div').style.display = 'none';
	}
	if (document.getElementById('zebra-b')) {
		document.getElementById('zebra-b').classList.remove('button-category-active');
	}
	if (document.getElementById('decals-b')) {
		document.getElementById('decals-b').classList.remove('button-category-active');
	}
	if (document.getElementById('template-b')) {
		document.getElementById('template-b').classList.remove('button-category-active');
	}
	if (document.getElementById('novalife-b')) {
		document.getElementById('novalife-b').classList.remove('button-category-active');
	}
	if (document.getElementById('community-b')) {
		document.getElementById('community-b').classList.remove('button-category-active');
	}
}

function showZebra(type = 'zebra_c') {
	hideAll();
	document.getElementById('zebra-b-div').style.display = 'grid';
	document.getElementById('zebra-b').classList.add('button-category-active');
}

function showDecals(type = 'decals_c') {
	hideAll();
	document.getElementById('decals-b-div').style.display = 'grid';
	document.getElementById('decals-b').classList.add('button-category-active');
}

function showTemplate(type = 'other') {
	hideAll();
	if (type == 'admin') {
		document.getElementById('template-b-div-a').style.display = 'flex';
	}
	document.getElementById('template-b-div').style.display = 'grid';
	document.getElementById('template-b').classList.add('button-category-active');
}

function showCommunity(type = 'community') {
	hideAll();
	document.getElementById('community-b-div').style.display = 'grid';
	document.getElementById('community-b').classList.add('button-category-active');
}

function showNovaLife(type = 'novalife') {
	hideAll();
	document.getElementById('novalife-b-div').style.display = 'grid';
	document.getElementById('novalife-b').classList.add('button-category-active');
}
