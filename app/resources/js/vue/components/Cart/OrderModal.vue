<template>
    <div class="container">
        <div class="modal fade" id="orderModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
             aria-labelledby="orderModal">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="cartModalTitle3">
                            Thanks for your order!
                        </h5>
                        <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal"
                                aria-label="Close" data-bs-backdrop="false"></button>
                    </div>
                    <div class="modal-body p-4 d-flex flex-column justify-content-center">
                        <h4>
                            Hello <b>{{ this.name }}!!</b>
                            Your order has been successfully committed.
                            Order number № <b>{{ this.order }}</b>
                        </h4>
                        <h6>await confirmation of your order on your Email</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>

export default {
    name: "OrderModal",
    props: {
        name: {
            type: String
        },
        order: {
            type: Number
        }
    },
    methods: {
        closePop() {

            const target = document.querySelector('#orderModal').innerHTML = ''

            // console.log(target);
            // if (typeof target !== 'undefined') {
            //         setTimeout(() => target.innerHTML = '', 2000)
            //     }

        }
    },

}


</script>
<style>
.clos {
    cursor: pointer;
}
.modal-backdrop.show {

}
</style>
