<template>

  <form action="/artisan" method="POST">
    {{csrf_field()}}

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

    <div class="form-group">
      <input type="submit" value="Войти" class="btn btn-success pull-left">
    </div>

  </form>

</template>

<script>

  export default {

    data: () => ({

    })

  }

</script>