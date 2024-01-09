<template>
    <div class="content">
        <div id="grid" class="mb-3">
            <div class="inner-grid" v-for="category in CATEGORY" :key="category.id">
                <div
                    style="height: 10em;
                display: flex;
                align-items: center;">
                    <!--                    <router-link :to="{name: 'Show', params: {id: product.id }}">-->
                    <img class="rounded mx-auto d-block"
                         :src="'http://larav.local/storage/' + category.image"

                         style="width: 80%;
                          height: 80%;
                          object-fit: contain;" alt="">
                    <!--                    </router-link>-->
                </div>
                <div class="ml-3 d-flex justify-content-left align-items-center">
                    <!--                        <router-link :to="{name: 'Show', params: {id: product.id }}">-->
                    {{ category.name }}
                    <!--                        </router-link>-->
                </div>
            </div>
        </div>

    </div>
</template>

<script>

import {createNamespacedHelpers} from 'vuex'
const {mapActions, mapGetters} = createNamespacedHelpers('product');

export default {
    name: "Category",
    components: {},
    props: {},
    data() {
        return {
            page: 1,
        }
    },
    computed: {
        ...mapGetters(['CATEGORY'])
    },
    created() {
        this.GET_CATEGORY()
    }
    ,
    methods: {
        changePage(page) {
            this.page = page;
        },
        ...mapActions([
            'GET_CATEGORY',
        ])
    },
}
</script>

<style scoped>

#grid {
    display: grid;
    grid-template-columns:repeat(auto-fill, minmax(300px, 1fr));
    margin: 1em;
}

#grid > div {
    margin: 1em;
    background: white;
    box-shadow: 0 0 0 1px darkgrey;
}

.inner-grid {
    display: grid;
    grid-template-rows: 2fr 1fr;
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



