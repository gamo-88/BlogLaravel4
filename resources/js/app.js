import './bootstrap';

let comment= document.querySelector('.commentaires')
let btn = document.querySelector('.btncomment')

comment.addEventListener('input', function () {
    let val= this.value

    if (val.length===0) {
        btn.setAttribute('disabled', true)
    } else {
        btn.removeAttribute('disabled')
        
    }
})