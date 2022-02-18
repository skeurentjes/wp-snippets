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
                                <Filter
                                    :key="index"
                                    :id="category.id"
                                    :name="category.name"
                                    :value="category.name"
                                    :input-type="'checkbox'"
                                    @change="updateactiveCategoryIds(category.id)"
                                />
                            </li>
                        </ul>
                    </div>
                    <div class="m-filter">
                        <h2 class="a-subtitle m-filter__title">Tags</h2>
                        <ul class="m-filter__listing m-filter__listing--inline">
                            <li
                                v-for="(tag, index) in this.tags"
                                class="m-filter__item m-filter__item--inline"
                            >
                                <Filter
                                    :key="index"
                                    :id="tag.id"
                                    :name="tag.name"
                                    :value="tag.name"
                                    :input-type="'label'"
                                    @change="updateactiveTagIds(tag.id)"
                                />
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="o-sidebar__menu">
                    <a
                        class="o-sidebar__button"
                        :class="{ 'is-active' : this.isFiltersActive}"
                        href="#"
                        title="Toggle filters"
                        @click.prevent="toggleFilters"
                    >
                        <icon-base class="o-sidebar__button--icon" icon-name="filter" view-box="0 0 512 512"><icon-filter /></icon-base>
                        <icon-base class="o-sidebar__button--icon" icon-name="filter" view-box="0 0 320 512"><icon-close /></icon-base>
                    </a>
                    <Menu
                        :posts="posts"
                        :active-url="activeUrl"
                        :active-category-ids="activeCategoryIds"
                        :post-category-ids="postCategoryIds"
                        :active-tag-ids="activeTagIds"
                        :post-tag-ids="postTagIds"
                        :categories="categories"
                        @update-url="updateUrl"
                    />
                </div>
            </div>
        </aside>

        <main class="o-app__main" role="main">
            <section class="m-content">
                <Post
                    v-if="activeUrl"
                    :title="postTitle"
                    :content="postContent"
                    :example="example"
                    :code="code"
                />
                <template v-else>
                    <article>
                        <h1 class="a-title">Choose a snippet</h1>
                        <p>Please choose a snippet from the menu on the left hand.</p>
                    </article>
                </template>
            </section>
        </main>
    </div>
</template>

<script>

import Menu from './components/Menu.vue';
import Post from './components/Post.vue';
import Filter from './components/Filter';
import IconBase from './components/IconBase';
import IconFilter from './components/icons/IconFilter';
import IconClose from './components/icons/IconClose';

export default {
    name: 'App',
    components: {
        Menu,
        Post,
        Filter,
        IconBase,
        IconFilter,
        IconClose,
    },

    data () {
      return {
          posts: [],
          activeUrl: '',
          postTitle: '',
          postContent: '',
          code: '',
          example: '',
          categories: [],
          activeCategoryIds: [],
          postCategoryIds: [],
          tags: [],
          activeTagIds: [],
          postTagIds: [],
          isFiltersActive: false,
      }
    },

    methods: {
        updateUrl(url) {
            this.activeUrl = url;
            this.fetchArticle(url);
        },

        fetchArticle(url) {
            this.axios.get(url).then(response => {
                this.postTitle = response.data.title.rendered;
                this.postContent = response.data.content.rendered;
                this.example = response.data.acf.example;
                this.code = response.data.acf.code;
            }).catch(error => {
                console.warn({error});
            });
        },

        updateactiveCategoryIds(category) {
            this.activeCategoryIds.includes(category)
                ? this.activeCategoryIds = this.activeCategoryIds.filter(value => value !== category)
                : this.activeCategoryIds.push(category);
        },

        updateactiveTagIds(tag) {
            this.activeTagIds.includes(tag)
                ? this.activeTagIds = this.activeTagIds.filter(value => value !== tag)
                : this.activeTagIds.push(tag);
        },

        toggleFilters() {
            this.isFiltersActive = !this.isFiltersActive;
        },
    },

    created() {
        let postCategoryIds = this.postCategoryIds;
        let postTagIds = this.postTagIds;

        const posts = this.axios.get(`http://localhost/wordpress/wp-json/wp/v2/snippet`).then(response => {
            this.posts = response.data;
            response.data.forEach(function (el) {
                el.snippet_categories.forEach(function (id) {
                    if (!postCategoryIds.includes(id)) {
                        postCategoryIds.push(id);
                    }
                });
                el.tags.forEach(function (id) {
                    if (!postTagIds.includes(id)) {
                        postTagIds.push(id);
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
            this.tags = response.data;
        }).catch(error => {
            console.warn({error});
        });
    },
}
</script>
