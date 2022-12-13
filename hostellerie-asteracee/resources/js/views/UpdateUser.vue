<template>
    <div class="profile flex flex-col items-center grow">
        <div class="flex flex-col mt-12">
            <hr class="w-80 h-1.5 bg-[#E6B34B] mx-auto sm:w-11/12">
            <hr class="w-72 h-1 bg-[#E6B34B] mx-auto mt-0.5 sm:w-10/12">

            <div class="h-12 w-80 text-2xl font-bold text-center mx-auto mt-4 mb-7" id="title">Bienvenue sur votre profil</div>

            <hr class="w-72 h-1 bg-[#E6B34B] mx-auto mb-0.5 sm:w-10/12">
            <hr class="w-80 h-1.5 bg-[#E6B34B] mx-auto sm:w-11/12">
        </div>

        <div class="profile bg-[#272023] w-11/12 mx-auto border-4 border-[#E6B34B] my-12">
            <form @submit.prevent="updateUser" class="flex flex-col text-white">
                <label for="civility" class="text-xl ml-10 mt-3">Civilité</label>
                <div class="mx-auto">
                    
                    <input type="radio" value="male" name="male" v-model="gender">
                    <label for="gender" class="mx-8">Homme</label>
                    <input type="radio" value="female" name="female" v-model="gender">
                    <label for="gender" class="mx-8">Femme</label>
                        
                </div>
                <label class="text-xl ml-10 mt-3" for="lastname">NOM</label>
                <input class="w-72 h-8 mx-auto text-black" name="lastname" type="text" v-model="lastname" :v-html=this.lastname>

                <label class="text-xl ml-10 mt-3" for="firstname">Prénom</label>
                <input class="w-72 h-8 mx-auto text-black" name="firstname" type="text" v-model="firstname" >
                
                <label class="text-xl ml-10 mt-3" for="birth_date">Date de naissance (format mm-dd-yyyy)</label>
                <input class="w-72 h-8 mx-auto text-black" name="birth_date" type="date" v-model="birth_date">
                
                <label class="text-xl ml-10 mt-3" for="address">Adresse</label>
                <input class="w-72 h-8 mx-auto text-black" name="address" type="text" v-model="address">

                <label class="text-xl ml-10 mt-3" for="email">eMail</label>
                <input class="w-72 h-8 mx-auto text-black" name="email" type="email" v-model="email">

                <button class="bg-[#E6B34B] h-12 w-56 mx-auto my-10 rounded-sm text-2xl font-bold">Envoyer</button>

            </form>
        </div>
    </div>    
</template>

<script>
import localStorage from '../services/localStorageProvider'
import axiosProvider from '../services/axiosConfigProvider';
export default {
    name: 'UpdateUser',
    components: {
    },
    data() {
        return {
            gender: '',
            lastname:'',
            firstname:'',
            birth_date:'',
            address:'',
            email: '',
            currentUser: Object
        }
    },
    methods: {
        async updateUser(){
            this.body = {
            civility : this.gender,
            lastname : this.lastname,
            firstname : this.firstname,
            birth_date : this.birth_date,
            address : this.address,
            email : this.email
        };
        this.updatedUser = (await axiosProvider.postWithOutAuth('/users/'+this.currentUser.id,this.body));
        if(this.updatedUser.status == 200){
            this.$router.push({name:'UserProfile'})
        }else{
            this.$router.push({name:'SomethingWentWrong'});
        }
        }
    },
    async created(){
        this.userToken = localStorage.get("user")[1];
        this.body =
            {
                "token":this.userToken
            }
        this.currentUser = (await axiosProvider.postWithOutAuth('/findUser',this.body))?.data;
        this.gender = this.currentUser.gender
        this.lastname = this.currentUser.lastname
        this.firstname = this.currentUser.firstname
        this.birth_date = this.currentUser.birth_date
        this.address = this.currentUser.address
        this.email = this.currentUser.email
        
        
        
    }
}
</script>

<style scoped>
.profile {
    animation: fadein ease-in-out 0.5s;
}

@keyframes fadein {
    0% {
        opacity: 0;
    }

    100% {
        opacity: 1;
    }
}
</style>
