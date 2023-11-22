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
import { faBars, faAngleRight, faSignOut, faMobileScreen, faDesktop, faMapLocationDot, faAngleDown } from '@fortawesome/free-solid-svg-icons';
import { faShieldHalved } from '@fortawesome/free-solid-svg-icons';
import { faSearch } from '@fortawesome/free-solid-svg-icons';
import { faIdCardClip } from '@fortawesome/free-solid-svg-icons';
import { faGraduationCap } from '@fortawesome/free-solid-svg-icons';
import { faPersonRunning } from '@fortawesome/free-solid-svg-icons';
import { faEye } from '@fortawesome/free-solid-svg-icons';
import { faEyeSlash } from '@fortawesome/free-solid-svg-icons';
import { faCheckCircle } from '@fortawesome/free-solid-svg-icons';
import { faHistory } from '@fortawesome/free-solid-svg-icons';
/* add icons to the library */
library.add(faBars, faAngleDown, faAngleRight, faSignOut, faHistory, faCheckCircle, faEye, faEyeSlash, faPersonRunning, faGraduationCap, faIdCardClip, faSearch, faShieldHalved, faMapLocationDot, faMobileScreen, faDesktop)

import App from "./App.vue";
const app = createApp(App).use(router).use(store)
    .use(vuetify);
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