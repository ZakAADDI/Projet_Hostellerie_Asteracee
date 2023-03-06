<template>
     <div class="border-4 border-[#E6B34B] bg-[#272023] text-white flex flex-col justify-center items-center mt-6 mx-6 lg:w-1/2 lg:mx-auto grow">
        <div class="flex flex-col items-center justify-center">
            <h1>Profil utilisateur</h1>


                <img v-if="isMale(currentUser)" :src=maleImg.url alt="" style="width: 120px;">
                <img v-if="!isMale(currentUser)" :src=femaleImg.url alt="" style="width: 120px;">
                {{this.currentUser.firstname}} {{this.currentUser.lastname}}


                <div>
                    <h1>Mes réservations</h1>
                    <button class="bg-[#E6B34B] p-4 rounded-md text-[#272023] mx-6">
                        <router-link :to="{name:'Home'}">Voir mes réservations</router-link>
                    </button>
                </div>

                <div>
                    <h1>Mon Profil</h1>
                    <button class="bg-[#E6B34B] p-4 rounded-md text-[#272023] mx-6">
                        <router-link :to="{name:'UpdateUser'}">Mettre à jour mon profil</router-link>
                    </button>
                    <button class="bg-[#E6B34B] p-4 rounded-md text-[#272023] mx-6">
                    <router-link :to="{name:'UpdatePassword'}">Mettre à jour mon mot de passe</router-link>
                    </button>
                    <button class="bg-[#E6B34B] p-4 rounded-md text-[#272023] mx-6">
                    <router-link :to="{name:'DeleteAccount'}">Supprimer mon compte</router-link>
                    </button>

                </div>


        </div>
    </div>
</template>

<script>
import localStorage from '../services/localStorageProvider'
import axiosProvider from '../services/axiosConfigProvider'
export default {
    name: 'UserProfile',
    data(){
        return{
        maleImg: Object,
        femaleImg: Object,
        currentUser : []
        }
    },
    components:{
    },
    async created(){
        this.userToken = localStorage.get("user")[1];
        this.body =
            {
                "token":this.userToken
            }
        this.currentUser = (await axiosProvider.postWithOutAuth('/findUser',this.body))?.data;
        this.displayImg = (await axiosProvider.get('/medias'))?.data;
        this.femaleImg = this.displayImg[12];
        this.maleImg = this.displayImg[13];
        this.gender = this.currentUser.gender
        this.lastname = this.currentUser.lastname
        this.firstname = this.currentUser.firstname
        this.birth_date = this.currentUser.birth_date
        this.address = this.currentUser.address
        this.email = this.currentUser.email
    },
    methods:{
        isMale(currentUser){
            return currentUser.gender == 'male';
        }
    }
}
</script>

<style scoped>

</style>
