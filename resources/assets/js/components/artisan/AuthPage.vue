<template>

    <div class="row vertical-center">

      <div class="col-sm-12 col-md-6 col-md-offset-3 login-block">

        <div class="panel panel-primary">

          <div class="panel-heading">
              <h3 class="text-center">Логин</h3>
          </div>

          <div class="panel-body">

              <login-form :errors="errors"></login-form>

          </div>

      </div>

  </div>

</div>

</template>

<script>

export default {

    props: [
    'errors'
    ],

    components: {
        'login-form': require('../artisan/forms/LoginForm.vue')
    }

}

</script>