const buttonSignIn = document.querySelector('.js-button-sign-in');
const buttonSignUp = document.querySelector('.js-button-sign-up');
const containerSignIn = document.querySelector('.container-sign-in')
const containerSignUp = document.querySelector('.container-sign-up')
const containerSignUpTransform = document.querySelector('.container-sign-up-transform')

const contentSignIn = document.querySelector('.content-sign-in');
const contentSignInTransform = document.querySelector('.content-sign-in-transform');





console.log(buttonSignUp)

buttonSignIn.addEventListener('click', () =>
{
    containerSignIn.classList.add('animation-sign-in');
    containerSignUp.classList.add('animation-sign-up');
    containerSignUpTransform.classList.add('animation-sign-up-transform');
    contentSignIn.classList.add('animation-content-sign-in');
    contentSignInTransform.classList.add('animation-content-sign-in-transform');
})


buttonSignUp.addEventListener('click', () =>
{
    if(containerSignIn.classList.contains('animation-sign-in'))
    {
        containerSignIn.style.position.left = '0%'
    }  
    

    // containerSignUp.classList.add('animation-sign-up');
    // containerSignUpTransform.classList.add('animation-sign-up-transform');
    // contentSignIn.classList.add('animation-content-sign-in');
    // contentSignInTransform.classList.add('animation-content-sign-in-transform');
})