<template>

    <div class="row last-works-row">

        <h1 class="text-center works-header"> {{ $t('home.header') }} </h1>

        <div class="col-sm-12 col-md-3 col-lg-3 icon" v-for="icon in lastIcons">

            <div class="thumbnail">

                <a :href="icon.path" :data-caption="icon.title" data-fancybox="gallery" ><img :src="icon.path"></a>

                <div class="caption">

                    <h3 class="text-center"> {{ icon.name || 'some long name goes here bla and St. Anna\'s Icons'}} </h3>

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
            lastIcons: []
        }),

        beforeCreate() {

            axios.get('/get-last-icons')
            .then(lastIcons => {
                this.lastIcons = lastIcons.data;
            });

        }

    }

</script>