<template>
    <div class="flex flex-col items-center justify-center grow">
        <h1>Valider la réservation ?</h1>
        <button @click="validate">Oui</button>
        <button @click="returnHome">Non</button>
    </div>
</template>

<script>
import axiosProvider from "../services/axiosConfigProvider";

export default {
    name: 'ConfirmBooking',
    components:{
    },
    computed:{

        validate(){
            axiosProvider.get('/bookings/confirm/' + this.$route.query.bookingId)
        },
        returnHome(){
            this.$router.push({name:'Home'});
        }
    }
}
</script>

