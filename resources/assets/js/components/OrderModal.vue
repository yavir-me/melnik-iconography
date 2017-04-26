<template>

    <!-- Order modal -->
    <div class="modal fade" id="make-order-modal" tabindex="-1" role="dialog" aria-labelledby="order-label">

        <div class="modal-dialog" role="document">

          <div class="modal-content">

            <div class="modal-header">

              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
              <h4 class="modal-title text-center" id="order-label">Order details</h4>

          </div>

          <form action="/make-order" method="POST" class="form-horizontal" id="make-order-form">

              <div class="modal-body">

                  <input type="hidden" name="_token" :value="csrfField">

                  <div class="form-group" id="order-full-name">

                      <label for="full-name" class="col-sm-2 control-label">
                          Full Name<span class="danger">*</span>
                      </label>

                      <div class="col-sm-10">
                        <input type="text" name="full-name" class="form-control" id="full-name" required>
                        <strong class="danger" id="order-errors-full-name"></strong>
                    </div>

                </div>

                <div class="form-group" id="order-email">

                  <label for="email" class="col-sm-2 control-label">
                      Email<span class="danger">*</span>
                  </label>

                  <div class="col-sm-10">

                    <input type="email" class="form-control" name="email" id="email" required>
                    <strong class="danger" id="order-errors-email"></strong>

                </div>

            </div>

            <div class="form-group" id="order-phone">

              <label for="phone" class="col-sm-2 control-label">
                  Phone<span class="danger">*</span>
              </label>

              <div class="col-sm-10">

                <input type="tel" class="form-control" name="phone" id="phone" required>
                <strong class="danger" id="order-errors-phone"></strong>

            </div>

        </div>

        <div class="form-group" id="order-comment">

          <label for="comment" class="col-sm-2 control-label">Comment</label>

          <div class="col-sm-10">

            <textarea class="form-control" id="comment" name="comment" rows="4" ></textarea>
            <strong class="danger" id="order-errors-comment"></strong>

        </div>

    </div>

</div>

<div class="modal-footer">

    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-success">Make order</button>

</div>

</form>

</div>
</div>
</div>

</template>


<script>
    export default {
        data() {
            return {
                csrfField: Laravel.csrfToken
            }
        }
    }
</script>