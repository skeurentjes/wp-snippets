// Import SASS files
import '../scss/admin.scss';
import '../scss/style.scss';

// Import svg files
import '../svg/logo.svg';

import { createApp } from "vue";
import App from './App.vue';
import axios from 'axios';
import VueAxios from 'vue-axios';
import { router } from './router'

if (document.getElementById('js-vue-snippets-container')) {
    const app = createApp(App).use(router);
    app.use(VueAxios, axios);
    app.mount('#js-vue-snippets-container');
}