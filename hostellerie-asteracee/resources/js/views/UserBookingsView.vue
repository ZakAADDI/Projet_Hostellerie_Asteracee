<template>
         <div class="border-4 border-[#E6B34B] bg-[#272023] text-white flex flex-col justify-center items-center mt-6 mx-6 lg:w-1/2 lg:mx-auto grow">

    <div class="flex flex-col items-center justify-center">
        <h1>Vos réservations
        </h1>
        <div v-for="booking in bookings" :key=booking.id >
            <BookingCard
                    :startingDate="booking.starting_date"
                    :endingDate="booking.ending_date"
                    :totalPrice="booking.total_price"
                    :roomStatus="booking.status"
                    :roomImg="booking.room.room_type"
                    :roomDescription="booking.room.room_type"
                    :roomPrestations="booking.room.prestations"/>
        </div>

    </div>
    </div>
</template>

<script>
import localStorage from '../services/localStorageProvider'
import axiosProvider from "../services/axiosConfigProvider"
import BookingCard from '../components/BookingCard.vue'

export default {
    name: 'UserBookingsView',
    components:{
        BookingCard
    },
    data(){
        return{
            currentUser: [],
            bookings: []
        }
    },
    async created(){
        this.userToken = localStorage.get("user")[1];
        this.body =
            {
                "token":this.userToken
            }
        this.currentUser = (await axiosProvider.postWithOutAuth('/findUser',this.body))?.data;
        this.userId = this.currentUser.id;

        // console.log(this.userId)OK
        this.body =
        {
            "userId": this.userId
        }
        this.bookings = (await axiosProvider.postWithOutAuth('/findUserBookings',this.body))?.data;

        console.log(this.bookings)

    },
}
</script>

<style scoped>

</style>
