class Person{
    constructor(name, age, img){
        this.name = name;
        this.age = age;
        this.img = img;
        this.el = document.createElement('div');
    }
    render(){
        // alert(`${this.name} - ${this.age}`);
        this.el.classList.add('person');
        this.el.innerHTML = `
            <div class='person-img'>
                <img src='${this.img}'>
            </div>
            <div class='person-name'>${this.name}</div>
            <div class='person-age'>${this.age}</div>
        `;

        document.body.appendChild(this.el);
    }
}

let vasya = new Person('Вася', 31, 'https://img.prosports.kz/news/content/file_1442998762_899776251.jpg');
let petya = new Person('Петя', 28, 'https://interesnyefakty.org/wp-content/uploads/Foto-Petra-1-Pervogo-24.jpg');
console.dir(vasya);
console.dir(petya);
vasya.render();
petya.render();
// petya.makeAttention();
