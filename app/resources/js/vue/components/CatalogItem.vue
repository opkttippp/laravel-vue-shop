<template>
    <transition name="fade">
        <div v-if="show">
            <ul>
                <li v-for="item in items" :key="item.id"
                    class="d-flex justify-content-start link"
                    @click="() => {
                        this.$emit('catalog', {name: catalogName, id: item.id});
                        this.$emit('close');
                        }"
                >
                    <a class="item" href="#" @click.prevent>{{ item.name }}</a>
                </li>
            </ul>
        </div>
    </transition>
</template>

<script>

export default {
    name: "catalog-item",
    props: {
        show: Boolean,
        items: String,
        catalogName: String,
    },
    data() {
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

.link a {
    justify-content: left;
}

.link a:hover {
    color: rgb(33, 187, 156);
    text-decoration: none;
    text-shadow: 2px 2px 4px #6c757d;
}
</style>
