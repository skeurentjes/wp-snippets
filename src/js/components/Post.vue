<template>
    <article class="m-content">
        <h1 class="a-title">{{ this.title }}</h1>
        <!-- Todo: Add categories -->
        <!-- Todo: Add tags -->
        <div v-html="this.content" />
    </article>
</template>

<script>
import hljs from "highlight.js";
import 'highlight.js/styles/a11y-dark.css';

export default {
    name: 'Post',
    props: ['title', 'content'],
    watch: {
        content: function (val) {
            this.$nextTick(function () {
                this.initHighlightJS();
            })
        }
    },
    methods: {
        initHighlightJS() {
            const $code = document.querySelectorAll('.m-content pre');
            $code.forEach(el => {
                hljs.highlightElement(el);
            });
        },
    },
}
</script>