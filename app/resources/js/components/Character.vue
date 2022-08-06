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
                        <a class="nav-link router-link" href='#'>Отзывы</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link router-link" href='#'>Задать вопрос</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link router-link" href='#'>Фото</a>
                    </li>
                </ul>
            </div>
            <!--Grid row-->
            <div class="columns">
                <div class="col-md-12 m-4 p-3">
<!--                    <div class="d-flex flex-column bd-highlight m-2 p-3">-->

                        <div class="m-3 p-4" style="text-align: justify;">
                            {{ product.description }}
                        </div>
                        <hr>
                        <div class="p-4">
                            {{ manufactur.name }} - {{ manufactur.country }}
                        </div>

<!--                    </div>-->
                </div>
            </div>
            <!--Grid row-->
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
