<template>
    <nav class="m-snippets-menu">
        <ul class="m-snippets-menu__listing">
            <template
                v-for="(post, index) in this.posts"
                :key="index"
            >
                <transition-group
                    name="list"
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
                            <!-- Render the categories -->
                            <span
                                class="m-snippets-menu__categories"
                                v-if="post.snippet_categories.length"
                            >
                                <span
                                    v-for="category in post.snippet_categories"
                                    class="m-snippets-menu__category"
                                    :class="'m-snippets-menu__category--' + renderCategoryTitle(category).toLowerCase()"
                                >
                                    {{ renderCategoryTitle(category) }}
                                </span>
                            </span>
                            <!-- Render the tags -->
                            <span
                                class="m-snippets-menu__tags"
                                v-if="post.tags.length"
                            >
                                <span
                                    v-for="tag in post.tags"
                                    class="m-snippets-menu__tag"
                                    :class="'m-snippets-menu__tag--' + renderTagTitle(tag).toLowerCase()"
                                >
                                    {{ renderTagTitle(tag) }}
                                </span>
                            </span>
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
        activeCategoryIds: Array,
        postCategoryIds: Array,
        activeTagIds: Array,
        postTagIds: Array,
        categories: Array,
        tags: Array,
    },
    methods: {
        isActive(postCategoryIds, tags) {
            let isActive = false;
            const activeCats = this.activeCategoryIds;
            const activeTagIds = this.activeTagIds;

            postCategoryIds.forEach((el) => {
                if (activeCats.includes(el)) {
                    isActive = true;
                }
            });

            tags.forEach((el) => {
                if (activeTagIds.includes(el)) {
                    isActive = true;
                }
            });

            // Show if active category array and active postTagIds array are all empty
            if (this.activeCategoryIds.length === 0 && this.activeTagIds.length === 0) {
                isActive = true;
            }

            return isActive;
        },
        renderCategoryTitle(id) {
            let name = null;

            this.categories.forEach((item) => {
                if (item.id === id) {
                    name = item.name;
                }
            });
            return name;
        },
        renderTagTitle(id) {
            let name = null;

            this.tags.forEach((item) => {
                if (item.id === id) {
                    name = item.name;
                }
            });
            return name;
        },
    },
}
</script>
<style>
    
</style>