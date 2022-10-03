<template>

    <div class="container dark-grey-text mt-0">
        <div class="card">
            <div class="col-12 mt-1 mb-1">
                <p class="product_title">{{ product.title }}</p>
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
            <button class="btn btn-success" style="width: 20%; margin-left: 75%; margin-top: 2%"> Оставить отзыв</button>
            <div class="m-4" v-for="rev in review" :key="review.id" style="display: flex; flex-direction: row;">
                <div>
                    <p style="text-align: center;">
                        {{ rev.user.name}}
                    </p>
                    <img :src="'http://larav.local/storage/' +  rev.user.avatar"
                         alt="images" style="width:100px; height: 100px;">
                </div>
                <div style="text-align: justify; margin: 5% 0 0 3%;">
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
    </div>

</template>

<script>
export default {
    props: {
        product: Object,
        review: Object,
        user: Object,
    }
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
