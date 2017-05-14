import Cookies from './cookies.js';

class Cart {

    constructor() {
        this.defineCart();
    }

    defineCart() {
        if (Cookies.get('cart')) {
            this.cart = JSON.parse(Cookies.get('cart'));
        } else {
            this.cart = {};
        }

        return this.cart;
    }

    prepareToCart(curIcon) {
        let cart = this.cart;
        let inCartIndex = this.checkInCart(curIcon);

        if (inCartIndex) {
            cart = this.resolveIcon(curIcon, inCartIndex, cart);
        } else if (cart) {
            cart['icon' + curIcon.id] = curIcon;
        } else {
            cart = {};
            cart['icon' + curIcon.id] = curIcon;
        }

        this.itemStatus = 'added';
        this.updateCart(cart);
    }

    checkInCart(curIcon) {
        let c = 0
        for(let cur in this.cart) {
            c++;
            if (this.cart[cur].id === curIcon.id) {
                delete this.cart[cur];
            }
        }

        if (c <= 1) {
           this.cart = {};
       }

       this.updateCart(this.cart);

   }

   resolveIcon(item, index, cart) {
        // removing an existing item 
        cart.splice(index, 1);
        cart[item] = item;
        return cart;
    }

    updateCart(cart) {
        let c = 0;
        for(let cur in cart) {
            c++;
        }
        if (c) {
            this.cart = cart;
        } else {
            this.cart = {};
        }
        Cookies.set('cart', JSON.stringify(this.cart));
    }

    clearFromCart(icon) {
        let cart = this.cart;
        let inCartIndex = this.checkInCart(icon);

        if (inCartIndex) {
            delete cart[inCartIndex];
        }

        this.updateCart(cart);
    }

    clearCart() {
        Cookies.set('cart', null);
    }

}

export default Cart;