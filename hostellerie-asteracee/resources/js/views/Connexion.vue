<template>
    <div class="connexion flex flex-col justify-center grow items-center">
        <hr class="my-0 h-px border-2 border-[#E6B34B] w-1/3">
        <hr class="my-2 h-px border-1 border-[#E6B34B] w-1/4">
        <span class="font-bold text-2xl">Bienvenue sur votre espace client</span>
        <hr class="my-2 h-px border-1 border-[#E6B34B] w-1/4">
        <hr class="my-0 h-px border-2 border-[#E6B34B] w-1/3 mb-8">
        <div class="flex justify-between border-t-4 w-1/2 border-t-[#E6B34B] bg-[#272023] text-white">
            <form @submit.prevent="connectUser" class="flex flex-col w-1/2 p-8">
            <p class="text-center">Déjà Client ?</p>
                    <label for="email">Email</label>
                    <input type="email" name="email" v-model="email">
                     <div class="error" v-if="emailEmpty">
                        Vous devez saisir un mail
                    </div>
                    <label for="password">Password</label>
                    <input type="password" name="password" v-model="password">
                     <div class="error" v-if="passwordEmpty">
                     Merci de saisir votre mot de passe
                    </div>
                    <button class="text-[#272023]">Se connecter</button>
                    <div class="error" v-if="matching">
                    Une erreure est survenue
                    </div>
            </form>
            <div class=" flex flex-col justify-center items-center w-1/2 border-l-2 border-l-[#E6B34B]">
                <p>Nouveau Client ?</p>
                 <router-link :to="{ name: 'CreateUser' }" class="text-white">
                    <button class="text-[#272023]">Créer un compte</button>
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

input{
    border: 2px solid gray;
    color: #272023;
}
button{
    background-color: #E6B34B;
    padding: 0.5rem;
    border-radius: 15px;
    margin: 1rem;
}
.error{
    color: red;
    font-weight: bold;
}
</style>
