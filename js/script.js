let signUp = document.getElementById('btn_signup');
let signIn = document.getElementById('btn_signin');

console.log(signUp);

signUp.addEventListener('click', function() {
	let signUpForm = document.getElementById('signup');
	signUpForm.style.display = 'block';
});

signIn.addEventListener('click', function() {
	let signUpForm = document.getElementById('signin');
	signUpForm.style.display = 'block';
});