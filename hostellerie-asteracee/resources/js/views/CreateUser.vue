<template>
    <div class="newUser flex grow items-center z-10">

        <form @submit.prevent="newUser" class="flex flex-col border-4 border-[#E6B34B] w-2/5 mx-auto p-8 bg-[#272023] text-white">
         <h2 class="text-center">{{ $t("message.registerForm") }}</h2>
           <fieldset>{{ $t("message.civility") }}</fieldset>
           <div>
                <input class="mr-2" type="radio" value="male" name="male" v-model="gender">
                    <label for="gendre">{{ $t("message.male") }}</label>
                <input class="mr-2 ml-4" type="radio" value="female" name="female" v-model="gender">
                    <label for="gendre">{{ $t("message.female") }}</label>
                <div class="error" v-if="firstnameEmpty">
                    {{ $t("message.plsChooseGender") }}
                </div>
           </div>

           <div class="flex justify-center">
                <div class="flex flex-col w-1/3 mx-8">
                <label for="firstname">{{ $t("message.fname") }}</label>
                    <input type="text" name="fristname" v-model="firstname">
                    <div class="error" v-if="firstnameEmpty">
                    {{ $t("message.plsEnterFname") }}
                    </div>
                </div>
                <div class="flex flex-col w-1/3 mx-8">
                <label for="lastname">{{ $t("message.lname") }}</label>
                    <input type="text" name="lastname" v-model="lastname">
                    <div class="error" v-if="lastnameEmpty">
                    {{ $t("message.plsEnterLname") }}
                    </div>
                </div>
            </div>

            <label for="email">Email</label>
                <input type="email" name="email" v-model="email">
                <div class="error" v-if="emailEmpty">
                    {{ $t("message.plsEnterEmail") }}
                    </div>
            <label for="address">{{ $t("message.address") }}</label>
                <input type="text" name="address" v-model="address">
                <div class="error" v-if="addressEmpty">
                    {{ $t("message.plsEnterPostalAddress") }}
                    </div>
            <label for="password">{{ $t("message.password") }}</label>
                <input type="password" name="password" v-model="password">
                <div class="error" v-if="passwordEmpty">
                    {{ $t("message.plsEnterPsswd") }}
                    </div>
            <label for="confirmPassword">{{ $t("message.psswdConfirmation") }}</label>
                <input type="password" name="confirmPassword" v-model="confirmPassword">
                <div class="error" v-if="confirmPasswordEmpty">
                    {{ $t("message.enterPsswdAgain") }}
                </div>
                <div class="error" v-if="checkPassword">
                    {{ $t("message.psswdAreDiff") }}
                </div>
            <button class="text-[#272023]">{{ $t("message.creatAcc") }}</button>
        </form>

    </div>
    <CreateUserSVG />
</template>

<script>
import axiosProvider from "../services/axiosConfigProvider"
import localStorage from '../services/localStorageProvider'
import store from '../store/index.js'
import CreateUserSVG from '../subComponents/CreateUserSVG.vue'

export default {
    name: 'CreateUser',
    components: {
        CreateUserSVG
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
            checkPassword: false,
            address: '',
            addressEmpty: false
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
            this.addressEmpty=false;

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
            if(this.address == ""){
                this.addressEmpty = true
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
            && !this.confirmPasswordEmpty
            && !this.checkPassword){
                this.datas =
                    {
                        gender : this.gender,
                        firstname : this.firstname,
                        lastname : this.lastname,
                        email : this.email,
                        password : this.password,
                        address : this.address
                    }
                ;
                this.response = (await axiosProvider.postWithOutAuth('/register',this.datas));

                if(this.response.status == 200){
                    this.datas = {
                        email: this.email,
                        password: this.password
                    };
                    this.loginUser = await axios.post('/api/login', this.datas);
                    localStorage.set("user", [this.email,this.response.data.token]);
                    store.commit('addUser',{
                    email: this.email,
                    token: this.response.data.token
                });
                    this.$router.push({ name: 'ConfirmCreatedAccount'});
                }else{
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
