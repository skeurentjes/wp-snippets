<template>
    <article class="m-content">
        <h1 class="a-title">{{ this.title }}</h1>
        <!-- Todo: Add categories -->
        <!-- Todo: Add tags -->
        <div v-html="this.content" />

        <div v-if="showIframe" id="iframe" class="m-example"></div>
    </article>
</template>

<script>
import hljs from "highlight.js";
import 'highlight.js/styles/a11y-dark.css';

export default {
    name: 'Post',
    props: ['title', 'content', 'example', 'code'],
    watch: {
        content: function (val) {
            this.$nextTick(function () {
                this.initHighlightJS();
            })

            if (this.showIframe) {
                this.$nextTick(function () {
                    this.populateIframe();
                })
            }
        }
    },
    computed: {
        showIframe() {
            return this.example.show_example;
        },
    },
    methods: {
        initHighlightJS() {
            const $code = document.querySelectorAll('.m-content pre');
            $code.forEach(el => {
                hljs.highlightElement(el);
            });
        },
        populateIframe() {
            const iframe = document.createElement("iframe");
            const css = this.code.css ? '<style>' + this.code.css + '</style>' : '';
            const html = this.code.html ? this.code.html : '';
            const js = this.code.js ? this.code.js : '';
            const width = this.example.width ? this.example.width : '';
            const height = this.example.height ? this.example.height : '';


            iframe.srcdoc = '<!DOCTYPE html>';
            document.getElementById('iframe').appendChild(iframe);

            if (css) {
                iframe.contentWindow.document.write(css);
            }

            if (html) {
                iframe.contentWindow.document.write(html);
            }

            if (js) {
                iframe.contentWindow.document.write(js);
            }
        },
    },
}
</script>