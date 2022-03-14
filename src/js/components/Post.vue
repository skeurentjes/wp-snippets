<template>
    <article class="m-content__container">
        <h1
            v-if="this.id"
            v-html="this.title"
            class="a-title"
        />

        <div v-if="this.content" v-html="this.content" />

        <div id="iframe" class="m-example">
            <!-- <h2 class="a-subtitle">Example</h2> -->
        </div>
    </article>
</template>

<script>

export default {
    name: 'Post',
    data: function () {
        return {
            id: null,
            post: [],
            title: '',
            content: '',
        }
    },
    created() {
        this.id = this.$route.params.id;
        this.$watch(
            () => this.$route.params,
            (toParams) => {
                this.id = toParams.id;
                this.getPost();
            }
        )
    },
    mounted: function () {
        // this.id = this.$route.params.id;
        this.getPost();
    },
    methods: {
        getPost: function () {
            const post = this.axios.get(`http://localhost/wordpress/wp-json/wp/v2/snippet/` + this.id).then(response => {
                this.post = response.data;
                this.title = this.post.title.rendered
                this.content = this.post.content.rendered
            }).catch(error => {
                console.warn({error});
            });
        }
    }
}
</script>