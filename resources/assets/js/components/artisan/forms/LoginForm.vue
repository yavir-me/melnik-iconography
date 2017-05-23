<template>

  <form action="/artisan" method="POST">

      <input type="hidden" name="_token" :value="csrfField">

      <div class="form-group">

          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
            <input type="email" name="email" placeholder="Почта" class="form-control" required>
        </div>

    </div>

    <div class="form-group">

      <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
        <input type="password" name="password" placeholder="Пароль" class="form-control" required>
    </div>

</div>

<div v-if="errorsBlock" class="form-group">

    <div class="alert alert-danger">
        <ul>
            <li v-for="(item, key) in getErrors"> {{ getErrors[key] }} </li>
        </ul>
    </div>

</div>

<div class="form-group">
  <input type="submit" value="Войти" class="btn btn-success pull-left">
</div>


</form>

</template>

<script>

  export default {

    props: [
    'errors'
    ],

    data: () => ({
        csrfField: Laravel.csrfToken,
        errorsBlock: false,
    }),

    computed: {
        getErrors() {
            return JSON.parse(this.errors);
        }
    },

    mounted() {
        this.checkForErrors();
    },

    methods: {

        checkForErrors() {
            let errors = JSON.parse(this.errors);
            for(let prop in errors) {
                if (errors.hasOwnProperty(prop))
                    this.errorsBlock = true;
            }
        }

    },

}

</script>