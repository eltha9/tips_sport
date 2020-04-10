const home_main = document.querySelector('main')
const logo = document.querySelector('h1')
const go_to_connect = document.querySelector('.to-connect button')
const go_to_create = document.querySelector('.to-create button')

go_to_connect.addEventListener('click', ()=>{
    home_main.classList.toggle('connect')
    logo.classList.toggle('blue')
})

go_to_create.addEventListener('click', ()=>{
    home_main.classList.toggle('connect')
    logo.classList.toggle('blue')
})