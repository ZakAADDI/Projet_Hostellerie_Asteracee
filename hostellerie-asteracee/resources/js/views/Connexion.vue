<template>
    <div class="connexion">
        <form @submit.prevent="submitForm">
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
        </form>
    </div>
</template>

<script>
import axios from 'axios'
export default {
    name: 'Connexion',
    components:{
    },
    data()  {
        return {
            email : "",
            password : "",
            emailEmpty: false,
            passwordEmpty: false
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
                this.response = await axios.post('http://127.0.0.1:8000/api/auth/login', this.datas
                ).catch(
                    function(){
                        console.log('houston we\'ve got a problem');
                        return false;
                    }
                );
                console.log(this.response.data);
                this.$router.push({ name: 'Home'});
            }
    }
}

}
</script>

<style scoped>
.connexion{
    height: 70vh;
}
form{
    border: 1px solid gray;
    margin-top: 2rem;
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
    background-color: #D2BD4D;
    padding: 0.5rem;
    border-radius: 15px;
    margin: 1rem;
}
</style>
