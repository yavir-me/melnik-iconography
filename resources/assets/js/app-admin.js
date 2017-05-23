import './bootstrap.js';

// Components importing
import AuthPage from './components/artisan/AuthPage.vue';
import Navigation from './components/artisan/Navigation.vue';
import ManageGalleries from './components/artisan/ManageGalleries.vue';
import Gallery from './components/artisan/Gallery.vue';
import Icon from './components/artisan/Icon.vue';
import NewIcon from './components/artisan/NewIcon.vue';
import Orders from './components/artisan/Orders.vue';
import Footer from './components/artisan/Footer.vue';

// Registering components
Vue.component('auth-page-component', AuthPage);
Vue.component('navigation-component', Navigation);
Vue.component('manage-galleries-component', ManageGalleries);
Vue.component('gallery-component', Gallery);
Vue.component('icon-component', Icon);
Vue.component('new-icon-component', NewIcon);
Vue.component('orders-component', Orders);
Vue.component('footer-component', Footer);


new Vue({

    el: '#app',

});