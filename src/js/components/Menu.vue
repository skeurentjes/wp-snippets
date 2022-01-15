<template>
    <nav class="m-snippets-menu">
        <ul class="m-snippets-menu__listing">
            <li 
                v-for="post in this.posts"
                :key="post.id"
                class="m-snippets-menu__item"
            >
                <a 
                    :href="post._links.self[0].href"
                    :title="post.title.rendered"
                    class="m-snippets-menu__link"
                    :class="{ 'is-active' : activeUrl === post._links.self[0].href }"
                    @click.prevent="$emit('update-url', post._links.self[0].href)"
                >
                    {{ post.title.rendered }}
                </a>
            </li>
        </ul>
    </nav>
</template>
<script>
export default {
    name: 'Menu',
    props: {
        posts: Array,
        activeUrl: String,
    },
    methods: {
        isActive() {
            return true;
        }
    }
}
</script>
<style>
    
</style>