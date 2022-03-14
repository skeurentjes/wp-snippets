<template>
    <nav class="m-snippets-menu">
        <p>
            current route name {{ $route.name }}
        </p>
        <ul class="m-snippets-menu__listing">
            <li
                v-for="post in posts"
                class="m-snippets-menu__item"
            >
                <router-link
                    :to="{ name: 'post', params: { id: post.id }}"
                    class="m-snippets-menu__link"
                >
                    {{ post.title.rendered }}
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
                </router-link>
            </li>
        </ul>
    </nav>
</template>

<script>

export default {
    name: 'Posts',
    data: function() {
        return {
            posts: [],
            activeUrl: String,
            activeCategoryIds: Array,
            postCategoryIds: Array,
            activeTagIds: Array,
            postTagIds: Array,
            categories: Array,
            tags: Array,
        }
    },
    mounted: function () {
        this.getCategories();
        this.getPosts();
    },
    created() {

    },
    methods: {
        getPosts: function () {
            let posts = this.axios.get(`http://localhost/wordpress/wp-json/wp/v2/snippet`).then(response => {
                this.posts = response.data;
                console.log(response.data)
            }).catch(error => {
                console.warn({error});
            });
        },
        getCategories: function () {
            let categories = this.axios.get(`http://localhost/wordpress/wp-json/wp/v2/snippet_categories`).then(response => {
                this.categories = response.data;
            }).catch(error => {
                console.warn({error});
            });
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
    }
}
</script>