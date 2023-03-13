require('./bootstrap');
import { createApp } from 'vue'
import { createPinia } from 'pinia'
import App from './App.vue'
import router from './router/index.js'
import storage from './store/index.js'
const pinia = createPinia()
import '../css/app.css'
import { createI18n } from 'vue-i18n'
import {translations} from './translation.js'
const messages = translations



const i18n = createI18n({
    locale: navigator.language,
    fallbackLocale: 'en',
    messages,
})

createApp(App).use(storage).use(router).use(pinia).use(i18n).mount('#app')
axios.defaults.headers.common['Accept'] = 'application/json';
