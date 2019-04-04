// First we detect the click event
/*document.getElementById('register').addEventListener('click', function () {
    if (document.getElementById('btn-login').classList.contains('active')) {

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
        
        document.getElementById('buzz').classList.remove('active');
        document.getElementById('buzz').classList.remove('show');
        document.getElementById('profile').classList.add('active');
        document.getElementById('profile').classList.add('show');

        active.classList.remove('active');
        inactive.classList.add('active');
    }
});*/

$(() => {
    $("#register").on("click", () => {
        if($("#btn-login").hasClass("active")){
            $("#btn-login").removeClass("active");
            $("#btn-register").addClass("active");
            $("#profile").removeClass("show");
            $("#profile").removeClass("active");
            $("#buzz").addClass("show");        
            $("#buzz").addClass("active");     
        }
    });
    $("#login").on("click", () => {
        if($("#btn-register").hasClass("active")){
            $("#btn-login").addClass("active");
            $("#btn-register").removeClass("active");
            $("#profile").addClass("show");
            $("#profile").addClass("active");
            $("#buzz").removeClass("show");      
            $("#buzz").removeClass("active");       
        }
    });
});

