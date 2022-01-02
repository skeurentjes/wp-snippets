<template>
    <div class="o-app">
        <aside class="o-app__sidebar">
            <SnippetMenu
                    :snippets="snippets"
                    @update-url="setUrl"
                />
        </aside>
        <main class="o-app__main" role="main">
            <section>
                <h1 class="a-title">Snippets</h1>
                <SnippetsArticle
                    v-if="activeSnippetUrl"
                    :post="activeSnippet"
                />
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

    props: {
        
    },

    data () {
      return {
          snippets: [],
          activeSnippetUrl: '',
          activeSnippet: {},
      }
    },

    methods: {
        setUrl(url) {
            this.activeSnippetUrl = url;
        },

        loadArticle(url) {
            this.axios.get(url).then(response => {
                console.log(response.data);
                this.activeSnippet = response.data;
            }).catch(error => {
                console.warn({error});
            });
        },
    },

    watch: {
        activeSnippetUrl(newUrl, oldUrl) {
            this.loadArticle(newUrl);
        },
    },

    created() {
        this.axios.get(`http://localhost/snippets/wp-json/wp/v2/snippet`).then(response => {
            this.snippets = response.data;
        }).catch(error => {
            console.warn({error});
        });
    },

    /*
    // Using the REST API endpoint set in the functions folder
    mounted() {
        fetch('http://localhost/wordpress/wp-json/snippets/v1/snippet')
            // .then((r) => r.json())
            // .then((res) => this.markers = res.map(x => x.acf))
            .then(response => {
                console.log({response});
                this.snippets = response.json();
                console.log(this.snippets);
            });
    }
    */
}
</script>
