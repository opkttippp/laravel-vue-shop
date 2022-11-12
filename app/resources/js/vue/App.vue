<template>

    <router-view>
        <review-modal v-model:show="show">
            <form-review @create="createRev"></form-review>
        </review-modal>
    </router-view>
</template>

<script>
export default {
    name: "Main",
    created() {
        window.addEventListener('resize', function () {
            if (window.innerWidth > 767) {
                console.log('Desktop')
            } else {
                console.log('Mobile')
            }

        })
    }
}
</script>

