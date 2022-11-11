<template>

    <div class="container-fluid dark-grey-text mt-0" v-if="products">
        <v-popup class="popup"
                 v-if="isInfoPopupVisible"
                 @closePop="closePopupInfo()"
            >
            <form class="row g-3 mb-3">
                <div class="col-md-6 d-flex justify-content-around align-items-center">
                    <p><img :src="'http://larav.local/storage/' + this.user.avatar"
                            alt="images" style="width:100px; height: 100px;"></p>
                    <h3>{{ this.user.name }}</h3>
                </div>
                <div class="col-md-12">
                    <label class="form-label">Leave feedback</label>
                    <textarea class="form-control" name="review" id="review" rows=5 placeholder="..."/>

                </div>
                <div class="col-12 d-flex justify-content-end">
                    <button type="submit" class="btn btn-success" @click.prevent="">
                        Place Order
                    </button>
                </div>
            </form>
        </v-popup>

        <div class="card">
            <div class="col-12 mt-1 mb-1">
                <p class="product_title">{{ products.title }}</p>
            </div>
            <MenuShow :products=products></MenuShow>
            <button class="btn btn-success"
                    style="width: 20%; margin-left: 75%; margin-top: 2%;"
                    @click="writeReview()">
                Оставить отзыв
            </button>
            <ul>
                <div class="m-4 " v-for="rev in review" :key="rev.id"
                     style="display: flex; flex-direction: row;">
                    <li class="col-12 d-flex justify-content-around">
                        <div class="col-2 mt-1 mb-1" style="display: flex; flex-direction: column; align-items: center;">
                            <p>
                                {{ rev.user.name }}
                            </p>
                            <img :src="'http://larav.local/storage/' +  rev.user.avatar"
                                 alt="images" style="width:100px; height: 100px;">
                        </div>
                        <div class="col-8 mt-1 mb-1">
                            <p>
                                <StarRatingUser
                                    :id=products.id
                                    :status=rev.status
                                >
                                </StarRatingUser>
                            </p>
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
                    </li>
                </div>
            </ul>
        </div>
    </div>
</template>

<script>

import StarRatingUser from "../components/StarRatingUser";
import MenuShow from "../components/MenuShow";
import vPopup from "../popup/v-popup";

import {mapActions, mapGetters} from 'vuex'

export default {
    name: 'Review',
    components: {
        StarRatingUser,
        MenuShow,
        vPopup
    },
    props: {
        id: String
    },
    data() {
        return {
            isInfoPopupVisible: false,
            name: "",
            lastname: "",
            address: "",
            email: "",
            phone: "",
            review: ""
        }
    },
    computed: {
        products() {
            return this.$store.getters.getProductById(parseInt(this.id));
        },
        review() {
            return this.$store.getters.getReviewById(parseInt(this.id));
        },
        user() {
            return this.$store.getters.getUser;
        }
    },
    mounted() {
        this.$store.dispatch('GET_PRODUCTS')
        this.$store.dispatch('GET_REVIEW')
        this.$store.dispatch('GET_USER')
    },
    methods: {
        writeReview() {
            this.isInfoPopupVisible = true
        },
        closePopupInfo() {
            this.isInfoPopupVisible = false
        }
    }
};

</script>


<style scoped>

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
