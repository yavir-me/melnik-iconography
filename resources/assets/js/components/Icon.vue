<template>

    <div class="row icon-row">

        <h1 class="text-center icon-header"> {{ icon.title }} </h1>

        <div class="col-sm-12 col-md-6 icon-holder">

            <a :href="'/' + icon.path" :data-caption="icon.title" data-fancybox="gallery" ><img :src="'/' + icon.path"></a>

        </div>

        <div class="col-sm-12 col-md-6 desc-holder">

        <div class="row">
            <div class="col sm-12">
                {{ icon.description }}
            </div>
        </div>

        <form action="/add-to-cart">

                <div class="row" style="border:1px solid green;">

                    <h3>Select a size of the icon</h3>

                    <div class="col-sm-12">

                        <div class="btn-group" data-toggle="buttons">

                            <label class="btn btn-default">
                                <input type="radio" id="q156" name="quality[25]" value="a3" /> A3 (297 x 420 mm)
                            </label> 

                            <label class="btn btn-default">
                                <input type="radio" id="q157" name="quality[25]" value="a4" /> A4 (210 x 297 mm)
                            </label> 

                            <label class="btn btn-default">
                                <input type="radio" id="q158" name="quality[25]" value="a5" /> A5 (148 x 210 mm)
                            </label> 

                            <label class="btn btn-default">
                                <input type="radio" id="q159" name="quality[25]" value="custom" /> Custom
                            </label> 

                        </div>

                    </div>

                </div>

                <br/>

                <input type="submit" class="btn btn-primary" value="To cart"></input>
            </form>

        </div>

    </div>


</template>

<script>

    export default {

        props: [
        'icon'
        ],

    }

</script>