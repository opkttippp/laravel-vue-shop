<template>
    <modal-show
        @close="close"
    >
        <template v-slot:header>
            Catalog
            <button
                type="button"
                class="btn-close"
                @click="close"
                aria-label="Close modal"
            >
            </button>
        </template>
        <template v-slot:body>
            <div class="col-12 d-flex flex-row">
                <div class="col-6 d-flex flex-column catalog" >
                    <router-link :to="{path: '/category'}"
                                 @click="close"
                                 @mouseover="showIndex('category')"
                    >
                        Category
                    </router-link>
                    <router-link :to="{path: '/product'}"
                                 @click="close"
                                 @mouseover="showIndex('products')"
                    >
                        Products
                    </router-link>
                </div>
                <div class="col-6 d-flex flex-column"  style="color:#000000;">
                        <catalog-item
                            :show="show"
                            :items="this.category"
                        >
                        </catalog-item>
                </div>
            </div>
        </template>
    </modal-show>
</template>
<script>

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
            category: [],
            show: false,
        }
    },
    methods: {
        close() {
            this.$emit('close');
        },
        showIndex(request) {
            this.show = false;
            return axios.get(`http://larav.local/api/${request}`).then((res) => {
                this.category = res.data;
            }).then(() => {
                this.show = true;
            });
        }
    }
}
</script>

