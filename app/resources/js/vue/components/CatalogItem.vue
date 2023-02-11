<template>

    <transition name="fade">
        <div v-if="show">
            <div v-for="item in items" :key="item.id">
                {{ item.name }}
            </div>
        </div>
    </transition>
</template>

<script>
export default {
    name: "catalog-item",
    props: {
        items: [],
        show: Boolean
    }
}
</script>

<style scoped>
.fade-enter-active, .fade-leave-active {
    transition: opacity 0.5s;
}

.fade-enter, .fade-leave-to /* .fade-leave-active до версии 2.1.8 */
{
    opacity: 0;
}
</style>
