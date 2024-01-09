<template>
    <div class="content">
        <div id="grid" v-if="PRODUCTS.data.length > 0">
            <div id="inner-grid" v-for="product in PRODUCTS.data" :key="product.id">
                <div style="overflow: hidden; height: 10em; align-self: center;">
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
        <div v-else class="emptySearch">
            <div>
                Unfortunately, your search returned no results...
            </div>
        </div>
        <div v-show="amountPage > 1"
             class="text-small text-uppercase text-extra-dark-gray pagination">
            <a v-show="page > 1" @click.prevent.stop="changePage(--page)"
               href="#">
                <i class="fas fa-long-arrow-alt-left"></i>
                <span class="xs-display-none border-none"></span>
            </a>
            <ul v-if="amountPage === 2" class="pagination-ul">
                <li class="pagination-li" @click.stop="changePage(item)" :class="[ page !== item ? '' : 'current']"
                    v-for="item in massPage(page)">{{ item }}
                </li>
            </ul>
            <ul v-else class="pagination-ul">
                <li v-if="page > 2 && amountPage > 3" class="pagination-li" @click.stop="changePage(1)"
                    :class="[ page !== item ? '' : 'current']">
                    1
                </li>
                <li v-if="page === 4 && amountPage > 4" class="pagination-li" @click.stop="changePage(2)"
                    :class="[ page !== item ? '' : 'current']">
                    2
                </li>
                <span v-if="page > 4" class="page-numbers dots">…</span>
                <li class="pagination-li" @click.stop="changePage(item)" :class="[ page !== item ? '' : 'current']"
                    v-for="item in massPage(page)">{{ item }}
                </li>
                <span v-if="page < amountPage - 3" class="page-numbers dots">…</span>

                <li v-if="page === amountPage - 3 && amountPage > 4" class="pagination-li"
                    @click.stop="changePage(amountPage)"
                    :class="[ page !== item ? '' : 'current']">
                    {{ amountPage - 1 }}
                </li>
                <li v-if="page < amountPage - 1 && amountPage > 3" class="pagination-li"
                    @click.stop="changePage(amountPage)"
                    :class="[ page !== item ? '' : 'current']">
                    {{ amountPage }}
                </li>
            </ul>
            <a v-show="page !== amountPage" @click.prevent.stop="changePage(++page)"
               href="#">
                <span class="xs-display-none border-none"></span>
                <i class="fas fa-long-arrow-alt-right">
                </i>
            </a>
        </div>
    </div>
</template>

<script>

import {createNamespacedHelpers} from 'vuex'

const {mapActions, mapGetters} = createNamespacedHelpers('product')

export default {
    name: "Catalog",
    data() {
        return {
            page: 1,
        }
    },
    created() {
        this.GET_CATALOG(this.page);
    },
    computed: {
        ...mapGetters(['PRODUCTS']),
        amountPage() {
            return this.PRODUCTS.meta.last_page;
        }
    },
    watch: {
        page() {
            this.GET_CATALOG(this.page)
        }
    },
    methods: {
        changePage(page) {
            this.page = page;
        },
        addProductToCart(product) {
            this.$store.commit("addProductToCart", product)
        },
        ...mapActions([
            'GET_CATALOG',
        ]),
        massPage(page) {
            if (this.amountPage > 2) {
                let mas = [];
                if (page === 1) {
                    mas = [page, ++page, ++page];
                } else if (page === this.amountPage) {
                    mas = [page - 2, --page, ++page];
                } else {
                    mas = [--page, ++page, ++page];
                }
                return mas;
            } else {
                let mas = [];
                if (page === 1) {
                    mas = [page, ++page];
                } else {
                    mas = [--page, ++page];
                }
                return mas;
            }
        }
    },
}
</script>

<style scoped>
#grid {
    display: grid;
    grid-template-columns:repeat(auto-fill, minmax(300px, 1fr));
    margin-bottom: 5em;
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

.emptySearch {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 80vh;
    color: white;
    font-size: 2em;
}

.pagination {
    margin: 4em auto;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 0 15px;
}

.pagination-ul {
    display: flex;
    margin: 0;
    padding: 0;
    list-style-type: none;
}


.pagination-li, .pagination a, .pagination span.dots {
    display: flex;
    justify-content: center;
    align-items: center;
    width: 3em;
    height: 3em;
    margin: 2px;
    padding: 0 18px;
    text-decoration: none;
    cursor: pointer;
    border: 0px solid transparent;
    border-radius: 100%;
    background: #fff;
}

.pagination a.prev:hover, .pagination a.next:hover, .pagination-li:hover {
    color: #f16a21;
}

.pagination li.current {
    margin: 2px;
    padding: 0 18px;
    background-color: #f16a21;
    color: #ffffff;
    cursor: default;
    line-height: 3rem;
    text-decoration: none;
}


.text-small {
    font-size: 12px;
    line-height: 20px;
}

span.dots {
    padding: 0 18px;
    line-height: 40px;
    text-decoration: none;
    border: 1px solid #ddd;
    border-left-width: 0;
    background: #fff;
}
</style>



