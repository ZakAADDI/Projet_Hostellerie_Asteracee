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
                    :roomDescription="booking.room.room_type"
                    :roomImg="booking.room.room_type"
                    :roomPrestations="booking.room.prestations"
                    :bookingId="booking.booking_id"/>
        </div>
        </div>

    </div>
</template>

<script>
import BookingCard from '../components/BookingCard.vue'
import localStorage from '../services/localStorageProvider'
import axiosProvider from '../services/axiosConfigProvider'

export default {
    name: 'UserBookingsView',
    data: function(){
        return{
            bookings : this.$route.params.userBookings,
        }
    },
    components:{
      BookingCard
    },
    async created(){
        this.userToken = localStorage.get("user")[1];
        this.body =
            {
                "token":this.userToken
            }
        this.currentUser = (await axiosProvider.postWithOutAuth('/findUser',this.body))?.data;
        this.userId = this.currentUser.id;
        this.body =
        {
            "userId": this.userId
        }
        this.bookings = (await axiosProvider.postWithOutAuth('/findUserBookings',this.body))?.data;
        this.runningBookings = [];
        this.endedBookings = [];
        this.bookings.forEach(booking => {
            if(booking.status === 'ended'){
                this.endedBookings.push(booking);
            }else{
                this.runningBookings.push(booking);
            }
        });

        this.bookingStatus=this.$route.query.userBookings;
        if(this.bookingStatus === 'running'){
            this.bookings = this.runningBookings
        }else{
            this.bookings = this.endedBookings
        }

    }
}
</script>

<style scoped>

</style>
