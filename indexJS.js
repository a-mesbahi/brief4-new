let menu = document.querySelector('.menu'),
menuB = document.querySelector('.list');

menu.addEventListener('click',() =>{
    menuB.classList.toggle('active');
});



let  email = document.querySelector("#email");

email.addEventListener('keyup',()=> {
    let size = email.value.length;
    if(size < 5){
        email.classList.toggle("no-validation");
    }if( size>=6 ){
        email.className.remove("no-validation");
    }

}
);



// document.addEventListener('click',e=>{
//     console.log(e.target);
// })