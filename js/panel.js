function showZebra(type = 'zebra_c') {
    document.getElementById('zebra-b-div').style.display = 'grid';
    document.getElementById('decals-b-div').style.display = 'none';
    if (type === 'admin') {
        document.getElementById('template-b-div-a').style.display = 'none';
        document.getElementById('community-b-div').style.display = 'none';
        document.getElementById('community-b').classList.remove('button-category-active');
    } else {
        document.getElementById('template-b-div').style.display = 'none';
    }
    document.getElementById('zebra-b').classList.add('button-category-active');
    document.getElementById('decals-b').classList.remove('button-category-active');
    document.getElementById('template-b').classList.remove('button-category-active');
}

function showDecals(type = 'decals_c') {
    document.getElementById('zebra-b-div').style.display = 'none';
    document.getElementById('decals-b-div').style.display = 'grid';
    if (type === 'admin') {
        document.getElementById('template-b-div-a').style.display = 'none';
        document.getElementById('community-b-div').style.display = 'none';
        document.getElementById('community-b').classList.remove('button-category-active');
    } else {
        document.getElementById('template-b-div').style.display = 'none';
    }
    document.getElementById('zebra-b').classList.remove('button-category-active');
    document.getElementById('decals-b').classList.add('button-category-active');
    document.getElementById('template-b').classList.remove('button-category-active');
}

function showTemplate(type = 'other') {
    document.getElementById('zebra-b-div').style.display = 'none';
    document.getElementById('decals-b-div').style.display = 'none';
    if (type === 'admin') {
        document.getElementById('template-b-div-a').style.display = 'flex';
        document.getElementById('community-b-div').style.display = 'none';
        document.getElementById('community-b').classList.remove('button-category-active');
    } else {
        document.getElementById('template-b-div').style.display = 'grid';
    }
    document.getElementById('zebra-b').classList.remove('button-category-active');
    document.getElementById('decals-b').classList.remove('button-category-active');
    document.getElementById('template-b').classList.add('button-category-active');
}

function showCommunity(type = 'community') {
    document.getElementById('zebra-b-div').style.display = 'none';
    document.getElementById('decals-b-div').style.display = 'none';
    document.getElementById('template-b-div-a').style.display = 'none';
    document.getElementById('community-b-div').style.display = 'grid';
    document.getElementById('zebra-b').classList.remove('button-category-active');
    document.getElementById('decals-b').classList.remove('button-category-active');
    document.getElementById('template-b').classList.remove('button-category-active');
    document.getElementById('community-b').classList.add('button-category-active');
}


