function checkBasket(){
    let xhr = new XMLHttpRequest();
    xhr.open('GET', `/handlers/basketHandler.php`);
    xhr.send();

    xhr.addEventListener('load', ()=>{
        let countBasket = xhr.responseText;
        let basketEl = document.querySelector('.basket span');
        basketEl.innerHTML = countBasket;
    });
}

checkBasket();