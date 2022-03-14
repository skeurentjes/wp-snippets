<template>
    <div class="o-app">

        <div
            class="o-app__backdrop"
            :class="{ 'is-active' : this.isFiltersActive}"
            @click.prevent="toggleFilters"
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
                                class="m-filter__item"
                            >
                                Category
                            </li>
                        </ul>
                    </div>
                    <div class="m-filter">
                        <h2 class="a-subtitle m-filter__title">Tags</h2>
                        <ul class="m-filter__listing m-filter__listing--inline">
                            <li
                                class="m-filter__item m-filter__item--inline"
                            >
                                Tag
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="o-sidebar__menu">
                    <Posts />
                </div>
            </div>
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
        </aside>

        <main class="o-app__main" role="main">
            <section class="m-content">
                <router-view></router-view>
            </section>
        </main>
    </div>
</template>

<script>

import Dashboard from "./components/Dashboard";
import Posts from './components/Posts';
import Post from './components/Post.vue';
import IconBase from './components/IconBase';
import IconFilter from './components/icons/IconFilter';
import IconClose from './components/icons/IconClose';
import { useRouter, useRoute } from 'vue-router';

export default {
    name: 'App',
    components: {
        Dashboard,
        Posts,
        Post,
        IconBase,
        IconFilter,
        IconClose,
    },

    data () {
      return {
          posts: [],
          post: [],
          isFiltersActive: false,
      }
    },

    methods: {
        toggleFilters() {
            this.isFiltersActive = !this.isFiltersActive;
        },
    },

    created() {
        const route = useRoute();
        console.log('%cCreated', 'background-color: orange; color: white; padding: 5px 10px;');
        console.log(this.$route);
        console.log(route);
    },

    mounted() {
        const route = useRoute();
        console.log('%cMounted', 'background-color: darkgreen; color: white; padding: 5px 10px;');
        console.log(this.$route);
        console.log(route);
    },

    setup() {
    },
}
</script>
