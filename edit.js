let button = document.querySelector('.edit'),
edit = document.querySelector('.edit-back'),
close = document.querySelector('.close');
console.log(edit);

button.addEventListener('click',() =>{
    edit.classList.add('active');
});
close.addEventListener('click',()=>{
    edit.classList.toggle('active');
})