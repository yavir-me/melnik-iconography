<template>

  <footer class="footer">

    <div class="container">

      <div class="col-sm-12 reach-me">

        <div class="col-sm-4 col-md-3 col-md-offset-4">
          <h3>Stay in touch:</h3>
          <p>Receive our latest news</p>
        </div>

        <div class="col-sm-8 col-md-5">
          <form action="/reach-me" method="POST"><input type="email" name="email" class="form-control" placeholder="Your email address"></form>
        </div>

      </div>

      <!-- Gallery -->
      <div class="col-sm-12 col-md-6 text-center gallery-block">
        <div class="panel panel-default">
          <div class="panel-heading">
            <i class="fa fa-lg fa-picture-o" aria-hidden="true"></i>
            {{ $t('footer.gallery') }}
          </div>
          <div class="panel-body">
            <ul>
              <li v-for="gallery in galleries">
                <a :href="`/gallery/` + gallery.path">{{ gallery.name }}</a>
              </li>
            </ul>
          </div>
        </div>
      </div>

      <!-- Contacts -->
      <div class="col-sm-12 col-md-6 text-center contact-block">
        <div class="panel panel-default">
          <div class="panel-heading">
            <i class="fa fa-lg fa-address-card-o" aria-hidden="true"></i>
            {{ $t('footer.contacts') }}
          </div>
          <div class="panel-body">

            <p> {{ $t('footer.contact_address') }} </p>
            <p> {{ $t('footer.phone') }} </p>

            <ul>
              <li>
                <a href="https://vk.com/id246571363" target="_blank"><i class="fa fa-3x fa-vk" aria-hidden="true"></i></a>
              </li>
              <li>
                <a href="https://www.facebook.com/profile.php?id=100013352461384" target="_blank"><i class="fa fa-3x fa-facebook" aria-hidden="true"></i></a>
              </li>
            </ul>
          </div>
        </div>
      </div>

    </div>

    <div class="row author-row text-center">

      <div class="col-sm-12 col-md-8 col-md-offset-2">

        <p> {{ $t('footer.developed_by') }} <a href="https://www.facebook.com/andrii.furman">Lucky_1</a> </p>

        <p> {{ $t('footer.copyrights') }}</p>

      </div>


    </div>

  </footer>
</template>

<script>
  export default {

    data: () => ({
      galleries: [],
    }),

    beforeCreate() {
      axios.get('/get-galleries')
      .then(galleries => {
        this.galleries = galleries.data;
      });
    }

  }
</script>