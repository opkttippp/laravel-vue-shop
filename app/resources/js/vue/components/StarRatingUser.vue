<template>
    <div class="star-rating">
        <span v-for="index in starLimit" :key="index" class="star star-outlined"></span>
        <div class="star-rating__colored" :style="ratingWidthStyle">
            <span v-for="index in starLimit" :key="index" class="star star-colored"></span>
        </div>
    </div>
</template>

<script>
export default {
    name: "StarRating",
    props: {
        status: {
            type: Number,
            default: 0
        },
        starLimit: {
            type: Number,
            default: 5
        }
    },
    computed: {
        ratingWidth() {
            return this.status/ this.starLimit * 100
        },
        ratingWidthStyle() {
            return `width: ${this.ratingWidth}%;`
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
