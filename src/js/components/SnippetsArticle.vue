<template>
    <article>
        <h2>{{ this.post.id }}</h2>
        <h2>{{ this.post.title.rendered }}</h2>
        {{ this.post.content.rendered }}
    </article>
</template>

<script>
export default {
    name: 'SnippetsArticle',
    props: {
        post: {},
    },

    methods: {

    },
}
</script>

<style>
    
</style>