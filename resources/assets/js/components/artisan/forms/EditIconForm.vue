<template>

    <form :action="`/dashboard/${path.gallery}/${path.id}`" method="POST">

        <input type="hidden" name="_token" :value="csrfField">
        <input type="hidden" name="id" :value="(data ? data.id : '')">
        <input type="hidden" name="lang_id" :value="lang">
        <input type="hidden" name="gallery_name" :value="path.gallery">
        <input type="hidden" name="path" :value="path.path">

        <div class="form-group">
            <label for="title">Название</label>
            <input type="text" id="title" class="form-control" name="title" placeholder="Название" v-model="data ? data.title : form.title">
        </div>

        <div class="form-group">
            <label for="description">Описание</label>
            <textarea id="description" class="form-control" name="description" placeholder="Описание" v-model="data ? data.description : form.description"></textarea>
        </div>

        <div class="form-group">
            <label for="a3">Цена за формат А3</label>
            <input type="text" id="a3" class="form-control" name="a3" placeholder="A3" v-model="data ? data.a3 : form.a3">
        </div>

        <div class="form-group">
            <label for="a4">Цена за формат А4</label>
            <input type="text" id="a4" class="form-control" name="a4" placeholder="A4" v-model="data ? data.a4 : form.a4">
        </div>

        <div class="form-group">
            <label for="a5">Цена за формат А5</label>
            <input type="text" id="a5" class="form-control" name="a5" placeholder="A5" v-model="data ? data.a5 : form.a5">
        </div>

        <div class="form-group">
            <label for="meta-keywords">Meta Keywords</label>
            <textarea id="meta-keywords" class="form-control" name="meta_keywords" placeholder="Meta Keywords" v-model="data ? data.meta_keywords : form.meta_keywords"></textarea>
        </div>

        <div class="form-group">
            <label for="meta-description">Meta Description</label>
            <textarea id="meta-description" class="form-control" name="meta_description" placeholder="Meta Description" v-model="data ? data.meta_description : form.meta_description"></textarea>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-success update-icon-submit">Сохранить</button>
        </div>

    </form>

</template>

<script>

    export default {

        props: [
        'data',
        'path',
        'lang'
        ],

        mounted() {
            console.log(this.lang);
        },

        data: () => ({
            csrfField: Laravel.csrfToken,
            form: new Form({
                title: '',
                description: '',
                a3: '',
                a4: '',
                a5: '',
                meta_keywords: '',
                meta_description: ''
            }),

        }),

    }

</script>