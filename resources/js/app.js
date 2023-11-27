require('bootstrap');
window.$ = window.jQuery = require('jquery');
import { createApp } from 'vue';
// import Router
import router from './router';
// import Authorization api
import authorize from './authorize';
// import Vuetify
import vuetify from './vuetify';
// import Store Vuex
import store from './store';
// import Cookie
import cookie from './cookie';
/* import the fontawesome core */
import { library } from '@fortawesome/fontawesome-svg-core'
/* import font awesome icon component */
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
/* import specific icons */
import { faXmark, faHistory, faCheckCircle, faEyeSlash, faEye, faSearch, faBars, faAngleRight, faSignOut, faMobileScreen, faDesktop, faMapLocationDot, faAngleDown, faGlobe } from '@fortawesome/free-solid-svg-icons';
import { faTwitter, faYoutube, faInstagram, faFacebook, faSquareTwitter, faSquareYoutube, faSquareInstagram } from '@fortawesome/free-brands-svg-icons';
/* add icons to the library */
library.add(faTwitter, faYoutube, faInstagram, faFacebook, faSquareTwitter, faSquareYoutube, faSquareInstagram, faXmark, faGlobe, faBars, faAngleDown, faAngleRight, faSignOut, faHistory, faCheckCircle, faEye, faEyeSlash, faSearch, faMapLocationDot, faMobileScreen, faDesktop)

import App from "./App.vue";
const app = createApp(App).use(router).use(store)
    .use(vuetify);

import { createI18n } from 'vue-i18n/dist/vue-i18n.esm-bundler.js';
import messages from './lang';
const i18n = createI18n({
    locale: 'en', // set locale
    fallbackLocale: 'en', // set fallback locale
    messages
});

app.use(i18n);

// Create Global Vue Property
const global = app.config.globalProperties;
// Define Global CSRFTOKEN
global.CSRFTOKEN = document.head.querySelector("[name~=csrf-token][content]").content;;
// Define Global AUTHORIZE
global.$http = authorize;
// Define Global Cookie
global.$cookie = cookie;

app.component('font-awesome-icon', FontAwesomeIcon);
app.mount('#app');

app.config.errorHandler = (err) => {
    /* handle error */
    console.log(err);
}