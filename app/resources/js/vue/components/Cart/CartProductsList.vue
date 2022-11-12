<template>
    <table class="table cart-table">
        <thead>
        <tr>
            <th scope="col">Title</th>
            <th scope="col" class="text-center">Quantity</th>
            <th scope="col" class="text-center">Price</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        <cart-product-item
            v-for="(product, index) in this.cartProducts"
            :id="product.id"
            :title="product.title"
            :price="product.price"
            :image="product.image"
            :amount="product.amount"
            @increment-amount="$store.commit('incrementProductAmount', index)"
            @decrement-amount="$store.commit('decrementProductAmount', index)"
            @remove="$store.commit('removeProductFromCart', index)"
        ></cart-product-item>
        </tbody>
        <tfoot>
        <tr class="fw-bold px-4">
            <td class="text-end">
                Total:
            </td>
            <td class="text-center">{{ totalAmount }}</td>
            <td class="text-end">{{ `$${totalPrice}` }}</td>
        </tr>
        </tfoot>
    </table>
</template>

<script>
import CartProductItem from "./CartProductItem";

export default {
    name: "CartProductsList",
    components: { CartProductItem },
    props: {
        cartProducts: {
            type: []
        }
    },
    computed: {
        totalAmount() {
            return this.$store.getters.totalAmount;
        },
        totalPrice() {
            return this.$store.getters.totalPrice;
        }
    },
}
</script>
