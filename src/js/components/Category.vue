<template>
    <label
        class="m-checkbox-label"
    >
        <input
            class="m-checkbox-label__input m-checkbox-label__input--hidden"
            type="checkbox"
            :value="name"
            v-model="checked"
        >
        <span class="m-checkbox-label__input m-checkbox-label__input--custom"></span>
        <span class="m-checkbox-label__title">{{ this.name }}</span>
    </label>
</template>

<script>
export default {
    name: 'Category',
    props: ['name', 'id', 'value'],
    data() {
        return {
            checked: false,
        }
    }
}
</script>