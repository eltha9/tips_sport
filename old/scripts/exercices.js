const weightButton = document.querySelector('.weight-button-js');
const cardioButton = document.querySelector('.cardio-button-js');
const weightlossButton = document.querySelector('.weightloss-button-js');

const weightGainArticle = document.querySelector('.weightgainarticle');
const cardioArticle = document.querySelector('.cardioarticle');
const weightLossArticle = document.querySelector('.weightlossarticle');


cardioButton.addEventListener('click', () =>
{
    weightButton.classList.replace('active-button', 'inactive-button')
    weightlossButton.classList.replace('active-button', 'inactive-button')
    cardioButton.classList.replace('inactive-button', 'active-button')


    weightGainArticle.classList.replace('active', 'inactive')
    weightLossArticle.classList.replace('active', 'inactive')
    cardioArticle.classList.replace('inactive', 'active')
})

weightButton.addEventListener('click', () =>
{
    weightButton.classList.replace('inactive-button', 'active-button')
    weightlossButton.classList.replace('active-button', 'inactive-button')
    cardioButton.classList.replace('active-button', 'inactive-button')


    weightGainArticle.classList.replace('inactive', 'active')
    weightLossArticle.classList.replace('active', 'inactive')
    cardioArticle.classList.replace('active', 'inactive')
})

weightlossButton.addEventListener('click', () =>
{
    weightButton.classList.replace('active-button', 'inactive-button')
    weightlossButton.classList.replace('inactive-button', 'active-button')
    cardioButton.classList.replace('active-button', 'inactive-button')


    weightGainArticle.classList.replace('active', 'inactive')
    weightLossArticle.classList.replace('inactive', 'active')
    cardioArticle.classList.replace('active', 'inactive')
})