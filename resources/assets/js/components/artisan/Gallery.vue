<template>

    <div class="row">

        <div class="col-sm-12 col-md-4 col-lg-4 icon" v-for="(icon, key) in getIcons">

            <div class="thumbnail">

                <a :href="getIcons[key].path" :data-caption="getIcons[key].title" data-fancybox="gallery" ><img :src="`/${getIcons[key].path}`"></a>

                <div class="caption">

                    <h3 class="text-center"> {{ getIcons[key].title }} </h3>

                    <div class="item-actions">

                        <div class="cols-sm-6">
                            <a :href="`/dashboard/${getGallery.path}/${getIcons[key].id}`"> <span class="glyphicon glyphicon-edit"></span> Редактировать </a>
                        </div>

                        <div class="cols-sm-6">
                            <a @click.prevent="removeConfirmation(getIcons[key].id)" href="#"> <span class="glyphicon glyphicon-remove"></span> Удалить </a>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</template>

<script>

    export default {

        props: [
        'gallery',
        'icons',
        'storage'
        ],

        computed: {

            getGallery() {
                return JSON.parse(this.gallery);
            },

            getIcons() {
                return JSON.parse(this.icons);
            },

        },

        methods: {

            removeConfirmation(id) {
                swal({
                    title: 'Вы точно хотите удалить работу?',
                    type: 'info',
                    showCancelButton: true,
                    confirmButtonText: 'Да',
                    cancelButtonText: 'Нет'
                }).then(function() {
                    axios.delete(`/dashboard/galleries/icon/${id}`)
                    .then(resp => {
                        location.reload();
                    });
                }, function(dismiss) {
                });
            }

        },

    }

</script>