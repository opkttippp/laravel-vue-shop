<template>
    <input type="text" :value="modelValue" @input="updateInput">
</template>

<script>
export default {
    name: "InputButton",
    props: {
        modelValue: [String, Number]
    },
    methods: {
        updateInput(e) {
            this.$emit('update:modelValue', e.target.value);
        }
    }
}
</script>

<style scoped>

</style>
