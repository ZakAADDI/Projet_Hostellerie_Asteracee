<template>
     <div class="border-4 border-[#E6B34B] bg-[#272023] text-white flex flex-col justify-center items-center mt-6 mx-6 lg:w-1/2 lg:mx-auto grow">
        <div class="flex flex-col items-center justify-center">
            <h1>Profil utilisateur</h1>
                <div class="flex w-full mt-12">
                    <div class="w-2/5 ml-14 mb-4">
                        <img v-if="isMale(currentUser)" :src=maleImg.url alt="" style="width: 120px;">
                        <img v-if="!isMale(currentUser)" :src=femaleImg.url alt="" style="width: 120px;">
                        {{this.currentUser.firstname}} {{this.currentUser.lastname}}
                    </div>
                    <div class="flex flex-col">
                        <h1>Loyalty</h1>
                        <span>Nombre de réservations effectuées : {{ this.currentUser.loyalty }}</span>
                        <span>Nombre de réservations restantes avant remise : {{ this.loyaltyRemains }}</span>
                    </div>
                </div>


                <div class="flex">
                    <div class="flex flex-col items-center">
                    <h1>Mes réservations en cours</h1>
                    <button class="bg-[#E6B34B] p-4 rounded-md text-[#272023] mx-6">
                        <router-link :to="{name:'UserBookingsView',query:{userBookings: 'running'}}">Voir mes réservations en cours</router-link>
                    </button>
                    </div>
                    <div class="flex flex-col items-center">
                    <h1>Mes réservations terminées</h1>
                    <button class="bg-[#E6B34B] p-4 rounded-md text-[#272023] mx-6">
                        <router-link :to="{name:'UserBookingsView',query:{userBookings: 'ended'}}">Voir mes réservations terminées</router-link>
                    </button>
                    </div>
                </div>

                <div class="mt-6">
                    <h1 class="flex flex-col items-center">Mon Profil</h1>
                    <div class="flex">
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

                <div class="mt-6">
                    <h1 class="flex flex-col items-center justify-center">Racontez nous votre expérience</h1>
                    <div class="flex justify-center">
                    <button class="bg-[#E6B34B] p-4 rounded-md text-[#272023] mx-6">
                        <router-link :to="{name:'AddReview'}">Ajouter un commentaire</router-link>
                    </button>
                    </div>
                </div>
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
        currentUser : [],
        loyaltyRemains : Number,
        }
    },
    components:{
    },
    async created(){

        this.currentUser = (await axiosProvider.get('/user/info')).data;
        this.userId = this.currentUser.id;

        this.displayImg = (await axiosProvider.get('/medias'))?.data;
        this.femaleImg = this.displayImg[12];
        this.maleImg = this.displayImg[13];
        this.gender = this.currentUser.gender

        this.lastname = this.currentUser.lastname
        this.firstname = this.currentUser.first
        this.birth_date = this.currentUser.birth_date
        this.address = this.currentUser.address
        this.email = this.currentUser.email

        this.loyalty = this.currentUser.loyalty;
        this.loyaltyRemains = 10 - this.loyalty;

        this.userInfo =  (await axiosProvider.get('/user/info'));

    },
    methods:{
        isMale(currentUser){
            return currentUser.gender == 'male';
        }
    },
};
</script>

<style scoped>

</style>
