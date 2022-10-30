<template>
    <div class="container-fluid dark-grey-text mt-0">
        <div class="card">
<!--            <div class="col-12 mt-1 mb-1">-->

<!--                <p class="product_title">{{ title }}</p>-->
<!--            </div>-->
<!--            <div class="col-12">-->
<!--                <ul class="menu-product d-flex justify-content-around">-->
<!--                    <li class="nav-item" v-if="id">-->
<!--                        <router-link class="nav-link router-link" :to="{name: 'Main', params: {id: id }}">Все о товаре</router-link>-->
<!--                    </li>-->
<!--                    <li class="nav-item" v-if="id">-->
<!--                        <router-link class="nav-link router-link" :to="{name: 'Character', params: {id: id }}">Характеристики</router-link>-->
<!--                    </li>-->
<!--                    <li class="nav-item" v-if="id">-->
<!--                        <router-link class="nav-link router-link" :to="{name: 'Review', params: {id: id }}">Отзывы</router-link>-->
<!--                    </li>-->
<!--                    <li class="nav-item">-->
<!--                        <a class="nav-link router-link" href='#'>Задать вопрос</a>-->
<!--                    </li>-->
<!--                    <li class="nav-item">-->
<!--                        <a class="nav-link router-link" href='#'>Фото</a>-->
<!--                    </li>-->
<!--                </ul>-->
<!--            </div>-->
<!--            <div class="columns">-->
<!--                <div class="col-md-12 mt-4 mr-3">-->
<!--                    <p style="text-align: justify; margin: 2% 3%;">-->
<!--                        {{ products.description }}-->
<!--                    </p>-->
<!--                    <hr>-->
<!--                    <div class="p-4" v-if="products.manufactur">-->
<!--                        {{ products.manufactur.name }} - {{ products.manufactur.country }}-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
        </div>
    </div>

</template>

<script>

export default {

    name: "Character",
    props: {
        id: Number,
        title: String
    },
    mounted() {
        this.getProduct();
    }
    ,
    methods: {
        getProduct() {
            console.log( this.id);
            console.log( this.title);
        }
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
