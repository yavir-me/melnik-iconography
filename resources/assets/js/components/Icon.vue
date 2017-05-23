<template>

    <div class="row icon-row">

        <h1 class="text-center icon-header"> {{ icon.title }} </h1>

        <div class="col-sm-12 col-md-5 icon-holder">

            <a :href="'/' + icon.path" :data-caption="icon.title" data-fancybox="gallery" ><img :src="'/' + icon.path"></a>

        </div>

        <div class="col-sm-12 col-md-7 desc-holder">

            <div class="row">
                <div class="col sm-12 icon-description">
                    {{ icon.description }}
                </div>
            </div>


            <h3>{{ $t('icon.size_selection') }}</h3>

            <div class="row">

                <form @submit.prevent="onSubmit" @click="manageSelectors($event.target)">

                    <div class="col-sm-12">

                        <div class="btn-group format-options">

                            <label v-for="(val, key) in formats" :for="key" type="defined-option"
                            :class="['btn', {'btn-success': selected === key, 'btn-default': selected !== key}]"
                            @click="selected = key">
                            <input type="radio" :id="key" :value="key" v-model="formatSize">
                            {{ $t('icon.' + key + '_format') }} - <strong> {{ val }} {{ $t('icon.currency') }} </strong>
                        </label> 

                        <label for="custom-format" type="custom-option"
                        :class="['btn', {'btn-success': selected === 'custom', 'btn-default': selected !== 'custom'}]"
                        @click="selected = 'custom'"
                        >
                        <input type="radio" id="custom-format" value="custom" v-model="formatSize" >
                        {{ $t('icon.custom_size') }}
                    </label> 

                    <textarea v-if="showTextarea" @keyup="checkComment" class="form-control" id="comment" name="comment" rows="4" :placeholder="lang.commentPlaceholder" v-model="form.comment"></textarea>

                </div>

            </div>

            <br/>

            <input :disabled="disabledButton" :added="itemStatus" type="submit" :class="['btn', {'btn-success': selected || itemStatus === 'added'}]" :value="cartBtnText"></input>

        </form>

    </div>

</div>

</div>


</template>

<script>

    export default {

        props: [
        'path',
        'id'
        ],

        data: () => ({
            form: new Form({
                comment: ''
            }),
            formats: {},
            icon: {},
            cartObj: new Cart(),
            disabledButton: true,
            showTextarea: false,
            formatSize: '',
            selected: '',
            cart: {},
            cartBtnText: null,
            itemStatus: null,
            lang: {},
            curLang: '',
            langs: {
                ua: {
                  id: 1
              },
              ru: {
                id: 2
            },
            en: {
                id: 3
            }
        },
    }),

        mounted() {

            this.changeCurLang();

            this.cart = this.cartObj.defineCart();

            this.cartBtnText = this.$t('icon.to_cart');

            this.checkAvailable();

            this.langItemsInit();
        },

        methods: {

          changeCurLang() {
            this.defineLang();
            this.getIcon();
        },

        langItemsInit() {
            this.lang = {
                commentPlaceholder: this.$t('icon.textarea_placeholder')
            }
        },

        getIcon() {
            axios.get(`/get-icon/${this.id}/${this.langs[this.curLang].id}`)
            .then(icon => {
                this.icon = icon.data.icon;
                this.formats = icon.data.formats;
            });
        },

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

      checkAvailable() {
                // check if this item is already in cart
                for (let cur in this.cart) {
                    if (this.cart[cur].id === this.icon.id) {
                        this.itemStatus = 'added';
                        this.selected = this.cart[cur].format;
                        this.cartBtnText = this.$t('icon.added');
                        this.disabledButton = false;
                    }
                }
            },

            manageSelectors(e) {
                let option = e.getAttribute('type');

                if (option === 'defined-option') {
                    this.disabledButton = this.showTextarea = false;
                } else if (option === 'custom-option') {
                    this.showTextarea =  true;
                    this.checkComment();
                }
            },

            checkComment() {
                if (this.form.comment) {
                    this.disabledButton = false;
                } else {
                    this.disabledButton = true;
                }
            },

            onSubmit() {

                if ( this.itemStatus === 'added' ) {
                    this.cartObj.clearFromCart(this.icon);
                    this.refreshFormItems();

                } else {
                    this.itemStatus = 'added';
                    this.cartBtnText = this.$t('icon.added')

                    let item = this.gatherItem();

            // sending the product to cart
            this.cartObj.prepareToCart(item);
        }

        this.$parent.$children[0].updateCartCounter();

    },

    gatherItem() {
        let item = {};
        item.id = this.icon.id;
        item.path = this.icon.path;
        item.name = this.icon.title;
        item.format = this.formatSize;
        item.price = {
            a3: this.icon.a3,
            a4: this.icon.a4,
            a5: this.icon.a5,
        }
        item.gallery = this.icon.gallery.path;

        if (this.showTextarea && this.form.comment) {
            item.comment = this.form.comment;
        } else {
            item.comment = '';
        }

        return item;
    },

    refreshFormItems() {
        this.selected = '';
        this.cartBtnText = this.$t('icon.to_cart');
        this.disabledButton = true;
        this.showTextarea = false;
        this.itemStatus = 'not-added';
    },

    clearSelection(id) {
        if (this.icon.id === id) {
            this.refreshFormItems();
        }
    }

}

}

</script>