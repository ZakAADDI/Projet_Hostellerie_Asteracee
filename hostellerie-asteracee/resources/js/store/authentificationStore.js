import axios from 'axios'
import { defineStore } from 'pinia'
import router from '../router/index.js';
import store from '../store/index.js'

export const useAuthStore = defineStore('authId', {
    state: () => ({
        user: {},
    }),
    actions: {
        async register(credential) {
            this.user = await axios.post('/api/register', credential)
        },
        async login(credential) {
            await axios.get('/sanctum/csrf-cookie');
            this.user = (await axios.post('/api/login', credential)).data;
            store.commit('addUser', {
                email: credential.email,
                token: this.user.token
            })
            router.push({name: 'Home'});
        },
        async logout() {
            await axios.get('/api/logout');
            this.user = {};
            router.push({name: 'HomePage'});
        },
    },
})
