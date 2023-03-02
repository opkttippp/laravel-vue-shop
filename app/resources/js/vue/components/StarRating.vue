<template>
    <div class="star-rating" v-if="review">
        <span v-for="index in starLimit" :key="index" class="star star-outlined"></span>
        <div class="star-rating__colored" :style="ratingWidthStyle">
            <span v-for="index in starLimit" :key="index" class="star star-colored"></span>
        </div>
    </div>
    <div class="stars d-flex justify-content-center align-items-center ml-4">
        <b id="grade">{{ this.stars }}</b>
        ({{ this.item }})
    </div>
</template>
<script>
export default {
    name: "StarRating",
    props: {
        review: {
            type: Array,
            default: []
        },
        starLimit: {
            type: Number,
            default: 5
        }

    },
    data: function () {
        return {
            stars: {
                type: Number,
            },
            item: {
                type: Number,
            }
        }
    },
    computed: {
        ratingWidth() {
            this.getResults()
            return this.stars / this.starLimit * 100
        },
        ratingWidthStyle() {
            if(this.review.length > 0) {
                return `width: ${this.ratingWidth}%;`
            }else {
                this.item = 'оценок нет';
                this.stars = 0;
            }
            return `width: 0%;`
        }
    },
    methods: {
        getResults() {
                let item = this.review.length
            let sum = this.review.reduce(function (sum, n) {
                    return sum + n.status;
                }, 0);
                this.stars = (sum / item).toFixed(2)
            if(item  === 1 ){
                this.item = `${item} оценка`
            }else if(item  > 1 && item  < 5){
                this.item = `${item} оценки`
            }else
                this.item = `${item} оценок`
        }
    }
}
</script>

<style lang="scss" scoped>
.star-rating {
    position: relative;
    display: inline-flex;

    &__colored {
        display: inline-flex;
        position: absolute;
        width: 0;
        height: 100%;
        top: 0;
        left: 0;
        overflow: hidden;
    }
}

.star {
    display: inline-block;
    width: 16px;
    height: 16px;
    margin: 0 3px;
    flex-shrink: 0;

    &-colored {
        background: url('../../../../public/images/star-yellow.svg') center no-repeat;
    }

    &-outlined {
        background: url('../../../../public/images/star-outlined.svg') center no-repeat;
        gap: 4px;
    }
}

</style>
