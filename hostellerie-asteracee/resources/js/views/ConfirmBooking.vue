<template>
    <div class="flex flex-col items-center justify-center grow">
        <h1>{{ $t("message.confirmBooking") }} ?</h1>
        <button @click="validate">{{ $t("message.yes") }}</button>
        <button @click="returnHome">{{ $t("message.no") }}</button>
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

