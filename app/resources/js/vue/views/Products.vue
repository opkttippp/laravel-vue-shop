<template>
    <Carousel></Carousel>
    <div id="grid" class="mb-3">
        <div id="inner-grid" v-for="product in PRODUCTS" :key="product.id">
            <div style="overflow: hidden; height: 150px;">
                <router-link :to="{name: 'Show', params: {id: product.id }}">
                    <img class="rounded mx-auto d-block" :src="'http://larav.local/storage/' + product.image"
                         height="125px" alt="tv" style="width: 80%; height: 80%; object-fit: contain;">
                </router-link>
            </div>
            <div id="inner-grid-div">
                <div class="ml-3">
                    <router-link :to="{name: 'Show', params: {id: product.id }}">
                        {{ product.title }}
                    </router-link>
                </div>
                <div class="pl-2">
                    <p>
                        <router-link class="d-flex justify-content-start mt-4"
                                     :to="{name: 'Show', params: {id: product.id }}">
                            <span class="badge badge-success">{{ product.category.name }}</span>
                        </router-link>

                    </p>
                </div>
                <div class="pl-2">
                    <p class="d-flex justify-content-start fw-bold">₴{{ product.price }}</p>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <span>В наличии -</span>
                    <span>
                        <strong v-if="product.stock" class="text-success">{{ product.stock }}</strong>
                        <strong v-else class="text-danger">Sold out</strong>
                    </span>
                    <span>
<!--                        <a href="{{ product.stock > 0 ? route('cart.add', ['productId' => $product->id]) : '#' }}"-->
                        <button :class="`btn w-100 shadow-none ${product.stock ? 'btn-success' : 'btn-secondary' }`"
                                :disabled="!product.stock"
                                @click="addProductToCart(product)">
                              to cart
                            <i class="fas fa-cart-arrow-down"></i>
                        </button>
                    </span>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

import Carousel from "../components/Carousel"
import {mapActions, mapGetters} from 'vuex'

export default {
    name: "Products",
    components: {
        Carousel
    },
    props: {},
    computed: {
        ...mapGetters(['PRODUCTS']),

    },
    mounted() {
        this.GET_PRODUCTS()
        // this.GET_REVIEW()
            // window.addEventListener('resize', function () {
            //     if (window.innerWidth > 767) {
            //         console.log('Desktop')
            //     } else {
            //         console.log('Mobile')
            //     }
            //
            // })
    }
    ,
    methods: {
        ...mapActions([
            'GET_PRODUCTS',
            // 'GET_REVIEW',
        ]),
        addProductToCart(product) {
            this.$store.commit("addProductToCart", product)
        }
    },
    data() {
        return {
            products: []
        }
    }
}
</script>

<style scoped>
#grid {
    display: grid;
    grid-template-columns:repeat(auto-fill, minmax(30%, 1fr));
    margin: 0;
}

#grid > div {
    /*font-size: 1.1vw;*/
    /*padding: .5em;*/
    margin: .05em;
    background: white;
    box-shadow: 0 0 0 1px darkgrey;
}

#inner-grid {
    display: grid;
    grid-template-rows: 1fr 1fr;
    /*grid-gap: 5px;*/
    align-self: center;
}

#inner-grid-div {
    display: grid;
    grid-template-rows: 1fr 1fr 1fr 1fr;
    /*text-align: center;*/
    align-self: center;
}

#inner-grid > div > a > img {
    margin-top: 10%;
}
</style>



