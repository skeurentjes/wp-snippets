<template>
    <div class="o-app">
        <aside class="o-app__sidebar">
            <Menu
                    :posts="posts"
                    :active-url="activeUrl"
                    @update-url="setUrl"
                />
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

export default {
    name: 'App',
    components: {
        Menu,
        Post,
    },

    data () {
      return {
          posts: [],
          activeUrl: '',
          postTitle: '',
          postContent: '',
      }
    },

    methods: {
        setUrl(url) {
            this.activeUrl = url;

            this.loadArticle(url);
        },

        loadArticle(url) {
            this.axios.get(url).then(response => {
                this.postTitle = response.data.title.rendered;
                this.postContent = response.data.content.rendered;

            }).catch(error => {
                console.warn({error});
            });
        },
    },

    created() {
        this.axios.get(`http://localhost/wordpress/wp-json/wp/v2/snippet`).then(response => {
            this.posts = response.data;
        }).catch(error => {
            console.warn({error});
        });
    },
}
</script>
