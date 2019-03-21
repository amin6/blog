// First we detect the click event
document.getElementById('register').addEventListener('click', function () {
    if (document.getElementById('btn-login').classList.contains('active')) {
        active = document.getElementById('btn-login');
        inactive = document.getElementById('btn-register');

        document.getElementById('profile').classList.remove('active');
        document.getElementById('profile').classList.remove('show');
        document.getElementById('buzz').classList.add('active');
        document.getElementById('buzz').classList.add('show');

        active.classList.remove('active');
        inactive.classList.add('active');
    }
});
document.getElementById('login').addEventListener('click', function () {
    if (document.getElementById('btn-register').classList.contains('active')) {
        active = document.getElementById('btn-register');
        inactive = document.getElementById('btn-login');
        
        document.getElementById('buzz').classList.remove('active');
        document.getElementById('buzz').classList.remove('show');
        document.getElementById('profile').classList.add('active');
        document.getElementById('profile').classList.add('show');

        active.classList.remove('active');
        inactive.classList.add('active');
    }
});
