<template>
    <div class="confirmDeleteAccount flex flex-col items-center justify-center grow">
        <h1>Êtes-vous sûr de vouloir supprimer votre compte ?</h1>
        <button @click.prevent="deleteUser">Oui</button>
        <router-link :to="{ name: 'UserProfile' }" class=" text-[#e71f1f]">
                Non
        </router-link>
    </div>
</template>

<script>
import localStorage from '../services/localStorageProvider'
import axiosProvider from '../services/axiosConfigProvider';
import axios from 'axios';
export default {
    name: 'ConfirmDeleteAccount',
    components:{
    },
    methods:{
        async deleteUser(){

            this.userToken = localStorage.get("user")[1];
        this.body =
            {
                "token":this.userToken
            }
        this.currentUser = (await axiosProvider.postWithOutAuth('/findUser',this.body))?.data;
        this.deleteOneUser = await axios.delete('/api/users/' + this.currentUser.id);
        if(this.updatedUser.status == 200){
            this.$router.push({name:'Connexion'})
        }else{
            this.$router.push({name:'SomethingWentWrong'});
        }
        console.log(this.deleteOneUser)
        }
    }
}
</script>

<style scoped>
.confirmDeleteAccount{
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