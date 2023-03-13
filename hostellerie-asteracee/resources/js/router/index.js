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
import RecapOrder from '../views/RecapOrder.vue'
import ConfirmOrder from '../views/ConfirmOrder.vue'
import UpdateUser from '../views/UpdateUser.vue'
import UserProfile from '../views/UserProfile.vue'
import UpdatePassword from '../views/UpdatePassword.vue'
import ConfirmLogout from '../views/ConfirmLogout.vue'
import WhoAreWe from '../views/WhoAreWe.vue'
import OurRooms from '../views/OurRooms.vue'
import OurServices from '../views/OurServices.vue'
import DeleteAccount from '../views/DeleteAccount.vue'
import UserBookingsView from '../views/UserBookingsView.vue'
import AddReview from '../views/AddReview.vue'
import ConfirmBooking from '../views/ConfirmBooking.vue'
import ConfirmAddedReview from '../views/ConfirmAddedReview.vue'
import UpdateBooking from '../views/UpdateBooking.vue'


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
    path: '/logout',
    name: 'ConfirmLogout',
    component: ConfirmLogout
  },
  {
    path: '/confirmCreatedAccount',
    name: 'ConfirmCreatedAccount',
    component: ConfirmCreatedAccount
  },
  {
    path: '/deleteAccount',
    name: 'DeleteAccount',
    component: DeleteAccount
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
  },
  {
    path: '/confirmOrder',
    name: 'ConfirmOrder',
    component: ConfirmOrder
  },
  {
    path: '/confirmAddedReview',
    name: 'ConfirmAddedReview ',
    component: ConfirmAddedReview
  },
  {
    path: '/confirmBooking',
    name: 'ConfirmBooking',
    component: ConfirmBooking
  },
  {
    path: '/updateUser',
    name: 'UpdateUser',
    component: UpdateUser
  },
  {
    path: '/updateBooking',
    name: 'UpdateBooking',
    component: UpdateBooking
  },
  {
    path: '/userProfile',
    name: 'UserProfile',
    component: UserProfile
  },
  {
    path: '/addReview',
    name: 'AddReview',
    component: AddReview
  },
  {
    path: '/userBookingsView',
    name: 'UserBookingsView',
    component: UserBookingsView
  },
  {
    path: '/updatePassword',
    name: 'UpdatePassword',
    component: UpdatePassword
  },
  {
    path: '/whoAreWe',
    name: 'WhoAreWe',
    component: WhoAreWe
  },
  {
    path: '/rooms',
    name: 'OurRooms',
    component: OurRooms
  },
  {
    path: '/services',
    name: 'OurServices',
    component: OurServices
  }
]

const router = createRouter({
  history: createWebHashHistory(),
  base : process.env.BASE_URL,
  routes
})

export default router
