<template>

    <div class="row last-works-row">

        <h1 class="text-center works-header"> {{ $t('home.header') }} </h1>

        <div class="col-sm-12 col-md-3 col-lg-3 icon" v-for="icon in lastIcons">

            <div class="thumbnail">

                <a :href="icon.path" :data-caption="icon.title" data-fancybox="gallery" ><img :src="icon.path"></a>

                <div class="caption">

                <h3 class="text-center"> {{ icon.title || 'Icon title'}} </h3>

                    <div class="item-actions">

                        <div class="cols-sm-12">

                            <a :href="`/gallery/${icon.gallery.path}/${icon.id}`"> {{ $t('home.view') }} </a>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>


</template>

<script>

    export default  {

        data: () => ({
            lastIcons: [],
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
            this.getLastIcons();
        },

        getLastIcons() {
            axios.get(`/get-last-icons/${this.langs[this.curLang].id}`)
            .then(lastIcons => {
                console.log(this.langs[this.curLang].id);
                this.lastIcons = lastIcons.data;
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