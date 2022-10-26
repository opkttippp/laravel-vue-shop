<template>

    <div class="container-fluid dark-grey-text mt-0">
        <div class="card">
            <div class="col-12 mt-1 mb-1">
                <p class="product_title">{{ products.title }}</p>
            </div>
            <div class="col-12">

                <ul class="menu-product d-flex justify-content-around">
                    <li class="nav-item">
                        <router-link class="nav-link router-link" to>Все о товаре</router-link>
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
            <!--Grid row-->
            <div class="row">
                <!--Grid column-->
                <div class="col-6">
                    <div class="d-flex justify-content-center one" style="overflow: hidden; height: 400px;">
                        <img :src="'http://larav.local/storage/' + products.image"
                             alt="image" style="width: 80%; height: 80%; object-fit: contain; justify-content: center;">
                    </div>
                    <div id="grid" style="cursor: pointer;">
                        <img v-for="image in products.imageAll" :key="image.id" class="many"
                             :src="'http://larav.local/storage/' + image.photos"
                             alt="images" v-on:click="selectImage()">
                    </div>
                </div>
                <div class="col-md-6 mt-2">


                    <div class="d-flex justify-content-start" v-if="products.id">
                        <StarRating :id=products.id></StarRating>
                    </div>


                    <div class="mt-3 mb-3">
                        <router-link to="" class="d-flex justify-content-start mt-4">
                            <span v-if="products.category"
                                  class="col-6 text-lg badge badge-success">
                                {{ products.category.name }}
                            </span>
                        </router-link>
                    </div>
                    <p class="lead mt-4 mb-2">
                        <span class="mt-2">Price - </span>
                        <span>₴ {{ products.price }}</span>
                    </p>
                    <p class="mt-4">Description</p>
                    <p class="mt-4 mr-3" style="text-align: justify;">

                        <!--                                {{ products.description.slice(0,300) + ` ...` }}-->
                        {{ products.description }}

                    </p>
                    <p class="lead font-weight-bold">Manufactur</p>
                    <p v-if="products.manufactur">
                        {{ products.manufactur.name }} - {{ products.manufactur.country }}
                    </p>
                </div>
            </div>
            <hr>
            <div class="row d-flex justify-content-center">
                <div class="col-md-6 text-center">
                    <h4 class="my-4 h4">Additional information</h4>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus suscipit modi sapiente illo soluta
                        odit voluptates,
                        quibusdam officia. Neque quibusdam quas a quis porro? Molestias illo neque eum in laborum.</p>
                </div>
            </div>
            <div class="d-flex justify-content-center">
                <div class="col-lg-4 col-md-12 mb-4">
                    <img :src="'http://larav.local/images/productFooter1.jpg'" class="img-fluid" alt="">
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <img :src="'http://larav.local/images/productFooter2.jpg'" class="img-fluid" alt="">
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <img :src="'http://larav.local/images/productFooter3.jpg'" class="img-fluid" alt="">
                </div>
            </div>
        </div>
    </div>

</template>

<script>
import StarRating from "./StarRating";

export default {
    components: {
        StarRating
    },
    props: {
        id: Number
    },
    mounted() {
//--------------------------------------Image--------------------------------------------
        this.getResults()
        this.selectImage()
    },
    methods: {
        getResults() {
            this.axios.get('http://larav.local/api/product/' + this.id)
                .then(res => {
                    console.log(res.data.data);
                    this.products = res.data.data;
                });
        },
        selectImage() {
            const one = document.querySelector('.one');
            let div = document.querySelectorAll(".many");
            div.forEach(n => {
                addEventListener("click", function (e) {
                    if (e.target.src) {
                        div.forEach(n => {
                            n.style.border = 'none';
                        });
                        e.target.style = 'border:1px solid green';
                        const action = e.target.src;
                        const img = new Image();
                        img.src = action;
                        img.style = 'width: 80%; height: 80%; object-fit: contain;';
                        one.innerHTML = '';
                        one.append(img);
                    }
                });
            });
        }

    },
    data() {
        return {
            products: {}
        }
    }
}
</script>
<style>
#grid {
    display: grid;
    margin-left: 20px;
    grid-template-columns:repeat(auto-fill, minmax(25%, 1fr));
}

#grid > img {
    font-size: 1.1vw;
    background: white;
    width: 80%;
    height: 80%;
}
</style>
