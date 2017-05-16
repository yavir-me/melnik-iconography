<template>
  <div id="nav" class="row">
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="/">
            <img src="/img/logo.png" alt="">
        </a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ $t('navigation.gallery') }}<span class="caret"></span></a>
              <ul class="dropdown-menu">

                <li v-for="gallery in galleries">
                  <a :href="`/gallery/` + gallery.path"> {{ gallery.name }} </a>
              </li>

          </ul>
      </li>

      <li role="presentation">
          <a href="/about">{{ $t('navigation.about') }}</a>
      </li>

      <li role="presentation">
          <a href="/contacts">{{ $t('navigation.contacts') }}</a>
      </li>

      <li role="presentation">
          <a href="/shipping">{{ $t('navigation.payment_delivery') }}</a>
      </li>

      <li role="presentation">
          <a id="cart-holder" @click="toggleCart" href="#" data-toggle="popover">
            <span aria-hidden="true" class="glyphicon glyphicon-shopping-cart"></span>
            {{ $t('navigation.cart') }}
            <span class="badge"> {{ cartCounter }} </span>
        </a>
        <cart-popover v-if="cartCounter" v-show="showPopover" @remove-item="removeFromCart" :basket="cartContent"></cart-popover>
    </li>

    <li class="dropdown">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
        <img :src="countryFlags[curLang]">
        <span class="caret"></span>
    </a>

    <ul @click.prevent="changeLang($event.target)" class="dropdown-menu language-selector">
        <li v-if="curLang != 'ua'">
          <a href="#"><img lang="ua" :src="countryFlags.ua"></a>
      </li>
      <hr class="devider">
      <li v-if="curLang != 'en'">
          <a href="/en"><img lang="en" :src="countryFlags.en"></a>
      </li>
      <hr class="devider">
      <li v-if="curLang != 'ru'">
          <a href="/ru"><img lang="ru" :src="countryFlags.ru"></a>
      </li>
  </ul>
</li>
</ul>
</div><!-- /.navbar-collapse -->

</div>
</nav>

<div class="alert alert-warning order-gratitude-block alert-dismissible hide" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Thank you for the order!</strong> I'll contact you soon.
</div>

<!-- <quick-order-modal></quick-order-modal> -->

</div>
</template>

<script>
  export default {

    data: () => ({
      galleries: [],
      countryFlags: {
        ua: '/img/langs/ukraine.svg',
        ru: '/img/langs/russia.svg',
        en: '/img/langs/united-states.svg'
    },
    cartObj: new Cart(),
    cart: {},
    cartCounter: 0,
    cartContent: null,
    showPopover: false,
    curLang: ''
}),

    mounted() {
      this.defineLang();

      axios.get('/get-galleries')
      .then(galleries => {
        this.galleries = galleries.data;
    });

      this.updateCartCounter();
  },

  methods: {

    defineLang() {
        let lang = this.$cookie.get('lang');

        if (lang) {
            Vue.config.lang = lang;
            this.curLang = lang;
        } else {
            Vue.config.lang = 'ru';
            this.curLang = 'ru';
        }

    },

    changeLang(e) {
        console.log(e);
        let lang = e.getAttribute('lang');
        this.curLang = lang;
        Vue.config.lang = lang;
        this.$cookie.set('lang', lang);
    },

    updateCartCounter() {
        let cart = JSON.parse(this.$cookie.get('cart'));
        this.cartContent = cart;

        if (cart) {
            let c = 0;
            for(let cur in cart) {
                c++;
            }
            this.cartCounter = c;
        }
        else {
          this.cartCounter = 0;
      }

      return this.cartCounter;

  },

  removeFromCart(id) {
    let icon = {id: id};
    this.cartObj.clearFromCart(icon);
    this.updateCartCounter();
    this.$parent.$children[2].clearSelection(id);
},

toggleCart() {
    this.showPopover = this.showPopover ? false : true;
}

}

}

</script>