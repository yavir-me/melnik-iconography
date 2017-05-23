<template>

    <div class="cart-block">
        <!-- <h3 class="text-center">' + this.$t('navigation.cart') + '</h3> -->
        <table class="table">
            <tbody>
                <tr v-for="item in basket">
                    <td>
                        <img :src="`/${item.path}`" class="cart-thumbnail img-thumbnail">
                    </td>
                    <td>
                        <a :href="`/gallery/${item.gallery}/${item.id}`"> {{ item.name }} </a>
                    </td>
                    <td>
                        <span aria-hidden="true" @click="removeItem(item.id)" class="remove-cart-item glyphicon glyphicon-remove"></span>
                    </td>
                </tr>
            </tbody>
        </table>
        <a class="btn btn-success checkout-btn" href="/checkout"> {{ $t('navigation.checkout') }} </a>
    </div>

</template>

<script>

    export default {

        props: [
        'basket'
        ],

        data: () => ({
            cart: {},
        }),


        methods: {
            removeItem(id) {
                this.$emit('remove-item', id);
            }

        }

    }



</script>