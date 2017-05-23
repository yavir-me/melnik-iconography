<template>

  <div class="row update-work-row">

    <h2 class="text-center"> {{ iconsParsed['ru'] ? iconsParsed['ru'].title : 'Редактировать икону' }} </h2>

    <div class="col-sm-12">

      <ul  class="nav nav-pills">
        <li class="active">
          <a  href="#ru-lang" data-toggle="tab">Русский</a>
        </li>
        <li><a href="#en-lang" data-toggle="tab">English</a>
        </li>
        <li><a href="#ua-lang" data-toggle="tab">Українська</a>
        </li>
      </ul>

      <div class="tab-content clearfix">

        <div class="tab-pane active" id="ru-lang">
          <edit-icon-form :path="pathParsed" lang="2" :data="iconsParsed['ru']"></edit-icon-form>
        </div>

        <div class="tab-pane" id="en-lang">
          <edit-icon-form :path="pathParsed" lang="3" :data="iconsParsed['en']"></edit-icon-form>
        </div>

        <div class="tab-pane" id="ua-lang">
          <edit-icon-form :path="pathParsed" lang="1" :data="iconsParsed['ua']"></edit-icon-form>
        </div>

      </div>

      <span v-if="errorsParsed[0]" class="alert alert-success"> {{ errorsParsed[0] }} </span>

    </div>

  </div>

</template>

<script>

  export default {

    components: {
      'edit-icon-form': require('./forms/EditIconForm.vue'),
    },

    props: [
    'icons',
    'errors',
    'path'
    ],

    data: () => ({

    }),

    mounted() {
      console.log('bla');
    },

    computed: {

      iconsParsed() {
        return JSON.parse(this.icons);
      },

      errorsParsed() {
        return JSON.parse(this.errors);
      },

      pathParsed() {
        return JSON.parse(this.path);
      },

    },

  }

</script>