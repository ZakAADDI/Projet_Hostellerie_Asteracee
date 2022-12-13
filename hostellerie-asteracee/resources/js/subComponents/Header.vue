<template>
<div>
    <div class="inline lg:hidden grow-0">
        <nav>
      <div class="navbar">

        <div class="container nav-container">
            <a
            v-on:click="changeTo">
            <img class="text-white mx-auto w-10" src="../assets/EngFrFlag.png" alt="English Flag" >
            </a>
            <input class="checkbox" type="checkbox" name="" id="" />
            <div class="hamburger-lines">
              <span class="line line1"></span>
              <span class="line line2"></span>
              <span class="line line3"></span>
            </div>
        <div class="flex items-center justify-center w-screen mt-6 absolute">
            <router-link class="w-1/2 absolute mt-8" :to="{name: 'Home'}">
                <img  :src=logoHeader alt="Logo Hostellerie Asteracée">
            </router-link>
        </div>

          <div class="menu-items">
            <li><router-link :to="{name:'Home'}">Accueil</router-link></li>
            <li><router-link v-if="!user" :to="{name:'Connexion'}">Se connecter</router-link></li>
            <li><router-link v-if="user" :to="{name:'ConfirmLogout'}">Se déconnecter</router-link></li>
            <li><router-link :to="{name:'OurRooms'}">Nos Chambres</router-link></li>
            <li><router-link :to="{name:'OurServices'}">Nos Services</router-link></li>
            <li><a href="#">Les prestations</a></li>
            <li><router-link :to="{name:'Contact'}">Nous contacter</router-link></li>
            <li><router-link :to="{name:'WhoAreWe'}">Qui sommes nous ?</router-link></li>
          </div>
        </div>
      </div>
    </nav>
    </div>
    <div class="hidden lg:flex w-full bg-[#272023] items-center justify-end h-24 grow-0">
        <div>
            <router-link :to="{name: 'Home'}">
                <img class="logo" :src=logoHeader alt="Logo Hostellerie Asteracée">
            </router-link>
        </div>

        <div class="flex-row w-48">

            <router-link :to="{ name: 'Contact' }" class="mr-8 text-white hover:text-[#E6B34B] duration-700 w-48 flex flex-col justify-center items-center">
                Nous Contacter
            </router-link>
            <router-link :to="{ name: 'Connexion' }" v-if="!user" class="mr-8 text-white hover:text-[#E6B34B] duration-700 w-48 flex flex-col justify-center items-center">
                Connexion
            </router-link>
            <router-link :to="{ name: 'ConfirmLogout' }" v-if="user" class="mr-8 text-white hover:text-[#E6B34B] duration-700 w-48 flex flex-col justify-center items-center">
                Deconnexion
            </router-link>

        </div>

        <a
        v-on:click="changeTo">
            <img class="text-white mr-16 sm:ml-14 w-10 mx-auto" src="../assets/EngFrFlag.png" alt="English Flag" >
        </a>

    </div>
</div>
</template>

<script>
import axiosProvider from "../services/axiosConfigProvider";
import store from '../store/index'
import localStorage from '../services/localStorageProvider'
export default {
    name: 'Header',
    data(){
        return{
            logoHeader: ''
        }
    },
    components: {

    },
    methods:{
        changeTo : function(){
            store.commit('removeLanguage');
            this.$router.push({name:"SwitchTo"})
        }
    },
     async created(){
        this.medias = (await axiosProvider.get('/medias'))?.data;
        this.logoHeader = this.medias[6].url;
        this.language = localStorage.get('language');
        store.commit('addLanguage', this.language)
    },

    computed:{
        user(){
            if(store.state.user.length >0){
                return true;
            }else{
                return false;
            }
        }
    }
}
</script>

<style scoped>

.container {
  max-width: 1050px;
  width: 100%;
  margin: auto;
}

.navbar {
  width: 100%;
}

