var loginPage = document.getElementById('loginPage');

    var loginForm = document.querySelector('.loginForm');

    var signupAccount = document.querySelector('.signupAccount');

    var signUpForm = document.querySelector('.signUpForm');
    signUpForm.style.display = 'none'

    var backButton = document.querySelector('.backButton');


    function toSignUpPage(){
        let signUpPage = loginPage;
        loginForm.style.display = 'none';
        signUpForm.style.display = 'block';
        signUpPage.style.height = '500px';
    }

    function backToLogin(){
        loginPage.display = 'flex';
        signUpForm.display = 'none';
    }

    function login(){

    }

    function signUp(){

    }

    function enterAsGuest(){

    }