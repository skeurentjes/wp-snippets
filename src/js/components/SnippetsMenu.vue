<template>
    <nav>
        <ul>
            <li 
                v-for="snippet in this.snippets" 
                :key="snippet.id"
            >
                <a 
                    :href="snippet._links.self[0].href" 
                    :title="snippet.title.rendered"
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
    },
    data() {
        return {
            
        }
    },
}
</script>
<style>
    
</style>