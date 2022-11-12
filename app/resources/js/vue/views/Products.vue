<template>
    <Carousel></Carousel>
    <div id="grid" class="mb-3">
        <div id="inner-grid" v-for="product in PRODUCTS.data" :key="product.id">
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
                    <p class="d-flex justify-content-start fw-bold">₴ {{ product.price }}</p>
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
    <div class="page__wraper">
<!--        <div v-for="pageNumber in PRODUCTS.meta.links"-->
<!--             :key="pageNumber.label"-->
<!--             class="page"-->
<!--             @click="GET_PRODUCTS(pageNumber.label)"-->
<!--        >-->
<!--            <p v-if="pageNumber.label !== 1" :class="pageNumber.active ? 'active' : ''">{{ pageNumber.label }}</p>-->
<!--        </div>-->
        <b-pagination
            v-model="page"
            :total-rows=PRODUCTS.meta.total
            :per-page=PRODUCTS.meta.per_page
            aria-controls="my-table"
            @click="changePage(page)"
        ></b-pagination>
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
    data() {
        return {
            page: 1
        }
    },
    computed: {
        ...mapGetters(['PRODUCTS']),
    },
    watch: {
        page() {
            return this.GET_PRODUCTS(this.page)
        }
    },
    created() {
        this.GET_PRODUCTS(this.page);
    }
    ,
    methods: {
        changePage(page) {
            this.page = page;
        },
        ...mapActions([
            'GET_PRODUCTS',
        ]),
        addProductToCart(product) {
            this.$store.commit("addProductToCart", product)
        }
    },
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

.page__wraper {
    display: flex;
    margin-top: 15px;
    justify-content: center;
}

.page {
    border: 1px solid black;
    padding: 10px;
    background-color: white;
    margin: 6px;
}

.current-page {
    border: 2px solid teal;
}
</style>