.nav-container {
  display: flex;
  justify-content: space-between;
  align-items: center;
  height: 62px;
}

.navbar .menu-items {
  display: flex;
}

.navbar .nav-container li {
  list-style: none;
}

.navbar .nav-container a {
  text-decoration: none;
  color: white;
  font-weight: 500;
  font-size: 1.2rem;
  padding: 0.7rem;
}

.navbar .nav-container a:hover{
    font-weight: bolder;
}

.nav-container {
  /* display: block; */
  /* position: relative; */
  position: fixed;
  z-index: 9999;
  height: 60px;
  background-color: #272023;
}

.nav-container .checkbox {
  position: absolute;
  display: block;
  height: 32px;
  width: 32px;
  top: 20px;
  right: 20px;
  z-index: 5;
  opacity: 0;
  cursor: pointer;
}

.nav-container .hamburger-lines {
  display: block;
  height: 26px;
  width: 32px;
  position: absolute;
  top: 17px;
  right: 20px;
  z-index: 2;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
}

.nav-container .hamburger-lines .line {
  display: block;
  height: 4px;
  width: 100%;
  border-radius: 10px;
  background: #E6B34B;
}

.nav-container .hamburger-lines .line1 {
  transform-origin: 0% 0%;
  transition: transform 0.4s ease-in-out;
}

.nav-container .hamburger-lines .line2 {
  transition: transform 0.2s ease-in-out;
}

.nav-container .hamburger-lines .line3 {
  transform-origin: 0% 100%;
  transition: transform 0.4s ease-in-out;
}

.navbar .menu-items {
  padding-top: 120px;
  height: 100vh;
  width: 100%;
  transform: translate(-150%);
  display: flex;
  flex-direction: column;
  margin-right: -40px;
  transition: transform 0.5s ease-in-out;
  text-align: center;
}

.navbar .menu-items li {
  margin-bottom: 1.2rem;
  font-size: 1.5rem;
  font-weight: 500;
}
.menu-items{
    position: fixed;
    top: 60px;
    z-index: 999;
    background-color: #272023;
}


.nav-container input[type="checkbox"]:checked ~ .menu-items {
  transform: translateX(0);
}

.nav-container input[type="checkbox"]:checked ~ .hamburger-lines .line1 {
  transform: rotate(45deg);
}

.nav-container input[type="checkbox"]:checked ~ .hamburger-lines .line2 {
  transform: scaleY(0);
}

.nav-container input[type="checkbox"]:checked ~ .hamburger-lines .line3 {
  transform: rotate(-45deg);
}

.logo{
    left: 24vw;
    width: 50%;
}
.flag:hover{
    cursor: pointer;
}
@media screen and (min-width: 576px) {
    .rightImg{
        display: none;
    }
    .leftImg{
        display: none;
    }
    .logo{
        top: 0;
        width: 40%;
        margin-left: auto;
        margin-right: auto;
        left: 30vw;
    }
}
@media screen and (min-width: 768px) {
    .rightImg{
        display: none;
    }
    .leftImg{
        display: none;
    }

    .logo{
        top: 0;
        margin-left: auto;
        margin-right: auto;
    }
}
@media screen and (min-width: 992px) {
    .rightImg{
        display: none;
    }
    .leftImg{
        display: none;
    }
    .logo {
        width: 40%;
        position: absolute;
        /* margin-left: 2vw; */
        top : 0;
    }
}
@media screen and (min-width: 1200px) {
    .rightImg{
        display: none;
    }
    .leftImg{
        display: none;
    }
    .logo {
        width: 30%;
        position: absolute;
        margin-left: 7vw;
        top : 0;
    }
}
@media screen and (min-width: 1400px) {
    .leftImg{
        left: 10vw;
        top: 40px;
        display: block;
    }
    .rightImg{
        right: 10vw;
        top: 40px;
        display: block;
    }
    .logo {
        width: 30%;
        position: absolute;
        margin-left: 4.5vw;
        top : 0;
    }
}
</style>


