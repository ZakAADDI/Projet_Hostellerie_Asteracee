import { createRouter, createWebHashHistory } from 'vue-router'

import Home from '../views/Home.vue'
import SwitchTo from '../views/SwitchTo.vue'
import Contact from '../views/Contact.vue'
import Connexion from '../views/Connexion.vue'
import CreateUser from '../views/CreateUser.vue'
import ConfirmCreatedAccount from '../views/ConfirmCreatedAccount.vue'
import SomethingWentWrong from '../views/SomethingWentWrong.vue'
import FilteredRooms from '../views/FilteredRooms.vue'
import SelectOptions from '../views/SelectOptions.vue'
import ConfirmUserIdentity from '../views/ConfirmUserIdentity.vue'
import RecapOrder from '../views/RecapOrder'
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
    path: '/filteredRooms',
    name: 'FilteredRooms',
    component: FilteredRooms
  },
  {
    path: '/selectOptions',
    name: 'SelectOptions',
    component: SelectOptions
  },
  {
    path: '/confirmUserIdentity',
    name: 'ConfirmUserIdentity',
    component: ConfirmUserIdentity
  },
  {
    path: '/recapOrder',
    name: 'RecapOrder',
    component: RecapOrder
  }
]

const router = createRouter({
  history: createWebHashHistory(),
  base : process.env.BASE_URL,
  routes
})

export default router
