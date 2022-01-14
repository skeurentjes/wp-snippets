// Import SASS files
import '../scss/admin.scss';
import '../scss/style.scss';

// Import svg files
import '../svg/logo.svg';

// Import modules
import OffscreenMenu from "./modules/offscreen-menu";
import HeaderScroll from "./modules/header-scroll";

// Bind modules
document.addEventListener("DOMContentLoaded", () => {
    // Construct classes
    new HeaderScroll(document.querySelector('.js-header-scroll'));

    // Bind event listeners
    document.querySelectorAll('.js-menu-toggle-button').forEach((el) => new OffscreenMenu(el).toggle());
});

import { createApp } from "vue";
import Snippets from './Snippets.vue'
import axios from 'axios';
import VueAxios from 'vue-axios';

if (document.getElementById('js-vue-snippets-container')) {
    const snippets = createApp(Snippets);
    snippets.use(VueAxios, axios);
    snippets.mount('#js-vue-snippets-container');
}