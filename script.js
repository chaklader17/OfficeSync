const wrapper = document.querySelector('.wrapper');
const loginPrompt = document.querySelector('.login');
const btnPopUp = document.querySelector('.btnLogin-popup');
const closeIcon = document.querySelector('.icon-close')

loginPrompt.addEventListener('click', ()=> {wrapper.classList.remove('active');});

btnPopUp.addEventListener('click', ()=> {wrapper.classList.add('active-popup');});

closeIcon.addEventListener('click', ()=> {wrapper.classList.remove('active-popup');});

function myFunction() {
    var x = document.getElementById('myDIV');
    if (x.style.display === 'none') {
        x.style.display = 'block';
    } else {
        x.style.display = 'none';
    }
}

