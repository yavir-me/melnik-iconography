<template>

    <div class="row checkout-row">

        <div class="col-sm-12 basket-content">

            <div class="col-sm-12">

                <h1 class="works-header text-center"> {{ $t('checkout.basket') }} </h1>

                <template v-if="cartState">
                    <table class="table table-hover order-table">
                        <thead>
                            <tr>
                                <td> {{ $t('checkout.name') }} </td>
                                <td> {{ $t('checkout.format') }} </td>
                                <td> {{ $t('checkout.price') }} </td>
                                <td> {{ $t('checkout.action') }} </td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="item in cart">
                                <td> {{ item.name }}</td>
                                <td> {{ item.format }}</td>
                                <td> {{ item.format === 'custom' ? $t('checkout.contract_price') : item.price[item.format] }} </td>
                                <td>
                                    <span aria-hidden="true" @click="removeItem(item.id)" class="remove-cart-item glyphicon glyphicon-remove"></span>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="total-amount">
                        <p> {{ $t('checkout.total_amount') }} <strong> {{ totalAmount }} </strong> </p>
                    </div>

                    <h1 class="works-header text-center"> {{ $t('checkout.buyer_information') }} </h1>

                    <div class="col-sm-12 col-md-8 col-md-offset-2">

                        <form @submit.prevent="confirmOrder" @keyup="checkOrderState($event.target)">

                          <input type="hidden" name="_token" :value="csrfField">

                          <input type="hidden" name="cart" :value="form.cart = cart">

                          <div class="form-group">
                            <label for="name"> {{ $t('checkout.name') }} <span class="danger">*</span> </label>
                            <input type="text" class="form-control" id="name" v-model="form.name">
                            <span class="alert-danger"
                            v-if="form.errors.has('name')"
                            v-text="form.errors.get('name')">
                        </span>
                    </div>

                    <div class="form-group">
                        <label for="phone"> {{ $t('checkout.phone') }} <span class="danger">*</span> </label>
                        <input type="text" class="form-control" id="phone" v-model="form.phone">
                        <span class="alert-danger"
                        v-if="form.errors.has('phone')"
                        v-text="form.errors.get('phone')">
                    </span>
                </div>

                <div class="form-group">
                    <label for="email"> {{ $t('checkout.email') }} </label>
                    <input type="email" class="form-control" id="email" v-model="form.email">
                </div>

                <input :disabled="disabledButton" type="submit" class="btn btn-success" :value="lang.makeOrder"></input>

            </form>

        </div>

    </template>
    <template v-else>
        <h2 class="secondary-header text-center"> {{ $t('checkout.empty_cart') }} </h2> 
    </template>


</div>

</div>

</div>

</template>

<script>

    export default {

        data: () => ({
            form: new Form({
                name: '',
                phone: '',
                email: '',
                _token: '',
                cart: ''
            }),
            csrfField: Laravel.csrfToken,
            cartObj: new Cart(),
            cart: {},
            cartState: false,
            totalAmount: 0,
            disabledButton: true,
            lang: {}
        }),

        mounted() {
            this.checkTableState();
            this.getTotalAmount();
            this.defineLangVars();
        },

        methods: {

            removeItem(id) {
                let icon = {id: id};
                this.cartObj.clearFromCart(icon);
                this.checkTableState();
                this.getTotalAmount();
            },

            checkTableState() {
                let cartCounter = this.$parent.$children[0].updateCartCounter();

                this.cart = this.cartObj.defineCart();
                if (cartCounter) {
                    this.cartState = true;
                } else {
                    this.cartState = false;
                }
            },

            getTotalAmount() {
                let cart = this.cart;
                let amount = 0;

                for (let cur in cart) {
                    if (typeof cart[cur].price[cart[cur].format] === 'number') {
                        amount += cart[cur].price[cart[cur].format];
                    }
                }

                this.totalAmount = amount;

            },

            defineLangVars() {
                this.lang.makeOrder = this.$t('checkout.make_order');
            },

            checkOrderState() {
                let form = this.form;

                if (form.name && form.phone) {
                    this.disabledButton = false;
                }
            },

            confirmOrder() {
                let self = this;
                this.form.post('/make-order')
                .then(function() {
                    swal({
                        title: self.$t('checkout.order_title'),
                        text: self.$t('checkout.order_text'),
                        type: 'success'
                    })
                    .then(function() {
                        self.cartObj.clearCart();
                        location.replace('/');
                    });

                });

            }

        }

    }

</script>