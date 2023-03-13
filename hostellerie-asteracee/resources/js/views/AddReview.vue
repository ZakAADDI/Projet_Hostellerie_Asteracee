<template>
         <div class="border-4 border-[#E6B34B] bg-[#272023] text-white flex flex-col justify-center items-center mt-6 mx-6 lg:w-1/2 lg:mx-auto grow">

        <h1>{{ $t("message.selectDate") }}</h1>
        <select name="date" id="date" v-model="bookingId" class="text-black">
            <option v-for="endedBooking in this.endedBookings" :value=endedBooking.booking_id>
                du {{ endedBooking.starting_date }} {{ $t("message.to") }} {{ endedBooking.ending_date }}</option>
        </select>
        <div v-if="warning">Merci de selectionner une date de réservation</div>
        <button @click="letReview" v-if="displayButton">{{ $t("message.next") }}</button>
        <button @click="returnUserProfil" v-if="displayButton">{{ $t("message.goBack") }}</button>
        <div v-if="formReview" >
            <form class="update flex flex-col justify-center items-center" @submit.prevent="publishReview">
                <label class="text-xl mt-3 text-white" for="newPassword">{{ $t("message.titleOfYourComm") }}</label>
                <input class="w-72 h-8 mx-auto text-black" name="title" type="text" v-model="title">
                <div class="error" v-if="titleEmtpy">
                    {{ $t("message.titleOfYourComm") }}
                </div>

                <label class="text-xl mt-3 text-white" for="bodyReview">{{ $t("message.yourComm") }}</label>
                <textarea class="w-72 h-32 mx-auto text-black" name="bodyReview" type="text" v-model="bodyReview"></textarea>
                <div class="error" v-if="bodyReviewEmpty">
                     {{ $t("message.enterYourComm") }}
                </div>
                <div>
                    <Stars @EmitValue="rate" />
                    <div v-if="selectStarEmpty">Merci de choisir une note entre 1 et 5</div>
                </div>

                <button type="submit" class="bg-[#E6B34B] h-12 w-56 mx-auto my-10 rounded-sm text-2xl font-bold">{{ $t("message.publish") }}</button>
            </form>
        </div>
    </div>
</template>

<script>
import axiosProvider from '../services/axiosConfigProvider'
import Stars from '../subComponents/Stars.vue'
export default {
    name: 'AddReview',
    data(){
        return{
            endedBookings: [],
            bookingId : '',
            formReview: false,
            title: "",
            starRate : 0,
            titleEmtpy: false,
            bodyReview: "",
            bodyReviewEmpty: false,
            warning : false,
            displayButton: true,
            selectStarEmpty: false
        }
    },
    components:{
        Stars
    },
    methods:{
        rate(value){
            this.starRate = value
        },
        returnUserProfil(){
            this.$router.push({name: 'UserProfile'});
        },
        confirmReview(){
            this.$router.push({name: 'ConfirmAddedReview'});

        },
        letReview(){
            this.warning = false;
            if(this.bookingId != ""){
                this.formReview = true;
                this.displayButton = false;
            }else{
                this.warning = true;
            }
        },
       async publishReview(){
            if(this.title == ""){
                this.titleEmtpy = true;
            }
            if(this.bodyReview == ""){
                this.bodyReviewEmtpy = true;
            }
            if(this.starRate == 0){
                this.selectStarEmpty = true; 
            }
            if(!this.titleEmtpy && !this.bodyReviewEmpty && !this.selectStarEmpty){
                this.datas =  {
                    booking_id : this.bookingId,
                    title : this.title,
                    content : this.bodyReview,
                    score: this.starRate
                }
            }
            this.response = (await axiosProvider.postWithOutAuth('/reviews', this.datas));
            this.$router.push({name: 'UserProfile'});
           
            
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


