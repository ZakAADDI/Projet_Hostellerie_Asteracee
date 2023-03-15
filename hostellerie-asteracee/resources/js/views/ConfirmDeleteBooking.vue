<template>
    <div class="z-10 flex flex-col items-center justify-center grow">
        <h1>Confirm delete booking?</h1>
        <button @click="deleteBooking">Yes</button>
        <button @click="cancel">No</button>
    </div>
</template>

<script>
import axiosProvider from '../services/axiosConfigProvider';

export default {
    name: 'ConfirmDeleteBooking',
    components:{
    },
    async created(){
        this.bookingId=this.$route.query.bookingId;
    },
    methods:{
        async deleteBooking(){
            this.deleteBooking = await axiosProvider.postWithOutAuth('/deleteBookings/'+this.bookingId);
            if(this.deleteBooking.status == 200){

            this.$router.push({name:'UserBookingsView'})
            }

        },
        cancel(){
            this.$router.push({name:'UserProfile'})
        }
    }
}
</script>

<style scoped>

</style>
