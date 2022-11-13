import { createRouter, createWebHistory } from 'vue-router'

import Home from '../views/Home.vue'
import SwitchTo from '../views/SwitchTo.vue'
import Contact from '../views/Contact.vue'

const routes = [
  {
    path: '/',
    name: 'Home',
    component: Home
  },
  {
    path: '/switchTo',
    name: 'SwitchTo',
    component: SwitchTo
  },
  {
    path: '/contact',
    name: 'Contact',
    component: Contact
  }
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
