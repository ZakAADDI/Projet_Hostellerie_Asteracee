<template>
    <div class="confirmOrder flex flex-col items-center grow mt-32 lg:mt-28">

    <div class="confirmOrder flex flex-col items-center grow mt-32 lg:mt-28">
        <span class="text-[#E6B34B] text-2xl">{{ $t("message.thx4Booking") }}</span>
        <div class="flex flex-col justify-center items-center p-6">
            <p class="text-center mb-2">{{ $t("message.thx4BookingT1") }}</p>
            <p class="text-center mb-2">{{ $t("message.thx4BookingT2") }}</p>
            <p class="text-center mb-2">{{ $t("message.thx4BookingT3") }}</p>
            <p class="text-center mb-2">{{ $t("message.thx4BookingT4") }}</p>
        </div>
        <button @click="endBooking" class="bg-[#E6B34B] p-4 rounded-md text-[#272023] mx-6 mb-6">{{ $t("message.home") }}</button>
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
