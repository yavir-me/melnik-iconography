import './bootstrap.js';

// Components importing
import TopMenu from './components/artisan/TopMenu.vue';
import Footer from './components/artisan/Footer.vue';

// Registering components
Vue.component('top-menu-component', TopMenu);
Vue.component('footer-component', Footer);


new Vue({

    el: '#app',

});