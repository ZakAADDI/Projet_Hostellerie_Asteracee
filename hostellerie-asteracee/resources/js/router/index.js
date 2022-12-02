import { createRouter, createWebHashHistory } from 'vue-router'

import Home from '../views/Home.vue'
import SwitchTo from '../views/SwitchTo.vue'
import Contact from '../views/Contact.vue'
import Connexion from '../views/Connexion.vue'
import CreateUser from '../views/CreateUser.vue'
import ConfirmCreatedAccount from '../views/ConfirmCreatedAccount.vue'
import SomethingWentWrong from '../views/SomethingWentWrong.vue'
import FiltredRooms from '../views/FiltredRooms.vue'
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
  },
  {
    path: '/connexion',
    name: 'Connexion',
    component: Connexion
  },
  {
    path: '/createUser',
    name: 'CreateUser',
    component: CreateUser
  },
  {
    path: '/confirmCreatedAccount',
    name: 'ConfirmCreatedAccount',
    component: ConfirmCreatedAccount
  },
  {
    path: '/somethingWentWrong',
    name: 'SomethingWentWrong',
    component: SomethingWentWrong
  },
  {
    path: '/filtredRooms',
    name: 'FiltredRooms',
    component: FiltredRooms
  }
]

const router = createRouter({
  history: createWebHashHistory(),
  base : process.env.BASE_URL,
  routes
})

export default router
