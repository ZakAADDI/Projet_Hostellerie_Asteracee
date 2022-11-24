<template>
    <div class="header">
        <router-link :to="{name: 'Home'}"><img class="logo" src="../assets/images/LogoHeader.svg" alt="Logo Hostellerie Asteracée"></router-link>
        <router-link :to="{ name: 'Contact' }">Nous Contacter</router-link>
        <router-link :to="{ name: 'Connexion' }">Connexion</router-link>


        <a
        v-on:click="changeTo">
            <img class="flag" src="../assets/EngFrFlag.png" alt="English Flag" >
        </a>
    </div>
</template>

<script>
import storage from '../services/localStorageProvider';
export default {
    name: 'Header',
    components: {

    },
    methods:{
        changeTo : function(){
            this.$router.push({name:"SwitchTo"})
        }
    },
    computed:{
        language(){
            const language = storage.get("language");
            if(language == "fr"){
                return true;
            }else{
                return false;
            }
        }
    }
}
</script>

<style scoped>

.header {
    width: 100%;
    height: 6rem;
    background-color: black;
    display: flex;
    align-items: center;
    justify-content: flex-end;
}

a {
    color: white;
    transition-duration: 0.9s;
    margin-right: 2rem;
}

a:hover {
    color: #D2BD4D;
    transition-duration: 0.9s, 0.9s;
}
img{
    width: 40px;
}
.logo{
    top: 0;
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
        margin-left: 6vw;
        top : 0;
    }
}
</style>


