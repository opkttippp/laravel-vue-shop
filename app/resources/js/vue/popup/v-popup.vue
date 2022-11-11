<template>
    <div class="popup-wrapper" ref="popup">
        <div class="v-popup">
            <div class="v-popup-header">
                <h2>Review</h2>
                <span><i class="material-icons clos"
                         @click="closePop"
                >close
            </i></span>
            </div>
            <div class="v-popup-content">
                <slot></slot>
            </div>
            <div class="v-popup-footer"></div>
        </div>
    </div>
</template>

<script>
export default {
    name: "v-popup"
    ,
    methods: {
        closePop() {
            this.$emit('closePop')
        }
    },
    mounted() {
        let vm = this;
        document.addEventListener('click', function (item) {
            if (item.target === vm.$refs['popup']) {
            vm.closePop();
            }
        })
    }
}
</script>

<style scoped>
.v-popup {
    padding: 10px;
    background-color: white;
    box-shadow: 5px 5px 5px 5px #343a40;
    width: 50%;
    top: 100px;
}

.v-popup-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.v-popup-content {
    display: flex;
    justify-content: center;
    align-items: center;
}

.popup-wrapper {
    display: flex;
    position: fixed;
    justify-content: center;
    align-items: center;
    z-index: 4;
    left: 0;
    right: 0;
    top: 0;
    bottom: 0;
    background-color: rgba(8, 3, 3, .7);
}

.clos {
    cursor: pointer;
}
</style>
