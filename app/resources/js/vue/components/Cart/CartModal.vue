<template>
    <div class="modal fade" id="cartModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
         aria-labelledby="cartModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="cartModalTitle">
                        Shopping Cart ({{ totalAmount }} Items)
                    </h5>
                    <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                </div>
                <div v-if="!cartIsEmpty" class="modal-body p-4">
                    <cart-products-list></cart-products-list>
                    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#cartModalBilling">
                        Order
                    </button>
                </div>
                <div v-else class="modal-body p-4 d-flex justify-content-center">
                    <p>
                        Cart is empty...
                    </p>
                </div>
            </div>
        </div>
    </div>
    <cart-billing-form :id="getAuth.id"
                       :name="getAuth.name"
                       :lastname="getAuth.lastname"
                       :phone="getAuth.phone"
                       :email="getAuth.email"
                       :address="getAuth.address"
    >
    </cart-billing-form>

</template>

<script>
import CartProductsList from "./CartProductsList";
import CartBillingForm from "./CartBillingForm";
import {mapActions} from "vuex";

export default {
    name: "CartModal",
    components: {CartBillingForm, CartProductsList},
    computed: {
        getAuth() {
            return this.$store.state.user;
        },
        cartIsEmpty() {
            return this.$store.getters.cartIsEmpty;
        },
        totalAmount() {
            return this.$store.getters.totalAmount;
        },
    },
    mounted() {
        this.GET_USER()
    },
    methods: {
        ...mapActions([
            'GET_USER'
        ]),
    }
}
</script>
