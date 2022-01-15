// Import SASS files
import '../scss/admin.scss';
import '../scss/style.scss';

// Import svg files
import '../svg/logo.svg';

import { createApp } from "vue";
import Snippets from './Snippets.vue';
import axios from 'axios';
import VueAxios from 'vue-axios';

if (document.getElementById('js-vue-snippets-container')) {
    const snippets = createApp(Snippets);
    snippets.use(VueAxios, axios);
    snippets.mount('#js-vue-snippets-container');
}