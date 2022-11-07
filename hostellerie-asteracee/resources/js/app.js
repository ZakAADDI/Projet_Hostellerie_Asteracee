require('./bootstrap');
import { createApp } from 'vue'
import App from './App.vue'
import router from './router/index.js'
import storage from './store/index.js'

import '../css/reset.css'
import '../css/app.css'

createApp(App).use(storage).use(router).mount('#app')

