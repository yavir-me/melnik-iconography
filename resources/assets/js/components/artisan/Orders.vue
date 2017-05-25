<template>

    <div class="row">

        <div class="col-sm-12">

            <h2 class="text-center">Таблица заказов</h2>

            <table class="table table-hover orders-table">
                <thead>
                    <tr>
                        <td>
                            <span class="glyphicon glyphicon-menu-hamburger"></span> Номер
                        </td>
                        <td>
                            <span class="glyphicon glyphicon-user"></span> Заказчик
                        </td>
                        <td>
                            <span class="glyphicon glyphicon-earphone"></span> Телефон
                        </td>
                        <td>
                            <span class="glyphicon glyphicon-envelope"></span> Почта
                        </td>
                        <td>
                            <span class="glyphicon glyphicon-info-sign"></span> Статус
                        </td>
                    </tr>
                </thead>
                <tbody>
                    <tr @click="passOrder(order.id, order.status)"
                    :class="{
                        'active': order.status === 'closed',
                        'info': order.status === 'in process',
                        'success': order.status === 'new',
                    }"
                    v-for="order in parsedOrders" data-toggle="modal" data-target="#order-modal">
                    <td> {{ order.id }}</td>
                    <td> {{ order.name }}</td>
                    <td> {{ order.phone }}</td>
                    <td> {{ order.email }}</td>
                    <td v-if="order.status === 'new'"> Новый </td>
                    <td v-else-if="order.status === 'in process'"> В обработке </td>
                    <td v-else-if="order.status === 'closed'"> Закрытый </td>
                </tr>
            </tbody>
        </table>

    </div>

    <orders-modal :orderStatus="orderStatus" :order="orderDetails"></orders-modal>

</div>


</template>

<script>

    export default {

        components: {
            'orders-modal': require('./forms/OrdersModal.vue')
        },

        props: [
        'orders'
        ],

        data: () => ({
            parsedOrders: [],
            orderDetails: '',
            orderStatus: ''
        }),

        mounted() {
            this.prepareOrders();
        },

        methods: {
            prepareOrders() {
                this.parsedOrders = JSON.parse(this.orders);
            },

            passOrder(id, orderStatus) {
                this.orderStatus = orderStatus;

                axios.get(`/get-order-details/${id}`)
                .then(details => {
                    this.orderDetails = details.data;
                });
            }
        }

    }

</script>