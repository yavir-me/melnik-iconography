<template>

  <div class="row update-work-row">

    <h2 class="text-center"> Добавить новую работу </h2>

    <div class="col-sm-12">

      <div class="tab-content clearfix">

        <div class="tab-pane active" id="ru-lang">

          <add-icon-form :storage="storage" :path="path"></add-icon-form>

        </div>

      </div>

    </div>

  </div>

</template>

<script>

  export default {

    props: [
    'path',
    'storage'
    ],

    components: {
      'add-icon-form': require('./forms/AddNewIconForm.vue'),
    },

    data: () => ({
      iconsParsed: {}
    }),

  }

</script>