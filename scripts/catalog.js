class Catalog{
    constructor(){
        this.products = [];
        this.el = document.querySelector('.catalog');
        this.id = this.el.getAttribute('data-catalog-id');
    }
    load(numPage = 1){

        this.preloaderStart();

        let xhr = new XMLHttpRequest();
        xhr.open('GET', `/handlers/catalogHandler.php?id=${this.id}&numPage=${numPage}`);
        xhr.send();
        xhr.addEventListener('load', ()=>{
            let data = JSON.parse(xhr.responseText);
            console.log(data);

            this.products = [];
            data.products.forEach((productItem)=>{
                this.products.push( new Product(productItem) );
            });

            this.renderPagination(data.pagination);
            this.render();
            this.preloaderStop();
        });
    }
    renderPagination(pagination){
        let paginationEl = this.el.querySelector('.catalog-box-pagination');
        paginationEl.innerHTML = '';

        for(let i = 0; i < pagination.countPage; i++){
            let paginationItem = document.createElement('a');
            paginationItem.classList.add('catalog-box-pagination-item');

            if( pagination.nowPage == i + 1 ){
                paginationItem.classList.add('active');
            }

            paginationItem.innerHTML = i+1;
            paginationItem.setAttribute('data-num-page', i+1);
            paginationEl.appendChild(paginationItem);

            //Запоминаем this, которые ссылается на текующий каталог, т.к. в обработчики на клик он будет потерен
            let that = this;
            paginationItem.addEventListener('click', function(){
                let numPage = this.getAttribute('data-num-page');
                that.load(numPage);
            });
        }
    }
    render(){
        let catalogBoxProducts = this.el.querySelector('.catalog-box-products');
        catalogBoxProducts.innerHTML = '';
        this.products.forEach((product)=>{
            catalogBoxProducts.appendChild( product.getElement() );
        });  
    }
    preloaderStart(){
        this.el.querySelector('.catalog-box-preloader').style.display = 'flex';
    }
    preloaderStop(){
        this.el.querySelector('.catalog-box-preloader').style.display = 'none';
    }
}
class Product{
    constructor(productObj){
        this.id = productObj.id;
        this.name = productObj.name;
        this.img1 = productObj.img1;
        this.price = productObj.price;
        this.sku = productObj.sku;
        this.text = productObj.text;

        this.el = document.createElement('a');
        this.el.classList.add('catalog-box-products-item');
        this.el.href = `/product.php?id=${this.id}`;
    }
    getElement(){
        this.el.innerHTML = `
            <div class='catalog-box-products-item-pic' style='background-image: url(${this.img1})'></div>
            <div class='catalog-box-products-item-name'>${this.name}</div>
            <div class='catalog-box-products-item-price'>${this.price} руб.</div>
        `;
        return this.el;
    }
}

let catalog = new Catalog();
catalog.load();