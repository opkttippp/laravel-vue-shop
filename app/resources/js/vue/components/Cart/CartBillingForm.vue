<template>
    <div class="container">
        <div class="modal fade" id="cartModalBilling" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
             aria-labelledby="cartModalTitle2">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="cartModalTitle2">
                            Shopping Cart ({{ totalAmount }} Items)
                        </h5>
                        <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-4">
                        <form class="row g-3 mb-3">
                            <h5>Billing details</h5>
                            <div class="col-md-6">
                                <label for="name" class="form-label">Name</label>
                                <input v-model="name" type="text" class="form-control" id="name"
                                       placeholder="Name" name="name">
                            </div>
                            <div class="col-md-6">
                                <label for="lastname" class="form-label">Last Name</label>
                                <input v-model="lastname" type="text" class="form-control" id="lastname"
                                       placeholder="Last Name" name="lastname">
                            </div>
                            <div class="col-12">
                                <label for="address" class="form-label">Address</label>
                                <input v-model="address" type="text" class="form-control" id="address"
                                       placeholder="Address" name="address">
                            </div>
                            <div class="col-md-6">
                                <label for="email" class="form-label">Email</label>
                                <input v-model="email" type="email" class="form-control" id="email"
                                       placeholder="Email Address" name="email">
                            </div>
                            <div class="col-md-6">
                                <label for="phone" class="form-label">Phone</label>
                                <input v-model="phone" type="text" class="form-control" id="phone"
                                       placeholder="+38(099) 999-99-99" name="phone">
                            </div>
                            <div class="col-md-6">
                                <label for="comment" class="form-label">Comment</label>
                                <input type="text" class="form-control" id="comment"
                                       placeholder="..." name="comment">
                            </div>
                            <div class="col-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-success" @click.prevent="onSubmit">
                                    Place Order
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

export default {
    name: "CartBillingForm",
    props: {
        id: Number,
        name: String,
        lastname: String,
        address: String,
        email: String,
        phone: Number,
    },
    data: function () {
        return {
            id: this.id,
            name: this.name,
            lastname: this.lastname,
            address: this.address,
            email: this.email,
            phone: this.phone,
            comment: "",
            total: "",
            firstNameInvalidMsg: "",
            orderId: "",
        }
    },
    watch: {
        firstName(newFirstName) {
            if (newFirstName.length > 20) {
                this.firstNameInvalidMsg = "First name must be shorter than 20 characters.";
            } else {
                this.firstNameInvalidMsg = "";
            }
        }
    },
    computed: {
        isPlaceOrderDisabled() {
            return !!this.firstNameInvalidMsg;
        },
        removeAll() {
            this.$store.commit("removeOrder")
        },
        cartIsEmpty() {
            return this.$store.getters.cartIsEmpty;
        },
        totalAmount() {
            return this.$store.getters.totalAmount;
        },

        cartProducts() {
            return this.$store.state.cartProducts;
        },
        totalPrice() {
            return this.$store.getters.totalPrice;
        }
    },
    methods: {
        onSubmit() {

            // function getCookie(name) {
            //     function escape(s) {
            //         return s.replace(/([.*+?\^$(){}|\[\]\/\\])/g, '\\$1');
            //     }
            //
            //     let match = document.cookie.match(RegExp('(?:^|;\\s*)' + escape(name) + '=([^;]*)'));
            //     return match ? match[1] : null;
            // }
            // console.log(document.cookie);
            // let csrfToken = getCookie('XSRF-TOKEN');
            // console.log(csrfToken);


            return axios.post('http://larav.local/api/order',
                {
                    user_id: this.id,
                    customerName: this.name,
                    customerLastName: this.lastname,
                    customerEmail: this.email,
                    customerAddress: this.address,
                    customerPhone: this.phone,
                    comment: this.comment,
                    cartProducts: this.cartProducts,
                }).then((res) => {
                (console.log(res));
            });
        }
    }
}
</script>
