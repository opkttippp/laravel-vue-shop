<template>
    <div class="col">
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
                Manufacturer:
            </div>
            <div v-for="(firm, i) in MANUFACTUR" class="d-flex justify-content-around">
                <label for="jack">{{firm.name}}</label>
                <input type="checkbox" :id="firm.id" :value="firm.id" v-model="checkedNames" @change="getValue">
            </div>
            <br>
            <span>Отмеченные имена: {{ checkedNames }}</span>
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
            checkedNames: [],
            selected: '',
            query: {}
        }
    },
    mounted() {
        this.getManufactor();
    },
    computed: {
        MANUFACTUR() {
            return this.$store.getters['product/MANUFACTUR'];
        }
    },
    methods: {
        getValue() {
            this.query = {};
            this.query.priceMin = this.value[0];
            this.query.priceMax = this.value[1];
            this.query.checkedNames = this.checkedNames;
            this.$emit('filter', this.query)
        },
        getManufactor() {
            this.$store.dispatch('product/GET_MANUFACTUR');
        }
    }
}
</script>

<style scoped>

@import "@vueform/slider/themes/default.css";

</style>
