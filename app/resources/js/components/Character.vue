<template>

    <div class="container-fluid dark-grey-text mt-0">
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
            <div class="columns">
                <div class="col-md-12 mt-4 mr-3">
                    <p style="text-align: justify; margin: 2% 3%">
                        {{ product.description }}
                    </p>
                    <hr>
                    <div class="p-4">
                        {{ manufactur.name }} - {{ manufactur.country }}
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
export default {
    props: {
        product: Object,
        image: Object,
        stars: Number,
        item: Number,
        manufactur: Object,
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
