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
            <div class="row">
                <!--Grid column-->
                <div class="col-6">
                    <div class="d-flex justify-content-center one" style="overflow: hidden; height: 400px;">
                        <img :src="'http://larav.local/storage/' + product.image"
                             alt="image" style="width: 80%; height: 80%; object-fit: contain; justify-content: center;">
                    </div>
                    <div id="grid" style="cursor: pointer;">
                        <img v-for="img in image" :key="img.id" class="many"
                             :src="'http://larav.local/storage/' + img.photos"
                             alt="images">
                    </div>
                </div>
                <div class="col-md-6 mt-2">
                    <div class="d-flex justify-content-start">
<!--                        <div class="rating-area">-->
<!--                            <svg style="width: 0; height: 0;" xmlns="http://www.w3.org/2000/svg"-->
<!--                                 viewBox="0 0 32 32">-->
<!--                                <defs>-->
<!--                                    <mask id="half">-->
<!--                                        <rect x="0" y="0" width="32" height="32" fill="white"/>-->
<!--                                        <rect x="50%" y="0" width="32" height="32" fill="grey"/>-->
<!--                                    </mask>-->
<!--                                    <symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" id="star">-->
<!--                                        <path-->
<!--                                            d="M31.547 12a.848.848 0 00-.677-.577l-9.427-1.376-4.224-8.532a.847.847 0 00-1.516 0l-4.218 8.534-9.427 1.355a.847.847 0 00-.467 1.467l6.823 6.664-1.612 9.375a.847.847 0 001.23.893l8.428-4.434 8.432 4.432a.847.847 0 001.229-.894l-1.615-9.373 6.822-6.665a.845.845 0 00.214-.869z"/>-->
<!--                                    </symbol>-->
<!--                                </defs>-->
<!--                            </svg>-->
<!--                            &lt;!&ndash;                            <div class="star-rating mt-2 mb-2"></div>&ndash;&gt;-->
<!--                        </div>-->
                        <StarRating :rating="stars"></StarRating>
                                                <div class="stars d-flex justify-content-center align-items-center ml-4">
                                                    <b id="grade">{{ stars }}</b>&nbsp;({{ item }}&nbsp;оценок)
                                                </div>
                    </div>
                    <div class="mt-3 mb-3">
                        <!--                                        <a class="d-flex justify-content-start mt-4"-->
                        <!--                                           href="{{ route('category.show',['category' => $product->category_id]) }}">-->
                        <span v-bind:style="category.color" class="col-6 text-lg badge badge-success">
                                                {{ category.name }}
                                            </span>
                        <!--                                        </a>-->
                    </div>
                    <p class="lead mt-4 mb-2">
                        <span class="mt-2">Price - </span>
                        <span>₴ {{ product.price }}</span>
                    </p>
                    <p class="mt-4">Description</p>
                    <p class="mt-4 mr-3" style="text-align: justify;">
                        {{ product.description }}
                    </p>
                    <p class="lead font-weight-bold">Manufactur</p>
                    <p>
                        {{ manufactur.name }} - {{ manufactur.country }}
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
        product: Object,
        image: Object,
        stars: Number,
        item: Number,
        category: Object,
        manufactur: Object,
    },
    mounted() {
//--------------------------------------Image--------------------------------------------

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
//--------------------------------------Stars-------------------------------------------
//         let grade = document.querySelector('#grade').textContent;
//         const star_rating = document.querySelector('.star-rating');
//
//         let output = '';
//         for (let i = 5; i > 0; i--, grade--) {
//             if (grade > 0) {
//                 let svg = '<svg class="c-star active" width="32" height="32" viewBox="0 0 32 32">' +
//                     '<use xlink:href="#star"></use>' +
//                     '<use xlink:href="#star" fill="none" stroke="grey"></use>' +
//                     '</svg>';
//                 output += svg;
//             } else {
//                 let svg = '<svg class="c-star inactive" width="32" height="32" viewBox="0 0 32 32">' +
//                     '<use xlink:href="#star"></use>' +
//                     '<use xlink:href="#star" fill="none" stroke="grey"></use>' +
//                     '</svg>';
//                 output += svg;
//             }
//             star_rating.innerHTML = output;
//         }
//-----------------------------------------------------------------------------------
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
