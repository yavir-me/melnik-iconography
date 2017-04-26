<template>
  <div id="nav" class="row">
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/"><span class="danger">M-</span>Arts</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

          <ul class="nav navbar-nav navbar-left make-order-ul">
            <li role="presentation">
              <a href="#" data-toggle="modal" class="success" data-target="#make-order-modal">
                <i class="fa fa-pencil" aria-hidden="true"></i>
                {{ $t('navigation.make_order') }}
              </a>
            </li>
          </ul>

          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ $t('navigation.gallery') }}<span class="caret"></span></a>
              <ul class="dropdown-menu">

                <li v-for="gallery in galleries">
                  <a :href="`/gallery/` + gallery.path"> {{ gallery.name }} </a>
                </li>

              </ul>
            </li>

            <li role="presentation">
              <a href="/about">{{ $t('navigation.about') }}</a>
            </li>

            <li role="presentation">
              <a href="/contacts">{{ $t('navigation.contacts') }}</a>
            </li>

            <li role="presentation">
              <a href="/shipping">{{ $t('navigation.payment_delivery') }}</a>
            </li>

            <li role="presentation">
              <a href="#">
                <span aria-hidden="true" class="glyphicon glyphicon-shopping-cart"></span>
                {{ $t('navigation.cart') }}
                <span class="badge">0</span>
              </a>
            </li>

            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                <span aria-hidden="true" class="glyphicon glyphicon-user"></span>
                {{ $t('navigation.personal_account') }}
                <span class="caret"></span>
              </a>
              <ul class="dropdown-menu">
                <li><a href="#">Manage account</a></li>
                <li><a href="#">Some other stuff</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="/logout">Logout</a></li>
              </ul>
            </li>

            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                <img src="img/langs/ukraine.svg">
                <span class="caret"></span>
              </a>

              <ul class="dropdown-menu language-selector">
                <li>
                  <a href="#"><img src="img/langs/ukraine.svg"></a>
                </li>
                <li role="separator" class="divider"></li>
                <li>
                  <a href="/us"><img src="img/langs/united-states.svg"></a>
                </li>
                <li role="separator" class="divider"></li>
                <li>
                  <a href="/ru"><img src="img/langs/russia.svg"></a>
                </li>
              </ul>
            </li>
          </ul>
        </div><!-- /.navbar-collapse -->

      </div>
    </nav>

    <div class="alert alert-warning order-gratitude-block alert-dismissible hide" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <strong>Thank you for the order!</strong> I'll contact you soon.
    </div>

    <quick-order-modal></quick-order-modal>

  </div>
</template>

<script>

  export default  {

    data: () => ({
      galleries: []
    }),

    beforeCreate() {

      axios.get('/get-galleries')
      .then(galleries => {
        this.galleries = galleries.data;
      });

    }

  }

</script>