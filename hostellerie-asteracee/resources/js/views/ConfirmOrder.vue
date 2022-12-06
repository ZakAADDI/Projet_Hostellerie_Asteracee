<template>
    <div class="confirmOrder flex flex-col items-center grow mt-8 lg:mt-20">
    <span class="text-[#E6B34B] text-2xl">Merci pour votre réservation</span>
    <div class="flex flex-col justify-center items-center p-6">
        <p class="text-center mb-2">Vous allez recevoir dans quelques instants un email de confirmation, avec le récapitulatif de votre réservation</p>
        <p class="text-center mb-2"> ainsi que des informations utiles pour bien préparer votre séjour.</p>
        <p class="text-center mb-2">En vous souhaitant une belle journée</p>
        <p class="text-center mb-2">L'équipe de l'Hostellerie de l'Astéracée</p>
    </div>
        <form @submit.prevent="endBooking">
            <button class="bg-[#E6B34B] p-4 rounded-md text-[#272023] mx-6 mb-6">Retour à la réception</button>
        </form>
    </div>
</template>

<script>
import localStorage from '../services/localStorageProvider'
import axiosProvider from '../services/axiosConfigProvider'
import emailjs from '@emailjs/browser';

export default {
    name: 'Confirm Order',
    components:{
    },
    data(){
        return{
            currentUser: Object
        }
    },
    methods:{
        endBooking(event){
            try {
                emailjs.sendForm('service_221d5yz', 'template_uym8zdc', event.target,
                    'bbyfEd_o77jz3eSoT', 
                {
                    // ----- User infos -----

                    userLastname : "zak",
                    gender : this.currentUser.gender,

                    // ----- Booking infos -----
                    startingDate: this.userChoice.startingDate,
                    endingDate: this.userChoice.endingDate,
                    nbrOfDays: this.userChoice.nbrOfDays,
                    occupants: this.userChoice.occupants,

                    // ----- Room infos -----
                    roomName: this.cartRoom.roomName,
                    roomPrestations: this.cartRoom.roomPrestations,
                    roomDescription: this.cartRoom.roomDescription,
                    roomPrice: this.cartRoom.roomPrice,

                    // ----- Service infos -----
                    service1Name : this.service1.title,
                    service1Content : this.service1.content,
                    service2Name : this.service2.title,
                    service2Content : this.service2.content,
                    service3Name : this.service3.title,
                    service3Content : this.service3.content,
                })
                console.log('Ok')
            } catch (error) {
                console.log({ error })
            }
            // this.$router.push({ name : 'Home'});
        }
    },
    async created(){
            this.userChoice = localStorage.get("userChoice");
            // console.log(this.userChoice);
            this.cartRoom = localStorage.get("cartRoom");
            //console.log(this.cartRoom)
            this.userToken = localStorage.get("user")[1];
            //console.log(this.userToken);
            this.data =
                {
                    "token" : this.userToken
                }
            ;
            this.currentUser = (await axiosProvider.postWithOutAuth('/findUser',this.data))?.data;
            console.log(this.currentUser);
            this.services = (await axiosProvider.get('/services'))?.data;
            // console.log(this.services);
            this.service1 = this.services[0];
            this.service2 = this.services[1];
            this.service3 = this.services[2];
            // console.log(this.service1);
            // console.log(this.service2);
            // console.log(this.service3);
    }       
}
</script>

<style scoped>
.confirmOrder{
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
