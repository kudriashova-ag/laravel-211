
const cart = localStorage.getItem('cart') ? JSON.parse(localStorage.getItem('cart')) : [];

if (document.querySelector('.add-to-cart-btn')) {
    document.querySelector('.add-to-cart-btn').addEventListener('click', function () {
        const id = this.dataset.id;
        const product = cart.find(product => product.id == id);

        if (product) {
            product.quantity++;
        }

        else {
            cart.push({
                id: id,
                quantity: 1
            })
        }

        localStorage.setItem('cart', JSON.stringify(cart));
    });
}


const showCartBody = () => { 
    cart.map(product => { 

    })

}

// запит з бази
// localStorage - зберігати всі дані товару





const modal = document.getElementById('modal');
const openModalButton = document.getElementById('openModal');
const closeModalButton = document.getElementById('closeModal');

openModalButton.addEventListener('click', () => {
    modal.classList.remove('hidden');
});
closeModalButton.addEventListener('click', () => {
    modal.classList.add('hidden');
});
// Close modal when clicking outside content
modal.addEventListener('click', (event) => {
    if (event.target === modal) {
        modal.classList.add('hidden');
    }
});




const menuBtn = document.getElementById('menu-btn');
const mobileMenu = document.getElementById('mobile-menu');

menuBtn.addEventListener('click', () => {
    mobileMenu.classList.toggle('hidden');
});