<template>
    <article class="m-content__container">
        <h1 class="a-title">{{ this.title }}</h1>
        <!-- Todo: Add categories -->
        <!-- Todo: Add tags -->
        <div v-html="this.content" />

        <div v-if="showIframe" id="iframe" class="m-example">
            <h2 class="a-subtitle">Example</h2>
        </div>
    </article>
</template>

<script>
import hljs from "highlight.js";
// import 'highlight.js/styles/a11y-dark.css';
import 'highlight.js/styles/base16/hardcore.css';

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
                const lang = el.getAttribute('class');
                this.appendLanguageType(el, lang);
            });
        },
        appendLanguageType(el, type) {
            let div = document.createElement('div');
            let label = '';

            div.classList.add('m-content__label');

            if (type.includes('language-html')) {
                label = 'html';
                div.classList.add('m-content__label--html');
            } else if (type.includes('language-css')) {
                label = 'css';
                div.classList.add('m-content__label--css');
            } else if (type.includes('language-js')) {
                label = 'javascript';
                div.classList.add('m-content__label--js');
            }

            div.append(label);
            el.append(div);
        },
        populateIframe() {
            const el = document.getElementById('iframe');
            const iframe = document.createElement("iframe");
            const css = this.code.css ? '<style>' + this.code.css + '</style>' : '';
            const html = this.code.html ? this.code.html : '';
            const js = this.code.js ? this.code.js : '';
            const width = this.example.width ? this.example.width : '100%';
            const height = this.example.height ? this.example.height : '480px';

            el.innerHTML = ''; // Empty existing iframe
            iframe.srcdoc = '<!DOCTYPE html>';
            el.appendChild(iframe);

            if (css) iframe.contentWindow.document.write(css);
            if (html) iframe.contentWindow.document.write(html);
            if (js) iframe.contentWindow.document.write(js);
            if (width) iframe.style.width = width;
            if (height) iframe.style.height = height;
        },
    },
}
</script>