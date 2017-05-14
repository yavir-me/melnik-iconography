import Vue from 'vue';
import axios from '../../../node_modules/axios/dist/axios.min.js';
import VueInternalization from 'vue-i18n';
import Locales from './vue-i18n-locales.generated.js';
import VueCookie from 'vue-cookie';
import Form from './core/Form.js';
import Cart from './core/Cart.js';
import swal from 'sweetalert2';

window.Vue = Vue;

Vue.use(VueInternalization);
Vue.config.lang = 'en';
Vue.use(VueCookie);

Object.keys(Locales).forEach(function (lang) {
  Vue.locale(lang, Locales[lang])
});


window.axios = axios;
window.axios.defaults.headers.common = {
    'X-CSRF-TOKEN': window.Laravel.csrfToken,
    'X-Requested-With': 'XMLHttpRequest'
};

window.Form = Form;
window.Cart = Cart;

// localization realization vue
Vue.prototype.trans = (key) => {
    return _.get(window.trans, key, key);
};

// Bootstrap carousel
$('#myCarousel').carousel({
  pause: true,
  interval: true, 
  wrap: true 
});

// Bootstrap tooltips
$(function () {

  $('[data-toggle="tooltip"]').tooltip({
    placement: 'bottom'
});

    // init cart trigger
    $('#cart-holder').popover({
        trigger: 'click',
        html: true,
        placement: 'bottom'
    });
});