<template>
    <div class="o-app">
        <aside class="o-app__sidebar">
            <SnippetMenu
                    :snippets="snippets"
                    :active-url="activeUrl"
                    @update-url="setUrl"
                />
        </aside>
        <main class="o-app__main" role="main">
            <section>
                <SnippetsArticle
                    v-if="activeUrl"
                    :title="snippetTitle"
                    :content="snippetContent"
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

import SnippetMenu from './components/SnippetsMenu.vue';
import SnippetsArticle from './components/SnippetsArticle.vue';

export default {
    name: 'Snippets',
    components: {
        SnippetMenu,
        SnippetsArticle,
    },

    data () {
      return {
          snippets: [],
          activeUrl: '',
          snippetTitle: '',
          snippetContent: '',
      }
    },

    methods: {
        setUrl(url) {
            this.activeUrl = url;

            this.loadArticle(url);
        },

        loadArticle(url) {
            this.axios.get(url).then(response => {
                this.snippetTitle = response.data.title.rendered;
                this.snippetContent = response.data.content.rendered;

            }).catch(error => {
                console.warn({error});
            });
        },
    },

    created() {
        this.axios.get(`http://localhost/wordpress/wp-json/wp/v2/snippet`).then(response => {
            this.snippets = response.data;
        }).catch(error => {
            console.warn({error});
        });
    },
}
</script>
