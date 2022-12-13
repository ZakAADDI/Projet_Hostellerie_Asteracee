<template>
    <div class="connexion flex flex-col justify-center grow items-center mt-24 mb-8">
        <hr class="my-0 h-px border-2 border-[#E6B34B] w-1/3">
        <hr class="my-2 h-px border-1 border-[#E6B34B] w-1/4">
        <span class="font-bold text-2xl">Bienvenue sur votre espace client</span>
        <hr class="my-2 h-px border-1 border-[#E6B34B] w-1/4">
        <hr class="my-0 h-px border-2 border-[#E6B34B] w-1/3 mb-8">
        <div class="flex flex-col lg:flex-row lg:w-2/3 justify-center items-center border-t-4 border-t-[#E6B34B] bg-[#272023] text-white">
            <form class="flex flex-col p-8 pb-8 lg:w-1/2">
            <p class="text-center">Déjà Client ?</p>
                    <label for="email" class="lg:w-1/2 lg:mx-auto">Email</label>
                    <input type="email" name="email" v-model="credential.email" class="lg:w-1/2 lg:mx-auto">
                     <div class="error" v-if="emailEmpty">
                        Vous devez saisir un mail
                    </div>
                    <label for="password" class="lg:w-1/2 lg:mx-auto">Password</label>
                    <input type="password" name="password" v-model="credential.password" class="lg:w-1/2 lg:mx-auto">
                     <div class="error" v-if="passwordEmpty">
                     Merci de saisir votre mot de passe
                    </div>
                    <button @click="login(credential)" class="text-[#272023] my-8 lg:w-1/2 lg:mx-auto">Se connecter</button>
                    <div class="error" v-if="matching">
                    Une erreure est survenue
                    </div>
            </form>
            <div class=" flex flex-col justify-center items-center w-1/2 border-t-2 lg:border-l-2 lg:border-l-[#E6B34B] lg:border-t-0 border-t-[#E6B34B] lg:w-1/2">
                <p>Nouveau Client ?</p>
                 <router-link :to="{ name: 'CreateUser' }" class="text-white mx-auto my-8">
                    <button  class="text-[#272023] w-full">Créer un compte</button>
                </router-link>
            </div>
        </div>
    </div>
</template>

<script>

import { useAuthStore } from '../store/authentificationStore';
import { mapActions } from 'pinia';
export default {
    name: 'Connexion',
    components:{
    },
    data()  {
        return {
            credential:{
                email : this.email,
                password : this.password,
            },
            email: '',
            password:''
        }
    },
    methods:{
        ...mapActions(useAuthStore,['login'])
    }
}


</script>

<style scoped>
.connexion{
    animation: fadein ease-in-out 0.5s;

}
@keyframes fadein {
    0% {
    opacity:0;
    }
    100% {
    opacity:1;
    }
}

input{
    border: 2px solid gray;
    color: #272023;
}
button{
    background-color: #E6B34B;
    padding: 0.5rem;
    border-radius: 15px;
}
.error{
    color: red;
    font-weight: bold;
}
</style>
