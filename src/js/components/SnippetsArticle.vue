<template>
    <article class="m-content">
        <h1 class="a-title">{{ this.title }}</h1>
        <div v-html="this.content" />
    </article>
</template>

<script>
export default {
    name: 'SnippetsArticle',
    props: ['title', 'content'],
}
</script>