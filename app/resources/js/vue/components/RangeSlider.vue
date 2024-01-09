<template>
    <div class="col">
        <div class="d-flex flex-column m-2" style="border: 1px solid #26313b;
              height: 130px;">
            <div class="head">
                Manufacturer:
            </div>
            <div style="padding: 0 10px; overflow: scroll;">
                <div v-for="(firm) in MANUFACTUR" class="firm d-flex justify-content-between">
                    <label>{{firm.name}}</label>
                    <input type="checkbox" :id="firm.id" :value="firm.id" v-model="checkedManuf" @change="getValue"
                           style="padding: 0 10px;">
                </div>
            </div>
            <br>
        </div>
        <div class="d-flex flex-column align-self-center justify-content-center m-2"
             style="border: 1px solid #26313b; height: 130px;">
            <div>
                <Slider v-model="value" @update="getValue" :max="30000"/>
            </div>
            <div class="col-11 d-flex justify-content-between mt-4">
                <b-form-input class="col-5 " v-model="value[0]" @input="getValue"></b-form-input>
                <b-form-input class="col-5" v-model="value[1]" @input="getValue"></b-form-input>
            </div>
        </div>

        <div class="d-flex flex-column m-2" style="border: 1px solid #26313b;
              height: 130px;">
            <div>
                Category:
            </div>
            <div v-for="(firm) in CATEGORY" class="d-flex justify-content-around">
                <label>{{firm.name}}</label>
                <input type="checkbox" :id="firm.id" :value="firm.id" v-model="checkedCateg" @change="getValue">
            </div>
            <br>
        </div>
    </div>
</template>
<script>

import Slider from '@vueform/slider'

export default {
    name: "range-slider",
    components: {
        Slider
    },
    data: () => {
        return {
            value: [150, 15000],
            priceMin: Number,
            priceMax: Number,
            checkedManuf: [],
            checkedCateg: [],
            selected: '',
            query: {}
        }
    },
    mounted() {
        this.getCategory();
        this.getManufactur();
    },
    computed: {
        CATEGORY() {
            return this.$store.getters['product/CATEGORY'];
        },
        MANUFACTUR() {
            return this.$store.getters['product/MANUFACTUR'];
        }
    },
    methods: {
        getValue() {
            this.query = {};
            this.query.priceMin = this.value[0];
            this.query.priceMax = this.value[1];
            this.query.checkedManuf = this.checkedManuf;
            this.query.checkedCateg = this.checkedCateg;
            this.$emit('filter', this.query)
        },
        getCategory() {
            this.$store.dispatch('product/GET_CATEGORY');
        },
        getManufactur() {
            this.$store.dispatch('product/GET_MANUFACTUR');
        }
    }
}
</script>

<style scoped>
@import "@vueform/slider/themes/default.css";

.firm {
    display: none;
}

.head:active .firm{
    display: block;
}

</style>
