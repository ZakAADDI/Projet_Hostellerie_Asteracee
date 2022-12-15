<template>
    <div class="password flex flex-col items-center justify-center grow bg-[#272023] w-11/12 mx-auto border-4 border-[#E6B34B] my-12">
        <form @submit.prevent="checkUser" class="flex flex-col justify-center items-center">
            <h1 class="text-white">Mise à jour password</h1>
            <label class="text-xl ml-10 mt-3 text-white" for="email">eMail</label>
            <input class="w-72 h-8 mx-auto text-black" name="email" type="email" v-model="email">
            <div class="error" v-if="emailEmpty">
                        Vous devez saisir un mail
                    </div>
            <label class="text-xl ml-10 mt-3 text-white" for="password">Mot de passe actuel</label>
            <input class="w-72 h-8 mx-auto text-black" name="password" type="password" v-model="password">
            <div class="error" v-if="passwordEmpty">
                     Merci de saisir votre mot de passe
                    </div>

            <div class="error" v-if="matching">
                     User not found
                    </div>
            <button type="submit" class="bg-[#E6B34B] h-12 w-56 mx-auto my-10 rounded-sm text-2xl font-bold">Connexion</button>

        </form>
        <div v-if="userFound" >
            <form class="update flex flex-col justify-center items-center" @submit.prevent="updatePassword">
                <label class="text-xl ml-10 mt-3 text-white" for="newPassword">Nouveau mot de passe</label>
                <input class="w-72 h-8 mx-auto text-black" name="newPassword" type="password" v-model="newPassword">
                <div class="error" v-if="newPasswordEmpty">
                     Merci de saisir votre nouveau mot de passe
                </div>

                <label class="text-xl ml-10 mt-3 text-white" for="newPassword">Confirmation de votre nouveau mot de passe</label>
                <input class="w-72 h-8 mx-auto text-black" name="newPasswordConfirm" type="password" v-model="newPasswordConfirm">
                <div class="error" v-if="newPasswordConfirmEmpty">
                     Merci de confirmer votre nouveau mot de passe
                    </div>
                    <div class="error" v-if="matchingNewPassword">
                     Les mots de passe ne correspondent pas
                    </div>
                <button type="submit" class="bg-[#E6B34B] h-12 w-56 mx-auto my-10 rounded-sm text-2xl font-bold">Update</button>
            </form>
        </div>
    </div>
</template>

<script>
import axios from 'axios'
import localStorage from '../services/localStorageProvider'
import axiosProvider from '../services/axiosConfigProvider'
export default {
    name: 'UpdatePassword',
    components:{
    },
    data(){
        return{
            email: '',
            password: '',
            emailEmpty: false,
            passwordEmpty: false,
            matching: false,
            userFound: false,
            newPassword: '',
            newPasswordEmpty: false,
            newPasswordConfirm: '',
            newPasswordConfirmEmpty: false,
            matchingNewPassword : false
        }
    },
    methods:{
        async checkUser(){
            this.userToken = localStorage.get("user")[1];
            this.body =
            {
                "token":this.userToken
            }
            this.currentUser = (await axiosProvider.postWithOutAuth('/findUser',this.body))?.data;

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
                this.response = await axios.post('/api/checkUser/'+this.currentUser.id, this.datas);
                if(this.response.data.status == true){
                    //console.log('Jusque là ça va!')
                    this.userFound = true;
                }else{
                    this.matching = true;
                }
            }
        },
        async updatePassword(){
            this.userToken = localStorage.get("user")[1];
            this.body =
            {
                "token":this.userToken
            }
            this.currentUser = (await axiosProvider.postWithOutAuth('/findUser',this.body))?.data;

            if(this.newPassword == ""){
                this.newPasswordEmpty = true;
            }
            if(this.newPasswordConfirm == ""){
                this.newPasswordConfirmEmpty = true;
            }
            if(!this.newPasswordEmpty &&
            !this.newPasswordConfirmEmpty){
                if(this.newPassword == this.newPasswordConfirm){
                    this.newData ={
                        newPassword : this.newPassword
                    }
                    this.response = await axios.post('/api/updatePassword/'+this.currentUser.id, this.newData);
                    if(this.response.data.status == true){
                        this.$router.push({name: 'UserProfile'})
                    }else{
                        this.$router.push({name:'SomethingWentWrong'});
                    }
                }else{
                    this.matchingNewPassword = true;
                }
            }

        }
    }
}
</script>

<style scoped>
.error{
    font-weight: bold;
    color: red;
}
.update, .password{
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
</style>
