<template>
         <div class="border-4 border-[#E6B34B] bg-[#272023] text-white flex flex-col justify-center items-center mt-6 mx-6 lg:w-1/2 lg:mx-auto grow">

        <h1>Choisir une date</h1>
        <select name="date" id="date" v-model="bookingId" class="text-black">
            <option v-for="endedBooking in this.endedBookings" :value=endedBooking.booking_id>
                du {{ endedBooking.starting_date }} au {{ endedBooking.ending_date }}</option>
        </select>
        <button @click="letReview">Continuer</button>
        <button @click="returnUserProfil">Retour</button>
        <div v-if="formReview" >
            <form class="update flex flex-col justify-center items-center" @submit.prevent="publishReview">
                <label class="text-xl mt-3 text-white" for="newPassword">Titre de votre Commentaire</label>
                <input class="w-72 h-8 mx-auto text-black" name="title" type="text" v-model="title">
                <div class="error" v-if="titleEmtpy">
                     Merci de saisir le titre de votre commentaire
                </div>

                <label class="text-xl mt-3 text-white" for="bodyReview">Votre commentaire</label>
                <textarea class="w-72 h-32 mx-auto text-black" name="bodyReview" type="text" v-model="bodyReview"></textarea>
                <div class="error" v-if="bodyReviewEmpty">
                     Merci de saisir votre commentaire
                    </div>
                <button type="submit" class="bg-[#E6B34B] h-12 w-56 mx-auto my-10 rounded-sm text-2xl font-bold">Publish</button>
            </form>
        </div>
    </div>
</template>

<script>
import axiosProvider from '../services/axiosConfigProvider'
export default {
    name: 'AddReview',
    data(){
        return{
            endedBookings: [],
            bookingId : '',
            formReview: false,
            title: "",
            titleEmtpy: false,
            bodyReview: "",
            bodyReviewEmpty: false,
        }
    },
    components:{

    },
    methods:{
        returnUserProfil(){
            this.$router.push({name: 'UserProfile'});
        },
        letReview(){
            this.formReview = true;
        },
        publishReview(){
            if(this.title == ""){
                this.titleEmtpy = true;
            }
            if(this.bodyReview == ""){
                this.bodyReviewEmtpy = true;
            }
            if(!this.titleEmtpy && !this.bodyReviewEmpty){
                this.datas =  {
                    bookingId : this.bookingId,
                    reviewTitle : this.title,
                    reviewbody : this.bodyReview
                }
            }
            // AXIOS TODO
        }
    },
    async created(){
        this.userInfo =  await axiosProvider.get('/user/info');
        this.body =
        {
            "userId": this.userInfo.data.id
        }
        this.bookings = (await axiosProvider.postWithOutAuth('/findUserBookings',this.body))?.data;
        this.endedBookings = [];
        this.bookings.forEach(booking => {
            if(booking.status === 'ended'){
                this.endedBookings.push(booking);
            }
        });
    }
}
</script>

<style scoped>

</style>
