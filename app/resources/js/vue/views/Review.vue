<template>
    <div class="container-fluid dark-grey-text mt-0">
        <ul>
<!--            <li v-for="review in laravelData.target" :key="post.id">{{ post.title }}</li>-->

            <div class="card">
                <div class="col-12 mt-1 mb-1">
                                    <p class="product_title">{{ products.title }}</p>
                </div>
                <Menu_show :products = products></Menu_show>
                <button class="btn btn-success" style="width: 20%; margin-left: 75%; margin-top: 2%"> Оставить отзыв
                </button>
                <div class="m-4" v-for="rev in review" :key="rev.id"
                     style="display: flex; flex-direction: row;">
                    <div>
                        <p style="text-align: center;">
                            {{ rev.user.name }}
                        </p>
                        <img :src="'http://larav.local/storage/' +  rev.user.avatar"
                             alt="images" style="width:100px; height: 100px;">
                    </div>
                    <div style="text-align: justify; margin: 5% 0 0 3%;">
<!--                        <p>-->
<!--                            <StarRating :rating="rev.status"></StarRating>-->
<!--                        </p>-->
                        <p>
                            {{ rev.review }}
                        </p>
                        <p>
                            {{ rev.subject }}
                        </p>
                        <p>
                            {{ rev.email }}
                        </p>
                    </div>
                </div>
            </div>
        </ul>
    </div>
<!--    <Pagination :data="laravelData" @pagination-change-page="getResults"/>-->
</template>

<script>

import StarRating from "../components/StarRating";
import Menu_show from "../components/Menu_show";

// import LaravelVuePagination from 'laravel-vue-pagination';
import {mapActions, mapGetters} from 'vuex'

export default {
    name: 'Review',
    components: {
        StarRating,
        Menu_show,
        // 'Pagination': LaravelVuePagination
    },
    props: {
        id: String
    },
    computed: {
        products() {
            return this.$store.getters.getProductById(parseInt(this.id))
        },
        review() {
            console.log(this.$store.getters.getReviewById(parseInt(this.id)))
            return this.$store.getters.getReviewById(parseInt(this.id))
        }
    },
    mounted() {
        this.GET_REVIEW()
    },
    methods: {
        ...mapActions([
            'GET_REVIEW'
        ]),
    }
};

</script>
<style>


.pagination {
}

.page-item {
}

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
