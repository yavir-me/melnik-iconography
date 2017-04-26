<template>

    <div class="row last-works-row">

        <h1 class="text-center gallery-header"> {{ gallery[0].name }} </h1>

        <div class="col-sm-12 col-md-3 col-lg-3 icon" v-for="icon in gallery[0].icons">

            <div class="thumbnail">

                <a :href="icon.path" data-fancybox="gallery" ><img :src="'/' + icon.path"></a>

                <div class="caption">

                    <h3 class="text-center"> {{ icon.name || 'some long name goes here bla and St. Anna\'s Icons'}} </h3>

                    <div class="item-actions">

                        <div class="cols-sm-12 col-md-6 pull-left">

                            <a :href="'/icon/' + icon.id"> {{ $t('home.view') }} </a>

                        </div>

                        <div class="cols-sm-12 col-md-6 pull-right">

                            <a href="#" data-toggle="modal" data-target="#quick-order-modal"> {{ $t('home.quick-order') }} </a>

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
        'gallery'
        ],

        data: () => ({
        }),

        mounted() {
            console.log(this.gallery[0].name);
        }

    }

</script>