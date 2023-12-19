require('bootstrap');
window.$ = window.jQuery = require('jquery');
import { createApp } from 'vue';
/*  import App.vue */
import App from "./App.vue";
/* import Store Vuex */
import store from './store';
// import Cookie
import cookie from './cookie';
// import Router
import router from './router';
/* import Language */
import messages from './lang';
// import Vuetify
import vuetify from './vuetify';
// import Authorization api
import authorize from './authorize';
/* import the fontawesome core */
import { library } from '@fortawesome/fontawesome-svg-core';
/* import font awesome icon component */
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';
/* import specific icons */
import { faClock, faDollarSign, faStar, faCalendarCheck, faStreetView, faLocation, faBookOpen, faUser, faCircleCheck, faArrowLeftLong, faCalendarDays, faSliders, faMagnifyingGlass, faXmark, faHistory, faCheckCircle, faEyeSlash, faEye, faSearch, faBars, faAngleRight, faSignOut, faMobileScreen, faDesktop, faMapLocationDot, faAngleDown, faGlobe } from '@fortawesome/free-solid-svg-icons';
import { faTwitter, faYoutube, faInstagram, faFacebook, faSquareTwitter, faSquareYoutube, faSquareInstagram } from '@fortawesome/free-brands-svg-icons';
/* add icons to the library */
library.add(faClock, faDollarSign, faStar, faCalendarCheck, faStreetView, faLocation, faBookOpen, faUser, faCircleCheck, faArrowLeftLong, faCalendarDays, faSliders, faMagnifyingGlass, faTwitter, faYoutube, faInstagram, faFacebook, faSquareTwitter, faSquareYoutube, faSquareInstagram, faXmark, faGlobe, faBars, faAngleDown, faAngleRight, faSignOut, faHistory, faCheckCircle, faEye, faEyeSlash, faSearch, faMapLocationDot, faMobileScreen, faDesktop);
/* import createI18n from package */
import { createI18n } from 'vue-i18n/dist/vue-i18n.esm-bundler.js';
const i18n = createI18n({ locale: 'en', fallbackLocale: 'en', messages });
/*  Expose i18n instance on the window object */
window.i18n = i18n;
/* create App for Vue */
const app = createApp(App).use(router).use(store).use(vuetify).use(i18n);
// Create Global Vue Property
const global = app.config.globalProperties;
// Define Global CSRFTOKEN
global.CSRFTOKEN = document.head.querySelector("[name~=csrf-token][content]").content;
// Define Global AUTHORIZE
global.$http = authorize;
// Define Global Cookie
global.$cookie = cookie;

import VueMultiselect from 'vue-multiselect';
import { VuePagination } from '@zakerxa/vue-laravel-pagination';

app.component("vue-pagination", VuePagination);
app.component('font-awesome-icon', FontAwesomeIcon);
app.component('multiselect', VueMultiselect);
app.mount('#app');

app.config.errorHandler = (err) => {
    /* handle error */
    console.log(err);
}