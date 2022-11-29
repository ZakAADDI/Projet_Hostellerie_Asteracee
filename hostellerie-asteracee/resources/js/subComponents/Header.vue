<template>

    <div class="w-full bg-[#272023] items-center justify-end flex h-24">
        <div>
            <router-link :to="{name: 'Home'}">
                <img class="logo top-0 w-2/4" :src=logoHeader alt="Logo Hostellerie Asteracée">
            </router-link>
        </div>

        <div class="flex flex-col lg:flex-row w-48">

            <router-link :to="{ name: 'Contact' }" class="mr-8 text-white hover:text-[#E6B34B] duration-700 w-48 flex flex-col justify-center items-center">
                Nous Contacter
            </router-link>
            <router-link :to="{ name: 'Connexion' }" class="mr-8 text-white hover:text-[#E6B34B] duration-700 w-48 flex flex-col justify-center items-center">
                Connexion
            </router-link>

        </div>

        <a
        v-on:click="changeTo">
            <img class="text-white mr-16 sm:ml-14" src="../assets/EngFrFlag.png" alt="English Flag" >
        </a>

    </div>

</template>

<script>
import axiosProvider from "../services/axiosConfigProvider";
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
            this.$router.push({name:"SwitchTo"})
        }
    },
     async created(){
        this.medias = (await axiosProvider.get('/medias'))?.data;
        this.logoHeader = this.medias[6].url;
    }
}
</script>

<style scoped>

img{
    width: 40px;
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


