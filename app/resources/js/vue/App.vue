<template>

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

