import Vue from 'vue';
import axios from '../../../node_modules/axios/dist/axios.min.js';
import Form from './core/Form.js';
import VueInternalization from 'vue-i18n';
import Locales from './vue-i18n-locales.generated.js';

window.Vue = Vue;
Vue.config.lang = 'ru';

Vue.use(VueInternalization);

Object.keys(Locales).forEach(function (lang) {
  Vue.locale(lang, Locales[lang])
});


window.axios = axios;
window.axios.defaults.headers.common = {
    'X-CSRF-TOKEN': window.Laravel.csrfToken,
    'X-Requested-With': 'XMLHttpRequest'
};

window.Form = Form;

// localization realization vue
Vue.prototype.trans = (key) => {
    return _.get(window.trans, key, key);
};

$('#myCarousel').carousel({
          pause: true,
          interval: true, 
          wrap:true 
      });


