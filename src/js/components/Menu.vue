<template>
    <nav class="m-snippets-menu">
        <ul class="m-snippets-menu__listing">
            <template
                v-for="(post, index) in this.posts"
                :key="index"
            >
                <li
                    class="m-snippets-menu__item"
                    v-if="isActive(post.snippet_categories)"
                >
                    <a
                        :href="post._links.self[0].href"
                        :title="post.title.rendered"
                        class="m-snippets-menu__link"
                        :class="{ 'is-active' : activeUrl === post._links.self[0].href }"
                        @click.prevent="$emit('update-url', post._links.self[0].href)"
                    >
                        {{ post.title.rendered }}
                        <!-- Todo: Add tags and categories -->
                    </a>
                </li>
            </template>
        </ul>
    </nav>
</template>
<script>
export default {
    name: 'Menu',
    props: {
        posts: Array,
        activeUrl: String,
        activeCategories: Array,
        categories: Array,
    },
    methods: {
        isActive(array) {
            let isActive = false;
            const activeCats = this.activeCategories;

            array.forEach((el) => {
                if (activeCats.includes(el)) {
                    isActive = true;
                }
            });

            if (this.activeCategories.length === 0) {
                return true;
            }

            return isActive;
        },
    }
}
</script>
<style>
    
</style>