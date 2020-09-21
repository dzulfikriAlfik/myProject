require("./bootstrap");
window.Vue = require("vue");
import router from './router'

Vue.component("main-app", require("./components/mainapp.vue").default);

const app = new Vue({
    el: "#app",
    router
});
