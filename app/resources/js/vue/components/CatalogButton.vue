<template>
    <div @click="isModal = true">Catalog</div>
    <catalog-modal
        v-if="isModal"
        @close="close"
    >
    </catalog-modal>
</template>

<script>

import CatalogModal from "./CatalogModal";

export default {
    name: "catalog-button",
    components: {
        CatalogModal
    },
    data() {
        return {
            isModal: false
        }
    },
    methods: {
        close() {
            this.isModal = false;
        }
    }
}
</script>

<style scoped>
</style>
