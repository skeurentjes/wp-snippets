<template>
    <nav class="m-snippets-menu">
        <ul class="m-snippets-menu__listing">
            <template
                v-for="(post, index) in this.posts"
                :key="index"
            >
                <transition-group
                    name="list"
                    tag="li"
                >
                    <li
                        class="m-snippets-menu__item"
                        v-if="isActive(post.snippet_categories, post.tags)"
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
                </transition-group>
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
        activeTags: Array,
        tags: Array,
    },
    methods: {
        isActive(categories, tags) {
            let isActive = false;
            const activeCats = this.activeCategories;
            const activeTags = this.activeTags;

            categories.forEach((el) => {
                if (activeCats.includes(el)) {
                    isActive = true;
                }
            });

            tags.forEach((el) => {
                if (activeTags.includes(el)) {
                    isActive = true;
                }
            });

            // Show if active category array and active tag array are all empty
            if (this.activeCategories.length === 0 && this.activeTags.length === 0) {
                isActive = true;
            }

            return isActive;
        },
    }
}
</script>
<style>
    
</style>