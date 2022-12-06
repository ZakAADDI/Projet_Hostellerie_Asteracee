<template>
    <div class="confirmOrder flex flex-col items-center grow mt-8 lg:mt-20">
    <span class="text-[#E6B34B] text-2xl">Merci pour votre réservation</span>
    <div class="flex flex-col justify-center items-center p-6">
        <p class="text-center mb-2">Vous allez recevoir dans quelques instants un email de confirmation, avec le récapitulatif de votre réservation</p>
        <p class="text-center mb-2"> ainsi que des informations utiles pour bien préparer votre séjour.</p>
        <p class="text-center mb-2">En vous souhaitant une belle journée</p>
        <p class="text-center mb-2">L'équipe de l'Hostellerie de l'Astéracée</p>
    </div>

        <button class="bg-[#E6B34B] p-4 rounded-md text-[#272023] mx-6 mb-6" @click="endBooking">Retour à la réception</button>
    </div>
</template>

<script>
export default {
    name: 'Confirm Order',
    components:{
    },
    methods:{
        endBooking(){
            // sendEmail
            this.$router.push({ name : 'Home'});
        }

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
