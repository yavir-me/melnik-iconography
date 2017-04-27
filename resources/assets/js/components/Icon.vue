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


            <h3>Select a size of the icon</h3>

            <div class="row">

                
                <form @submit.prevent="onSubmit" @click="notify($event.target)" action="/add-to-cart">

                    <div class="col-sm-12">

                        <div class="btn-group format-options" data-toggle="buttons">

                            <label type="defined-option" class="btn btn-default">
                                <input type="radio" id="q156" name="a3" value="a3" /> A3 (297 x 420 mm) - 200 ₴
                            </label> 

                        <label type="defined-option" class="btn btn-default">
                            <input type="radio" id="q157" name="a4" value="a4" /> A4 (210 x 297 mm) - 200 ₴
                        </label> 

                    <label type="defined-option" class="btn btn-default">
                        <input type="radio" id="q158" name="a5" value="a5" /> A5 (148 x 210 mm) - 200 ₴
                    </label> 

                <label type="custom-option" class="btn btn-default">
                    <input type="radio" id="q159" name="custom" value="custom" /> Custom size
                </label> 

            <textarea v-if="showTextarea" class="form-control" id="comment" name="comment" rows="4" placeholder="some text goes here" v-model="form.comment"></textarea>

        </div>

    </div>


    <br/>

    <input :disabled="disabledButton" title="You should select one of the size options" type="submit" class="btn btn-success" value="To cart"></input>
</form>

</div>

</div>

</div>


</template>

<script>

    export default {

        props: [
        'icon'
        ],

        data: () => ({
            form: new Form({
                comment: ''
            }),
            disabledButton: true,
            showTextarea: false
        }),

        methods: {

            notify(e) {
                let option = e.getAttribute('type');

                if (option === 'defined-option') {
                    this.disabledButton = this.showTextarea = false;
                } else if (option === 'custom-option') {
                    this.disabledButton = false;
                    this.showTextarea =  true;
                }
            },

            onSubmit() {
                if (this.showTextarea) {

                }
            }

        }

    }

</script>