<template>
    <div class="col-12">
        <ul class="menu-product d-flex justify-content-around">
            <li class="nav-item menu" v-if="products.id">
                <router-link class="nav-link router-link" to="/product">Назад</router-link>
            </li>
            <li class="nav-item menu" v-if="products.id">
                <router-link class="nav-link router-link" :to="{name: 'Show', params: {id: products.id}}">Все о товаре
                </router-link>
            </li>
            <li class="nav-item menu" v-if="products.id">
                <router-link class="nav-link router-link" :to="{name: 'Character', params: {id: products.id}}">
                    Характеристики
                </router-link>
            </li>
            <li class="nav-item menu" v-if="products.id">
                <router-link class="nav-link router-link" :to="{name: 'Review', params: {id: products.id}}">Отзывы
                </router-link>
            </li>
            <li class="nav-item menu">
                <a class="nav-link router-link" href='#'>Задать вопрос</a>
            </li>
            <li class="nav-item menu">
                <a class="nav-link router-link" href='#'>Фото</a>
            </li>
        </ul>
    </div>
</template>

<script>


export default {
    name: "Menu-show",
    props: {
        products: {}
    },
    mounted() {
        const menu = document.querySelectorAll('.router-link')
        menu.forEach(n => {
            if (n.className === "router-link-active router-link-exact-active nav-link router-link") {
                n.classList.add('disabled');
                // n.style = "color:#39bcd3";
            }
        })
    }
}
</script>

<style scoped>

</style>
