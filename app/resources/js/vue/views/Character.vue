<template>
    <div class="container-fluid dark-grey-text mt-0">
        <div class="card">
            <div class="col-12 mt-1 mb-1">

                <p class="product_title">{{ products.title }}</p>
            </div>
            <MenuShow :products = products></MenuShow>
            <div class="columns">
                <div class="col-md-12 mt-4 mr-3">
                    <p style="text-align: justify; margin: 2% 3%;">
                        {{ products.description }}
                    </p>
                    <hr>
                    <div class="p-4" v-if="products.manufactur">
                        {{ products.manufactur.name }} - {{ products.manufactur.country }}
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
import MenuShow from "../components/MenuShow";

export default {
    name: "Character",
    components: {
        MenuShow
    },
    props: {
        id: String
    },
    created() {
        this.$store.dispatch('product/GET_REVIEW');
        this.$store.dispatch('product/GET_PRODUCTS_ID', (parseInt(this.id)));
    },
    computed: {
        products() {
            return this.$store.getters['product/getProductById'](parseInt(this.id));
        },
    },
}

</script>
<style>
#grid {
    display: grid;
    grid-template-columns:repeat(auto-fill, minmax(25%, 1fr));
}

#grid > img {
    font-size: 1.1vw;
    background: white;
    width: 80%;
    height: 80%;
}
</style>
