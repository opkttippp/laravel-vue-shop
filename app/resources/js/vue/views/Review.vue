<template>

    <div class="container-fluid dark-grey-text mt-0">
<!--        <ul>-->
<!--            <li v-for="post in laravelData.target" :key="post.id">{{ post.title }}</li>-->

            <div class="card">
                <div class="col-12 mt-1 mb-1">
                                    <p class="product_title">{{ products.title }}</p>
                </div>
                <div class="col-12">
                    <ul class="menu-product d-flex justify-content-around">
                        <li class="nav-item">
                            <router-link class="nav-link router-link" to="/">Все о товаре</router-link>
                        </li>
                        <li class="nav-item">
                            <router-link class="nav-link router-link" to="/char">Характеристики</router-link>
                        </li>
                        <li class="nav-item">
                            <router-link class="nav-link router-link" to="/review">Отзывы</router-link>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link router-link" href='#'>Задать вопрос</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link router-link" href='#'>Фото</a>
                        </li>
                    </ul>
                </div>
                <button class="btn btn-success" style="width: 20%; margin-left: 75%; margin-top: 2%"> Оставить отзыв
                </button>

<!--                <div class="m-4" v-for="rev in review" :key="review.id"-->
<!--                     style="display: flex; flex-direction: row;">-->
<!--                    <div>-->
<!--                        <p style="text-align: center;">-->
<!--                            {{ rev.user.name }}-->
<!--                        </p>-->
<!--                        <img :src="'http://larav.local/storage/' +  rev.user.avatar"-->
<!--                             alt="images" style="width:100px; height: 100px;">-->
<!--                    </div>-->
<!--                    <div style="text-align: justify; margin: 5% 0 0 3%;">-->
<!--                        <p>-->
<!--                            <StarRating :rating="rev.status"></StarRating>-->
<!--                        </p>-->
<!--                        <p>-->
<!--                            {{ rev.review }}-->
<!--                        </p>-->
<!--                        <p>-->
<!--                            {{ rev.subject }}-->
<!--                        </p>-->
<!--                        <p>-->
<!--                            {{ rev.email }}-->
<!--                        </p>-->
<!--                    </div>-->
<!--                </div>-->


            </div>
<!--        </ul>-->
    </div>
<!--    <Pagination :data="laravelData" @pagination-change-page="getResults"/>-->
</template>

<script>

import StarRating from "../components/StarRating";

import LaravelVuePagination from 'laravel-vue-pagination';

export default {
    components: {
        StarRating,
        'Pagination': LaravelVuePagination
    },
    props: {
        products: {}
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
