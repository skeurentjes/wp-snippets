<template>
    <div class="o-app">

        <div
            class="o-app__backdrop"
            :class="{ 'is-active' : this.isFiltersActive}"
        />

        <aside class="o-app__sidebar o-sidebar">
            <div
                class="o-sidebar__container"
                :class="{ 'is-active' : this.isFiltersActive}"
            >
                <div class="o-sidebar__filters">
                    <div class="m-filter">
                        <h2 class="a-subtitle m-filter__title">Categories</h2>
                        <ul class="m-filter__listing">
                            <li
                                v-for="(category, index) in this.categories"
                                class="m-filter__item"
                            >
                                <Category
                                    :key="index"
                                    :id="category.id"
                                    :name="category.name"
                                    :value="category.name"
                                    @change="updateActiveCategories(category.id)"
                                />
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="o-sidebar__menu">
                    <a
                        class="a-btn a-btn--primary o-sidebar__button"
                        href="#"
                        title="Toggle filters"
                        @click.prevent="toggleFilters"
                    >
                        {{ buttonFiltersTitle }}
                    </a>
                    <Menu
                        :posts="posts"
                        :active-url="activeUrl"
                        :active-categories="activeCategories"
                        :categories="postCategories"
                        @update-url="updateUrl"
                    />
                </div>
            </div>
        </aside>

        <main class="o-app__main" role="main">
            <section>
                <Post
                    v-if="activeUrl"
                    :title="postTitle"
                    :content="postContent"
                />
                <template v-else>
                    <article>
                        <h1 class="a-title">Dashboard</h1>
                    </article>
                </template>
            </section>
        </main>
    </div>
</template>

<script>

import Menu from './components/Menu.vue';
import Post from './components/Post.vue';
import Category from "./components/Category";

export default {
    name: 'App',
    components: {
        Menu,
        Post,
        Category,
    },

    data () {
      return {
          posts: [],
          activeUrl: '',
          postTitle: '',
          postContent: '',
          categories: [],
          activeCategories: [],
          postCategories: [],
          activeTags: [],
          postTags: [],
          isFiltersActive: false,
          buttonFiltersTitle: 'Show filters',
      }
    },

    methods: {
        updateUrl(url) {
            this.activeUrl = url;
            this.fetchArticle(url);
        },

        fetchArticle(url) {
            this.axios.get(url).then(response => {
                console.log(response.data)
                this.postTitle = response.data.title.rendered;
                this.postContent = response.data.content.rendered;
            }).catch(error => {
                console.warn({error});
            });
        },

        updateActiveCategories(category) {
            this.activeCategories.includes(category)
                ? this.activeCategories = this.activeCategories.filter(value => value !== category)
                : this.activeCategories.push(category);
        },

        updateActiveTags(tag) {
            this.activeCategories.includes(tag)
                ? this.activeCategories = this.activeCategories.filter(value => value !== tag)
                : this.activeCategories.push(tag);
        },

        toggleFilters() {
            this.isFiltersActive = !this.isFiltersActive;
            this.isFiltersActive ? this.buttonFiltersTitle = 'Hide filters' : this.buttonFiltersTitle = 'Show filters';
        },
    },

    created() {
        let postCats = this.postCategories;

        const posts = this.axios.get(`http://localhost/wordpress/wp-json/wp/v2/snippet`).then(response => {
            this.posts = response.data;
            response.data.forEach(function (el) {
                el.snippet_categories.forEach(function (id) {
                    if (!postCats.includes(id)) {
                        postCats.push(id);
                    }
                });
            });
        }).catch(error => {
            console.warn({error});
        });

        const categories = this.axios.get(`http://localhost/wordpress/wp-json/wp/v2/snippet_categories`).then(response => {
            this.categories = response.data;
        }).catch(error => {
            console.warn({error});
        });

        const tags = this.axios.get(`http://localhost/wordpress/wp-json/wp/v2/tags`).then(response => {
            this.categories = response.data;
            console.log(response.data);
        }).catch(error => {
            console.warn({error});
        });
    },
}
</script>
