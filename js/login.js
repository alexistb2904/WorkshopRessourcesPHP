const urlParams = new URLSearchParams(window.location.search);
if (urlParams.get('signup') != null) {
    document.getElementById('login').style.display = 'none';
    document.getElementById('sign-up').style.display = 'flex';
} else {
    document.getElementById('login').style.display = 'flex';
    document.getElementById('sign-up').style.display = 'none';
}

function showLogin() {
    document.getElementById('login').classList.remove('goOutLogin');
    document.getElementById('sign-up').classList.remove('goInLogin');
    document.getElementById('sign-up').classList.add('goOutLogin');
    document.getElementById('login').classList.add('goInLogin');

    setTimeout(() => {
        document.getElementById('login').style.display = 'flex';
        document.getElementById('sign-up').style.display = 'none';
    }, 200);
}

function showRegister() {
    document.getElementById('sign-up').classList.remove('goOutLogin');
    document.getElementById('login').classList.remove('goInLogin');
    document.getElementById('login').classList.add('goOutLogin');
    document.getElementById('sign-up').classList.add('goInLogin');
    setTimeout(() => {
        document.getElementById('login').style.display = 'none';
        document.getElementById('sign-up').style.display = 'flex';
    }, 200);
}
