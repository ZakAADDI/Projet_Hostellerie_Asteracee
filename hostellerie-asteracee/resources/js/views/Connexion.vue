<template>
    <div class="connexion">
        <form @submit.prevent="submitForm" class="mt-8">
                <label for="email">Email</label>
                <input type="email" name="email" v-model="email">
                 <div class="error" v-if="emailEmpty">
                    Vous devez saisir un mail
                </div>
                <label for="message">Password</label>
                <input type="password" name="password" v-model="password">
                 <div class="error" v-if="passwordEmpty">
                Merci de saisir votre mot de passe
                </div>
                <button>Envoyer</button>
                <div class="error" v-if="matching">
                Une erreure est survenue
                </div>
        </form>

    </div>
</template>

<script>
import axios from 'axios'
import storage from '../store/index'
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
        async submitForm(){
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
                // if(this.response.data.status == true){
                //      storage.mutations.addUser(JSON.stringify({
                //         email: this.email,
                //         token: this.response.token
                //         }));
                //         console.log(storage.getters.oneUser)

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
    height: 70vh;
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
form{
    border: 1px solid gray;
    margin-top: 8rem;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    width: 30vw;
    margin-left: auto;
    margin-right: auto;
}
input{
    border: 2px solid gray;
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
