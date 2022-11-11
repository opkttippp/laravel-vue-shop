<template>
    <div class="range-slider">
        <div class="d-flex justify-content-between">
            <p>Min: {{ minPrice }}</p>
            <p>Max: {{ maxPrice }}</p>
        </div>
        <input type="range"
               min="0"
               max="50000"
               step="100"
               v-model.number="minPrice"
               @change="setRangeSlider"
        >
        <input type="range"
               min="0"
               max="50000"
               step="100"
               v-model.number="maxPrice"
               @change="setRangeSlider"
        >
        <div class="range-value">
        </div>
    </div>
</template>
<script>
export default {
    name: "AsideRange",
    data() {
        return {
            minPrice: 0,
            maxPrice: 50000,
        }
    },
    methods: {
        setRangeSlider() {
            if (this.minPrice > this.maxPrice) {
                let tmp = this.maxPrice;
                this.maxPrice = this.minPrice;
                this.minPrice = tmp;
            }
        },

    }
}
</script>

<style scoped>
.range-slider {
    width: 95%;
    margin: 300px 16px;
    text-align: center;
    position: relative;
}

.range-slider > input {
    width: 95%;
}

.range-slider svg, .range-slider input[type=range] {
    position: absolute;
    left: 0;
    bottom: 0;
}

input[type=range]::-webkit-slider-thumb {
    z-index: 2;
    position: relative;
    top: 2px;
    margin-top: -7px;
}
</style>
