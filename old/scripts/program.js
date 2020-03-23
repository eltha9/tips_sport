let first_section = document.querySelector('.first')
let second_section = document.querySelector('.second')
let third_section = document.querySelector('.third')

let first_next_button = document.querySelector('.first-button')
let second_next_button = document.querySelector('.second-button')

// bar variable

let bar = document.querySelector('.progress .bar')

first_next_button.addEventListener('click',(event)=>{
    event.preventDefault()
    first_section.classList.toggle('hidden')
    second_section.classList.toggle('hidden')
    bar.style.width=`${(100/3)*2}%`
})

second_next_button.addEventListener('click', (event=>{
    event.preventDefault()
    second_section.classList.toggle('hidden')
    third_section.classList.toggle('hidden')
    bar.style.width = '100%'
}))

//muscles part 

let muscles_input = document.querySelectorAll('.mscl ')
let muscles_all = document.querySelector('.all')



muscles_all.addEventListener('change', ()=>{
    if(muscles_all.checked == true){
        for(let i=0; i<muscles_input.length; i++){
            muscles_input[i].checked = false
        }
    }
})

for(let i=0; i<muscles_input.length; i++){
    muscles_input[i].addEventListener('change', ()=>{
        if(muscles_all.checked){
            muscles_all.checked = false
        }
    })
}

// objectif part

let object_div = document.querySelectorAll('.object-button img')
let object_input = document.querySelector('.hidden-objectif')
console.log(object_div)
console.log(object_input)

for(let i=0; i<object_div.length; i++){
    object_div[i].addEventListener('click', ()=>{
        if(object_div[i].dataset.type == object_input.value){
            object_input.value = 'NULL'
        }else if(object_div[i].dataset.type != object_input.value){
            object_input.value = object_div[i].dataset.type       
        }
        object_div[i].classList.toggle('clicked')

        for(let j=0; j<object_div.length; j++){
            if(object_div[j] != object_div[i]){
                object_div[j].classList.toggle('lets-hidden')
            }
        }

        


    })
}