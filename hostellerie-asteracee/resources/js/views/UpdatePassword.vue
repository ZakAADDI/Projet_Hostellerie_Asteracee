<template>
    <div class="password flex flex-col items-center justify-center grow bg-[#272023] w-11/12 mx-auto border-4 border-[#E6B34B] my-12">
        <form @submit.prevent="checkUser" class="flex flex-col justify-center items-center">
            <h1 class="text-white">{{ $t("message.updatePasswd") }}</h1>
            <div class="flex flex-col justify-center items-center">
                <label class="text-xl mt-3 text-white" for="email">Email</label>
                <input class="w-72 h-8 mx-auto text-black" name="email" type="email" v-model="email">
            </div>
            <div class="error" v-if="emailEmpty">
                {{ $t("message.plsEnterEmail") }}
                    </div>
            <label class="text-xl mt-3 text-white" for="password">{{ $t("message.currentPasswrd") }}</label>
            <input class="w-72 h-8 mx-auto text-black" name="password" type="password" v-model="password">
            <div class="error" v-if="passwordEmpty">
                {{ $t("message.plsEnterPasswd") }}
                    </div>

            <div class="error" v-if="matching">
                {{ $t("message.User not found") }}
                    </div>
            <button type="submit" class="bg-[#E6B34B] h-12 w-56 mx-auto my-10 rounded-sm text-2xl font-bold">{{ $t("message.login") }}</button>

        </form>
        <div v-if="userFound" >
            <form class="update flex flex-col justify-center items-center" @submit.prevent="updatePassword">
                <label class="text-xl mt-3 text-white" for="newPassword">{{ $t("message.newPsswd") }}</label>
                <input class="w-72 h-8 mx-auto text-black" name="newPassword" type="password" v-model="newPassword">
                <div class="error" v-if="newPasswordEmpty">
                    {{ $t("message.plsEnterNewPsswd") }}
                </div>

                <label class="text-xl mt-3 text-white" for="newPassword">{{ $t("message.psswdConfirmation") }}</label>
                <input class="w-72 h-8 mx-auto text-black" name="newPasswordConfirm" type="password" v-model="newPasswordConfirm">
                <div class="error" v-if="newPasswordConfirmEmpty">
                    {{ $t("message.enterPsswdAgain") }}
                    </div>
                    <div class="error" v-if="matchingNewPassword">
                        {{ $t("message.psswdAreDiff") }}
                    </div>
                <button type="submit" class="bg-[#E6B34B] h-12 w-56 mx-auto my-10 rounded-sm text-2xl font-bold">{{ $t("message.update") }}</button>
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
