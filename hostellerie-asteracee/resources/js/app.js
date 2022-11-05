require('./bootstrap');
import { createApp } from 'vue'
import App from './App.vue'
import router from './router/index.js'
import store from './store/index.js'

import '../css/reset.css'
import '../css/app.css'

createApp(App).use(store).use(router).mount('#app')

