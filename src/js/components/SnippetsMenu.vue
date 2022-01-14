<template>
    <nav class="m-snippets-menu">
        <ul class="m-snippets-menu__listing">
            <li 
                v-for="snippet in this.snippets" 
                :key="snippet.id"
                class="m-snippets-menu__item"
            >
                <a 
                    :href="snippet._links.self[0].href"
                    :title="snippet.title.rendered"
                    class="m-snippets-menu__link"
                    :class="{ 'is-active' : activeUrl === snippet._links.self[0].href }"
                    @click.prevent="$emit('update-url', snippet._links.self[0].href)"
                >
                    {{ snippet.title.rendered }}
                </a>
            </li>
        </ul>
    </nav>
</template>
<script>
export default {
    name: 'SnippetMenu',
    props: {
        snippets: Array,
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