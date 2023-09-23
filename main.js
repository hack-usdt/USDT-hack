// The Vue build version to load with the `import` command
// (runtime-only or standalone) has been set in webpack.base.conf with an alias.
import Vue from 'vue'
import App from './App'
import router from './router'
//import axios from 'axios'
//import VueAxios from 'vue-axios'
import "babel-polyfill";
import common from './utils/utils'; //引入文件

const VueAxios = require('vue-axios')
const axios = require('axios')

Vue.prototype.common = common; // 绑定到vue上面
Vue.config.productionTip = false
Vue.use(VueAxios, axios)
Vue.prototype.$axios = axios;
//axios.defaults.withCredentials = false;

router.beforeEach((to, from, next) => {
    /* 路由发生变化修改页面title */
    if (to.meta.title) {
        document.title = to.meta.title
    }
    next()
})

/* eslint-disable no-new */
new Vue({
    el: '#app',
    router,
    components: { App },
    template: '<App/>'
})