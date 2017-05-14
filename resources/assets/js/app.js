import './bootstrap.js';

// Components importing
import Nav from './components/Nav.vue';
import QuickOrderModal from './components/QuickOrderModal.vue';
import LastWorks from './components/LastWorks.vue';
import Footer from './components/Footer.vue';
import About from './components/About.vue';
import Contacts from './components/Contacts.vue';
import Shipping from './components/Shipping.vue';
import OrderModal from './components/OrderModal.vue';
import Gallery from './components/Gallery.vue';
import Icon from './components/Icon.vue';
import Cart from './components/Cart.vue';
import Checkout from './components/Checkout.vue';
import CartPopover from './components/CartPopover.vue';


// Registering components
Vue.component('nav-component', Nav);
Vue.component('quick-order-modal', QuickOrderModal);
Vue.component('last-works-component', LastWorks);
Vue.component('order-modal', OrderModal);
Vue.component('about-component', About);
Vue.component('contacts-component', Contacts);
Vue.component('shipping-component', Shipping);
Vue.component('footer-component', Footer);
Vue.component('gallery-component', Gallery);
Vue.component('icon-component', Icon);
Vue.component('cart-component', Cart);
Vue.component('checkout-component', Checkout);
Vue.component('cart-popover', CartPopover);


new Vue({

    el: '#app',

    data: () => ({
      items: []
  }),

    computed: {
      total() {
        var total = 0;
        for(var i = 0; i < this.items.length; i++) {
          total += this.items[i].price;
      }
      return total;
  }
}

});