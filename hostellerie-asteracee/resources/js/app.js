require('./bootstrap');
import { createApp } from 'vue'
import { createPinia } from 'pinia'
import App from './App.vue'
import router from './router/index.js'
import storage from './store/index.js'
const pinia = createPinia()
import '../css/app.css'

createApp(App).use(storage).use(router).use(pinia).mount('#app')
axios.defaults.headers.common['Accept'] = 'application/json';
