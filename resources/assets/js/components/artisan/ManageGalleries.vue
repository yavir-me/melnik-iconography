<template>

    <div class="row">

        <h2 class="text-center">Таблица галерей</h2>

        <span class="alert alert-success" v-if="errorsParsed" v-text="errorsParsed[0]"></span>

        <div class="col-sm-12 col-md-8 col-md-offset-2">
            <table class="table table-hover galleries-table">
                <thead>
                    <tr>
                        <td>
                            <span class="glyphicon glyphicon-inbox"></span>
                            Категория
                        </td>
                        <td>
                            <span class="glyphicon glyphicon-plus"></span>
                            Действие
                        </td>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(gallery, key) in getGalleries">
                        <td>
                            <a :href="`/dashboard/galleries/${getGalleries[key].path}`">{{ getGalleries[key].name }}</a>
                        </td>
                        <td>
                            <a :href="`/dashboard/add-to-gallery/${getGalleries[key].path}/create`" class="btn btn-success">Добавить икону</a>
                        </td>
                    </tr>
                </tbody>
            </table>

        </div>

    </div>

</template>

<script>

    export default {
        props: [
        'galleries',
        'errors'
        ],

        computed: {

            getGalleries() {
                return JSON.parse(this.galleries);
            },

            errorsParsed() {
                if (JSON.parse(this.errors).length) {
                    return JSON.parse(this.errors);
                } else {
                    return false;
                }
            }

        },

    }


</script>