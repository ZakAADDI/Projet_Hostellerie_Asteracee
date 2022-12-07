<template>
    <div class="confirmOrder flex flex-col items-center grow mt-32 lg:mt-28">
    <!--Template FR -->
    <div v-if="currentLanguage" class="confirmOrder flex flex-col items-center grow mt-32 lg:mt-28">
        <span class="text-[#E6B34B] text-2xl">Merci pour votre réservation</span>
        <div class="flex flex-col justify-center items-center p-6">
            <p class="text-center mb-2">Vous allez recevoir dans quelques instants un email de confirmation, avec le récapitulatif de votre réservation.</p>
            <p class="text-center mb-2">Ainsi que des informations utiles pour bien préparer votre séjour.</p>
            <p class="text-center mb-2">En vous souhaitant un bon séjour.</p>
            <p class="text-center mb-2">L'équipe de l'Hostellerie de l'Astéracée.</p>
        </div>
        <button @click="endBooking" class="bg-[#E6B34B] p-4 rounded-md text-[#272023] mx-6 mb-6">Retour à l'accueil</button>
    </div>

    <!--Template EN -->
    <div v-if="!currentLanguage" class="confirmOrder flex flex-col items-center grow mt-32 lg:mt-28">
        <span class="text-[#E6B34B] text-2xl">Thank you for you booking</span>
        <div class="flex flex-col justify-center items-center p-6">
            <p class="text-center mb-2">You will receive in a few moments a confirmation email, with the summary of your booking.</p>
            <p class="text-center mb-2">As well as useful information to prepare your stay.</p>
            <p class="text-center mb-2">Wishing you a good stay.</p>
            <p class="text-center mb-2">The Hostellerie de l'Astéracée team.</p>
        </div>
        <button @click="endBooking" class="bg-[#E6B34B] p-4 rounded-md text-[#272023] mx-6 mb-6">Back to homepage</button>
    </div>
    </div>
</template>

<script>
import localStorage from '../services/localStorageProvider'
export default {
    name: 'ConfirmOrder',
    data(){
        return{
            currentLanguage: "false"
        }
    },
    created(){
            this.language = localStorage.get("language");
            if(this.language == "fr"){
                return this.currentLanguage = true;
            }
            if(this.language == "en"){
                return this.currentLanguage = false;
            }
    },
    methods: {
        endBooking() {
            localStorage.unset("cartOptions");
            localStorage.unset("userChoice");
            localStorage.unset("cartRoom");
            localStorage.unset("total_room_price");
            localStorage.unset("total_options_price");
            this.$router.push({name: 'Home'});
        }
    }
}
</script>

<style scoped>
.confirmOrder {
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
