<template>
    <modal-show>
        <template v-slot:header>
            <h6>Catalog</h6>
            <button
                type="button"
                class="btn-close"
                @click="this.$emit('close')"
                aria-label="Close modal"
            >
            </button>
        </template>
        <template v-slot:body>
            <div class="col-12 d-flex flex-row">
                <div class="col-3 d-flex flex-column ml-3 pl-3 mr-0 pr-0 link">

                    <router-link :to="{path: '/product'}"
                                 @click="this.$emit('close')"
                                 @mouseover=" () => {
                                             this.show = false;
                                 }"
                                 class="d-flex justify-content-start"
                    >
                        All Products
                    </router-link>

                    <router-link v-for="part in route"
                                 :to="{path: `/${part.toLowerCase()}`}"
                                 @click="this.$emit('close')"
                                 @mouseover=" () => {
                                             this.item = selectCatalog(part);
                                             this.show = true;
                                             this.catalog = part;
                    }"
                                 class="d-flex justify-content-start"
                    >
                        {{ part }}
                    </router-link>
                </div>
                <div class="col-9 d-flex flex-column p-0" style="color:#000000;">
                    <catalog-item
                        :show="show"
                        :items="item"
                        :catalogName="catalog"
                        @catalog="findCatalog"
                        @close="this.$emit('close')"
                        @mouseleave="this.show = false"
                    >
                    </catalog-item>
                </div>

                <!--                    <router-link :to="{path: '/product'}"-->
                <!--                                 @click="close"-->
                <!--                                 @mouseover="showIndex('products')"-->
                <!--                    >-->
                <!--                        Products-->
                <!--                    </router-link>-->
            </div>
        </template>
    </modal-show>
</template>
<script>

import {createNamespacedHelpers} from 'vuex'

const {mapActions, mapGetters} = createNamespacedHelpers('product');
import CatalogItem from "./CatalogItem";

export default {
    name: "catalog-modal",
    components: {
        CatalogItem
    },
    props: {
        isModal: Boolean
    },
    data() {
        return {
            show: false,
            item: '',
            catalog: '',
            route: [
                'Category',
                'Manufactur',
            ]
        }
    },
    mounted() {
        this.getCategory();
        this.getManufactur();
    },
    computed: {},
    methods: {
        getCategory() {
            this.$store.dispatch('product/GET_CATEGORY');
        },
        getManufactur() {
            this.$store.dispatch('product/GET_MANUFACTUR');
        },
        findCatalog(data) {
            return this.$store.dispatch('product/SET_CATALOG', data)
                .then(() => this.$store.dispatch('product/GET_CATALOG'))
                .then(() => this.$router.push('/catalog'));
        },
        selectCatalog(data) {
            return this.$store.getters[`product/${data.toUpperCase()}`];
        }
    }
}
</script>
<style>
.link a {
    justify-content: left;
}

.link a:hover {
    color: rgb(33, 187, 156);
    text-decoration: none;
    text-shadow: 2px 2px 4px #6c757d;
}
</style>

