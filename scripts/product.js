document.querySelector('.product-addtocart').addEventListener('click', function(){
    let id = this.getAttribute('data-id');
    console.log(id);

    let xhr = new XMLHttpRequest();
    xhr.open('GET', `/handlers/basketHandler.php?id=${id}`);
    xhr.send();

    xhr.addEventListener('load', ()=>{
        let countBasket = xhr.responseText;
        let basketEl = document.querySelector('.basket span');
        basketEl.innerHTML = countBasket;
    });
});