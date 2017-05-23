<template>

        <form method="POST" :action="`/dashboard/add-to-gallery/${parsedPath}/create`" enctype="multipart/form-data">

            <input type="hidden" name="_token" :value="csrfField">
            <input type="hidden" name="path" :value="parsedPath">

            <p class="alert alert-info"><strong>Русский</strong></p>

            <div class="form-group">
                <label for="image">Изображение <span class="alert-danger">*</span></label>
                <input type="file" name="image" id="image" class="form-control">
            </div>

            <div class="form-group">
                <label for="title">Название</label>
                <input type="text" id="title" class="form-control" name="title_ru" placeholder="Название">
            </div>

            <div class="form-group">
                <label for="description">Описание</label>
                <textarea id="description" class="form-control" name="description_ru" placeholder="Описание"></textarea>
            </div>

            <div class="form-group">
                <label for="a3">Цена за формат А3</label>
                <input type="text" id="a3" class="form-control" name="a3" placeholder="A3">
            </div>

            <div class="form-group">
                <label for="a4">Цена за формат А4</label>
                <input type="text" id="a4" class="form-control" name="a4" placeholder="A4">
            </div>

            <div class="form-group">
                <label for="a5">Цена за формат А5</label>
                <input type="text" id="a5" class="form-control" name="a5" placeholder="A5">
            </div>

            <div class="form-group">
                <label for="meta-keywords">Meta Keywords</label>
                <textarea id="meta-keywords" class="form-control" name="meta_keywords_ru" placeholder="Meta Keywords"></textarea>
            </div>

            <div class="form-group">
                <label for="meta-description">Meta Description</label>
                <textarea id="meta-description" class="form-control" name="meta_description_ru" placeholder="Meta Description"></textarea>
            </div>

            <p class="alert alert-info"><strong>Українська</strong></p>

            <div class="form-group">
                <label for="title">Название</label>
                <input type="text" id="title" class="form-control" name="title_ua" placeholder="Название">
            </div>

            <div class="form-group">
                <label for="description">Описание</label>
                <textarea id="description" class="form-control" name="description_ua" placeholder="Описание"></textarea>
            </div>

            <div class="form-group">
                <label for="meta-keywords">Meta Keywords</label>
                <textarea id="meta-keywords" class="form-control" name="meta_keywords_ua" placeholder="Meta Keywords"></textarea>
            </div>

            <div class="form-group">
                <label for="meta-description">Meta Description</label>
                <textarea id="meta-description" class="form-control" name="meta_description_ua" placeholder="Meta Description"></textarea>
            </div>

            <p class="alert alert-info"><strong>English</strong></p>

            <div class="form-group">
                <label for="title">Название</label>
                <input type="text" id="title" class="form-control" name="title_en" placeholder="Название">
            </div>

            <div class="form-group">
                <label for="description">Описание</label>
                <textarea id="description" class="form-control" name="description_en" placeholder="Описание"></textarea>
            </div>

            <div class="form-group">
                <label for="meta-keywords">Meta Keywords</label>
                <textarea id="meta-keywords" class="form-control" name="meta_keywords_en" placeholder="Meta Keywords"></textarea>
            </div>

            <div class="form-group">
                <label for="meta-description">Meta Description</label>
                <textarea id="meta-description" class="form-control" name="meta_description_en" placeholder="Meta Description"></textarea>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-success update-icon-submit">Сохранить</button>
            </div>

        </form>

</template>

<script>

    export default {

        props: [
        'path',
        'storage'
        ],

        mounted() {
            console.log(this.storage);
        },

        computed: {

            parsedPath() {
                return this.path.trim();
            }

        },

        data: () => ({
            csrfField: Laravel.csrfToken,
        }),

    }

</script>