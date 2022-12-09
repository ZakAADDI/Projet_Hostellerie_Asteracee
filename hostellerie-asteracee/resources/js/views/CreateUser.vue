<template>
    <div class="newUser flex grow items-center">

        <form @submit.prevent="newUser" class="flex flex-col border-4 border-[#E6B34B] w-2/5 mx-auto p-8 bg-[#272023] text-white">
         <h2 class="text-center">Formulaire d'inscription</h2>
           <fieldset>Civilité</fieldset>
           <div>
                <input type="radio" value="male" name="male" v-model="gender" checked>
                    <label for="gendre">Homme</label>
                <input type="radio" value="female" name="female" v-model="gender">
                    <label for="gendre">Femme</label>
                <div class="error" v-if="firstnameEmpty">
                        Merci de choisir une civilité
                </div>
           </div>
            <label for="firstname">Prénom</label>
                <input type="text" name="fristname" v-model="firstname">
                <div class="error" v-if="firstnameEmpty">
                        Vous devez saisir votre prénom
                    </div>
            <label for="lastname">Nom</label>
                <input type="text" name="lastname" v-model="lastname">
                <div class="error" v-if="lastnameEmpty">
                        Vous devez saisir votre nom
                    </div>
            <label for="email">Email</label>
                <input type="email" name="email" v-model="email">
                <div class="error" v-if="emailEmpty">
                        Vous devez saisir un mail
                    </div>
            <label for="password">Mot de passe</label>
                <input type="password" name="password" v-model="password">
                <div class="error" v-if="passwordEmpty">
                        Vous devez saisir un mot de passe
                    </div>
            <label for="confirmPassword">Confirmation de votre mot de passe</label>
                <input type="password" name="confirmPassword" v-model="confirmPassword">
                <div class="error" v-if="confirmPasswordEmpty">
                        Merci de saisir à nouveau votre mot de passe
                </div>
                <div class="error" v-if="checkPassword">
                        Vos mots de passe ne sont pas les mêmes
                </div>
            <button class="text-[#272023]">Créer mon compte</button>
        </form>

    </div>
</template>

<script>
import axiosProvider from "../services/axiosConfigProvider"
import localStorage from '../services/localStorageProvider'
export default {
    name: 'CreateUser',
    components: {
    },
    data(){
        return {
            gender:'',
            genderEmtpy: false,
            firstname:'',
            firstnameEmpty : false,
            lastname:'',
            lastnameEmpty : false,
            email:'',
            emailEmpty : false,
            password: '',
            passwordEmpty : false,
            confirmPassword:'',
            confirmPasswordEmpty : false,
            checkPassword: false
        }
    },
    methods:{
        async newUser(){
            this.genderEmtpy=false,
            this.firstnameEmpty=false,
            this.lastnameEmpty=false,
            this.emailEmpty=false,
            this.passwordEmpty=false,
            this.confirmPasswordEmpty=false,
            this.checkPassword=false;

            if(this.gender ==""){
                this.genderEmtpy = true;
            }
            if(this.firstname == ""){
                this.firstnameEmpty = true;
            }
            if(this.lastname == ""){
                this.lastnameEmpty = true;
            }
            if(this.email == ""){
                this.emailEmpty = true;
            }
            if(this.password == ""){
                this.passwordEmpty = true;
            }
            if(this.confirmPassword == ""){
                this.confirmPasswordEmpty = true
            }
            if(this.password != this.confirmPassword){
                this.checkPassword = true;
            }
            if(!this.genderEmtpy
            && !this.firstnameEmpty
            && !this.lastnameEmpty
            && !this.emailEmpty
            && !this.passwordEmpty
            && !this.confirmPasswordEmpty
            && !this.checkPassword){
                this.datas =
                    {
                        gender : this.gender,
                        firstname : this.firstname,
                        lastname : this.lastname,
                        email : this.email,
                        password : this.password
                    }
                ;
                this.response = (await axiosProvider.postWithOutAuth('/register',this.datas));

                // this.$router.push({ name: 'ConfirmCreatedAccount'});
                console.log(this.response);
                if(this.response.status == 200){
                    console.log('account created');
                    this.datas = {
                        email: this.email,
                        password: this.password
                    };
                    this.loginUser = await axios.post('http://127.0.0.1:8000/api/login', this.datas);
                    localStorage.set("user", [this.email,this.response.data.token]);
                    this.$router.push({ name: 'ConfirmCreatedAccount'});
                }else{
                    console.log('something went wrong!');
                    this.$router.push({name : 'SomethingWentWrong'});
                }

            }
        }
    }



}

</script>

<style scoped>
.newUser{
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
input{
    color: #272023;
}
</style>
