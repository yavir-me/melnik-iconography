<template>

    <div id="order-modal" class="modal fade" tabindex="-1" role="dialog">

      <div class="modal-dialog" role="document">

        <div class="modal-content">

          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Заказ {{ order[0].order_id }} </h4>
        </div>

        <div class="modal-body">

            <table class="table table-hover">
                <thead>
                    <tr>
                        <td>#</td>
                        <td>Название</td>
                        <td>Формат</td>
                        <td>Комментарии</td>
                        <td>Цена</td>
                    </tr>
                </thead>
                <tbody>
                <tr v-for="details in order">
                        <td> {{ details.icon_id }} </td>
                        <td> {{ details.title }} </td>
                        <td> {{ details.format }} </td>
                        <td> {{ details.comments }} </td>
                        <td> {{ details[details.format] }} </td>
                    </tr>
                </tbody>
            </table>

            <div class="form-group">
                <label for="order-status">Статус:</label>
                <select :bla="orderStatus" class="form-control" v-model="orderStatus">
                    <option :selected="(orderStatus === 'new' ? 'selected' : '')" value="new">Новый</option>
                    <option :selected="(orderStatus === 'in process' ? 'selected' : '')" value="in process">В обработке</option>
                    <option :selected="(orderStatus === 'closed' ? 'selected' : '')" value="closed">Закрытый</option>
                </select>
            </div>

        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
            <button type="button" @click="changeOrderStatus" class="btn btn-primary">Сохранить изменения</button>
        </div>

    </div><!-- /.modal-content -->

</div><!-- /.modal-dialog -->

</div><!-- /.modal -->

</template>

<script>

    export default {

        props: [
        'order',
        'orderStatus'
        ],

        watch: {
            order: function (value) {
                console.log(value);
            }
        },

        methods: {

            changeOrderStatus() {
                let status = this.orderStatus;
                axios.get(`/change-order-status/${this.order[0].order_id}/${status}`)
                .then(result => {
                    location.reload();
                });
            }

        },
    }

</script>