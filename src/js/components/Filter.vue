<template v-if="this.inputType === 'checkbox'">
    <label
        v-if="this.inputType === 'checkbox'"
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

    <label
        v-else-if="this.inputType === 'label'"
        class="m-tag-label"
    >
        <input
            class="m-tag-label__input m-tag-label__input--hidden"
            type="checkbox"
            :value="name"
            v-model="checked"
        >
        <span class="m-tag-label__input m-tag-label__input--custom"></span>
        <span class="m-tag-label__title">{{ this.name }}</span>
    </label>
</template>

<script>
export default {
    name: 'Filter',
    props: ['name', 'id', 'value', 'inputType'],
    data() {
        return {
            checked: false,
        }
    },
    mounted() {
        console.log(this.inputType);
    }
}
</script>