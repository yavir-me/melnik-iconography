<template>

    <div class="row last-works-row">

        <h1 class="text-center gallery-header"> {{ gallery.name }} </h1>

        <div class="col-sm-12 col-md-3 col-lg-3 icon" v-for="icon in gallery.icons">

            <div class="thumbnail">

                <a :href="'/' + icon.path" :data-caption="icon.title" data-fancybox="gallery" ><img :src="'/' + icon.path"></a>

                <div class="caption">

                    <h3 class="text-center"> {{ icon.name || 'some long name goes here bla and St. Anna\'s Icons'}} </h3>

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
        'gallery'
        ],

        data: () => ({
        })

    }

</script>