<template>
    <h1 class="a-title">{{ this.title }}</h1>
</template>

<script>
export default {
    name: 'NotFound',
    data () {
        return {
            title: '404: Page not found',
        }
    },
}
</script>