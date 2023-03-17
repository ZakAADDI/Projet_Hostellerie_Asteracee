<template>
     <div class="z-10 border-4 border-[#E6B34B] bg-[#272023] text-white flex flex-col mb-2 pb-4 justify-center items-center mt-6 mx-6 lg:w-1/2 lg:mx-auto grow">
        <div class="flex flex-col items-center justify-center">
            <h1 class="mt-6 text-2xl">{{ $t("message.profil") }}</h1>
                <div class="flex justify-around w-full mt-12">
                    <div class="w-2/5 mb-4 flex flex-col justify-center items-center">
                        <img v-if="isMale(currentUser)" :src=maleImg.url alt="" style="width: 120px;">
                        <img v-if="!isMale(currentUser)" :src=femaleImg.url alt="" style="width: 120px;">
                        <span class="mx-auto mt-4">{{this.currentUser.firstname}} {{(this.currentUser.lastname).toUpperCase()}}</span>
                    </div>
                    <div class="flex flex-col justify-center">
                        <h1>{{ $t("message.loyalty") }}</h1>
                        <span>{{ $t("message.nbBookingDone") }} : {{ this.currentUser.loyalty }}</span>
                        <span>{{ $t("message.nbBookingRemaining") }} : {{ this.loyaltyRemains }}</span>
                        <div class="flex items-center">
                            <progress value="{{ (this.currentUser.loyalty / 10 * 100) }}" max="10"></progress>
                            <div class="ml-2">{{ (this.currentUser.loyalty / 10 * 100) }} %</div>
                        </div>
                    </div>
                </div>
                    <div class="mb-4">{{ $t("message.yourBooking") }}</div>
                <div class="flex">
                    <div class="flex flex-col items-center">
                    <button class="bg-[#E6B34B] p-4 rounded-md text-[#272023] mx-6 w-[250px]">
                        <router-link :to="{name:'UserBookingsView',query:{userBookings: 'running'}}">{{ $t("message.bookingsInProgress") }}</router-link>
                    </button>
                    </div>
                    <div class="flex flex-col items-center">
                    <button class="bg-[#E6B34B] p-4 rounded-md text-[#272023] mx-6 w-[250px]">
                        <router-link :to="{name:'UserBookingsView',query:{userBookings: 'ended'}}">{{ $t("message.bookingsEnded") }}</router-link>
                    </button>
                    </div>
                </div>

                <div class="mt-6">
                    <h1 class="flex flex-col items-center mb-4">{{ $t("message.myAccount") }}</h1>
                    <div class="flex">
                        <button class="bg-[#E6B34B] p-4 rounded-md text-[#272023] mx-6">
                            <router-link :to="{name:'UpdateUser'}">{{ $t("message.updateProfil") }}</router-link>
                        </button>
                        <button class="bg-[#E6B34B] p-4 rounded-md text-[#272023] mx-6">
                        <router-link :to="{name:'UpdatePassword'}">{{ $t("message.updatePasswd") }}</router-link>
                        </button>
                        <button class="bg-[#E6B34B] p-4 rounded-md text-[#272023] mx-6">
                        <router-link :to="{name:'DeleteAccount'}">{{ $t("message.deleteMyAcc") }}</router-link>
                        </button>
                </div>

                <div class="mt-6">
                    <h1 class="flex flex-col items-center justify-center mb-4">{{ $t("message.tellUsYourExp") }}</h1>
                    <div class="flex justify-center">
                    <button class="bg-[#E6B34B] p-4 rounded-md text-[#272023] mx-6 w-[250px]">
                        <router-link :to="{name:'AddReview'}">{{ $t("message.addReview") }}</router-link>
                    </button>
                    </div>
                </div>
            </div>
        </div>
        <LampSVG />
        <PlantSVG />


    </div>
</template>

<script>
import axiosProvider from '../services/axiosConfigProvider'
import LampSVG from '../subComponents/LampSVG.vue'
import PlantSVG from '../subComponents/PlantSVG.vue'
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
        LampSVG,
        PlantSVG
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
progress {
  -webkit-appearance: none;
}

::-webkit-progress-bar {
   background-color: gray;
}
</style>
