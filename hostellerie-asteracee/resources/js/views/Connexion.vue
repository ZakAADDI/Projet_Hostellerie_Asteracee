<template>
    <div class="connexion flex flex-col justify-center grow items-center mt-24 mb-8">
        <hr class="my-0 h-px border-2 border-[#E6B34B] w-4/5">
        <hr class="my-2 h-px border-1 border-[#E6B34B] w-3/5">
        <span class="font-bold text-xl">Bienvenue sur votre espace client</span>
        <hr class="my-2 h-px border-1 border-[#E6B34B] w-3/5">
        <hr class="my-0 h-px border-2 border-[#E6B34B] w-4/5 mb-8">
        <div class="flex flex-col h-max justify-center items-center border-t-4 border-t-[#E6B34B] bg-[#272023] text-white">
            <form @submit.prevent="connectUser" class="flex flex-col w-80 pb-8">
            <p class="text-center mt-6">Déjà Client ?</p>
                    <label for="email" class="ml-4 mt-4">Email</label>
                    <input type="email" name="email" v-model="email" class="w-72 mx-auto border-2 border-[#E6B34B] mb-4">
                     <div class="error" v-if="emailEmpty">
                        Vous devez saisir un mail
                    </div>
                    <label for="password" class="ml-4">Password</label>
                    <input type="password" name="password" v-model="password" class="w-72 mx-auto border-2 border-[#E6B34B] mb-12">
                     <div class="error" v-if="passwordEmpty">
                     Merci de saisir votre mot de passe
                    </div>
                    <button class="text-[#272023] text-lg w-72 m-auto mb-4">Se connecter</button>
                    <div class="error" v-if="matching">
                    Une erreure est survenue
                    </div>
            </form>
            <div class=" flex flex-col justify-center items-center w-1/2 border-t-2 lg:border-l-2 lg:border-l-[#E6B34B] lg:border-t-0 border-t-[#E6B34B] lg:w-1/2">
                <p class="mt-10">Nouveau Client ?</p>
                 <router-link :to="{ name: 'CreateUser' }" class="text-white mx-auto my-8">
                    <button class="text-[#272023] w-full">Créer un compte</button>
                </router-link>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios'
import localStorage from '../services/localStorageProvider'
export default {
    name: 'Connexion',
    components:{
    },
    data()  {
        return {
            email : "",
            password : "",
            emailEmpty: false,
            passwordEmpty: false,
            matching: false
        }
    },
    methods:{
        async connectUser(){
            if(this.email == ""){
                this.emailEmpty = true;
            }
            if(this.password == ""){
                this.passwordEmpty = true;
            }
            if(!this.emailEmpty && !this.passwordEmpty){
                this.datas = {
                email: this.email,
                password: this.password
                };
                this.response = await axios.post('http://127.0.0.1:8000/api/login', this.datas);
                localStorage.set("user", [this.email,this.response.data.token]);
                    this.$router.push({ name: 'Home'});
                }else{
                    this.matching = true;
                }

            }
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
