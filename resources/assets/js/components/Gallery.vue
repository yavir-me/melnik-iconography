<template>

    <div class="row last-works-row">

        <h1 class="text-center gallery-header"> {{ gallery.name }} </h1>

        <div class="col-sm-12 col-md-3 col-lg-3 icon" v-for="icon in icons">

            <div class="thumbnail">
                <a :href="'/' + icon.path" :data-caption="icon.title" data-fancybox="gallery" ><img :src="'/' + icon.path"></a>

                <div class="caption">

                    <h3 class="text-center"> {{ icon.title }} </h3>

                    <div class="item-actions">

                        <div class="cols-sm-12">

                            <a :href="`/gallery/${gallery.path}/${icon.id}`"> {{ $t('home.view') }} </a>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</template>

<script>

    export default  {

        props: [
        'path'
        ],

        data: () => ({
            icons: [],
            gallery: '',
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
        }
    }),

        mounted() {
            this.changeIconsLang();
        },

        methods: {

          changeIconsLang() {
            this.defineLang();
            this.geticons();
        },

        geticons() {
            axios.get(`/get-by-category/${this.path}/${this.langs[this.curLang].id}`)
            .then(icons => {
                this.gallery = icons.data[0];
                this.icons = icons.data[0].icons;
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

      }

  }

    }

</script>