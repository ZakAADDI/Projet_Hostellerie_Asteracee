<template>

    <div v-if="!localStorageExists" class="flex flex-col justify-center align-center grow mt-28 lg:mt-24">
        <span class="text-center mb-6">Votre réservation est terminée</span>
        <button class="bg-[#E6B34B] p-4 rounded-md text-[#272023] mx-auto w-1/5">
            <router-link :to="{name:'Home'}">
                Accueil
            </router-link>
        </button>
    </div>
    <div v-if="localStorageExists" class="recapOrder flex flex-col grow mt-28 lg:mt-0">
        <span v-if="language" class="text-center lg:mt-28">Etape 5 : Récapitulatif de réservation</span>
        <span v-if="!language" class="text-center lg:mt-28">Set 5 : Booking summary</span>

    <div class="recapOrder flex flex-col grow mt-28 lg:mt-0">
        <span class="text-center lg:mt-28">{{ $t("message.step5") }}</span>
        <div class="flex mb-6 w-screen justify-center items-center">
            <div class="cercleOk"></div>
                <div class="smCercleOk"></div>
                <div class="smCercleOk"></div>
                <div class="smCercleOk"></div>
            <div class="cercleOk"></div>
                <div class="smCercleOk"></div>
                <div class="smCercleOk"></div>
                <div class="smCercleOk"></div>
            <div class="cercleOk"></div>
                <div class="smCercleOk"></div>
                <div class="smCercleOk"></div>
                <div class="smCercleOk"></div>
            <div class="cercleOk"></div>
                <div class="smCercleOk"></div>
                <div class="smCercleOk"></div>
                <div class="smCercleOk"></div>
            <div class="cercle"></div>
        </div>
        <div class="bg-[#272023] text-white flex flex-col justify-center items-center mx-6 text-center  lg:justify-end lg:w-1/3 lg:mx-auto lg:pb-6 p-2 border-t-4 border-t-[#E6B34B]">
        <span class="text-[#E6B34B] text-2xl">{{ $t("message.bookingSummary") }} :</span>
        </div>
        <div class="confirmUserIdentity flex flex-col grow">
        <div class="border-4 border-[#E6B34B] bg-[#272023] text-white flex flex-col justify-center items-center mt-6 mx-6 lg:w-1/3 lg:mx-auto">
            <span  class="text-[#E6B34B] text-2xl">{{ $t("message.yourStay") }} :</span>
            <span >{{ $t("message.from") }} {{ userChoice.startingDate }} {{ $t("message.to") }} {{ userChoice.endingDate }}</span>
            <span >{{ $t("message.ie") }} {{ userChoice.nbrOfDays }} {{ $t("message.days") }}</span>
            <span >{{ $t("message.for") }} {{ userChoice.occupants }} {{ $t("message.pers") }}</span>
            <span class="text-2xl">{{ $t("message.ie") }} {{ total_room_price }} € {{ $t("message.ati") }}</span>
        </div>
        <div class="border-4 border-[#E6B34B] bg-[#272023] text-white flex flex-col justify-center items-center mt-6 mx-6 lg:w-1/3 lg:mx-auto">
            <span  class="text-[#E6B34B] text-2xl">{{ $t("message.yourRoom") }} :</span>
            <span>{{ cartRoom.roomName}}</span>
            <span >{{ $t("message.price") }} : {{ cartRoom.roomPrice}} {{ $t("message.pricePerNightPerPers") }}</span>
        </div>

        <div class="border-4 border-[#E6B34B] bg-[#272023] text-white flex flex-col justify-center items-center mt-6 mx-6 lg:w-1/3 lg:mx-auto">
            <span  class="text-[#E6B34B] text-2xl">{{ $t("message.yourOptions") }} :</span>
            <div class="flex flex-col items-center">
                <div v-for="option in options" :key=option.id>
                    <span>- {{ option.name }}</span>
                    <span> - {{ option.price }} €
                            <span v-if="option.type === 'daily'">{{ $t("message.perPersPerDay") }}</span>
                            <span v-if="option.type === 'weekly' ">{{ $t("message.perWeek") }}</span>
                            <span v-if="option.type === 'stay' ">{{ $t("message.perStay") }}</span>
                    </span>
                </div>
                <span class="text-2xl">{{ $t("message.ie") }} {{ total_options_price }} € {{ $t("message.ati") }}</span>
            </div>
        </div>

        <div class="border-4 border-[#E6B34B] bg-[#272023] text-white flex flex-col justify-center items-center mt-6 mx-6 lg:w-1/3 lg:mx-auto">
            <span  class="text-[#E6B34B] text-2xl">{{ $t("message.yourInfo") }} :</span>
            <span  >{{ $t("message.civility") }} : {{ user.gender}}</span>
            <span  >{{ $t("message.lname") }} : {{ user.lastname}}</span>
            <span  >{{ $t("message.fname") }} : {{ user.firstname}}</span>
            <span  >{{ $t("message.address") }} : {{ user.address }}</span>
            <span >Email : {{ user.email }}</span>
        </div>
        <div class="border-4 border-[#E6B34B] bg-[#272023] text-white flex flex-col justify-center items-center mt-6 mb-6 pb-2 mx-6 lg:w-1/3 lg:mx-auto">
            <span  class="text-[#E6B34B] text-2xl">{{ $t("message.totalAmountStay") }}</span>
            <span class="text-3xl">{{this.total_roomOptions }} €</span>

        </div>
        <div class="flex justify-center items-center">
            <button class="bg-[#E6B34B] p-4 rounded-md text-[#272023] mx-6" @click="submitBooking">{{ $t("message.bookNow") }}</button>
            <button type="submit" class="bg-red-500 p-4 rounded-md text-[#272023] mx-6 my-4" @click="removeData">{{ $t("message.cancel") }}</button>
        </div>

    </div>
    </div>
</template>

<script>
import localStorage from '../services/localStorageProvider'
import axiosProvider from '../services/axiosConfigProvider'

export default {
    name: 'RecapOrder',
    components:{
    },
      async created(){
        this.userChoice = localStorage.get("userChoice");
        this.cartRoom = localStorage.get("cartRoom");
        this.cartOptions = localStorage.get("cartOptions");
        this.total_room_price = localStorage.get("total_room_price");
        this.total_options_price = localStorage.get("total_options_price");
        this.total_roomOptions = this.total_room_price + this.total_options_price;
        this.options = this.cartOptions.options;
        this.userDatas =  await axiosProvider.get('/user/info');
        this.user = this.userDatas.data;
        this.services = (await axiosProvider.get('/services'))?.data;
            this.service1 = this.services[0];
            this.service2 = this.services[1];
            this.service3 = this.services[2];
        this.optionsID = localStorage.get("optionsID");

    },
     data(){
        return{
            total_roomOptions: Number,
            room_occupantsDays: Number,
            total_room_price: Number,
            userChoice: Object,
            cartRoom: Object,
            cartOptions: Object,
            user : Object,
            options: Object,
            services: Object,
            civility : '',
            gender: '',
            firstname:'',
            lastname:'',
            startingDate:'',
            endingDate:'',
            nbrOfDays:'',
            occupants:'',
            roomName:'',
            roomPrestations:'',
            roomDescription:'',
            roomPrice:'',
            service1Name:'',
            service1Content:'',
            service2Name:'',
            service2Content:'',
            service3Name:'',
            service3Content:''
        }
    },
    methods:{
        async submitBooking(){
             this.currentUser =  await axiosProvider.get('/user/info');
             this.user = this.currentUser.data;
            this.currentUser = this.currentUser.data.id;
            this.body={
                ending_date : this.userChoice.endingDate,
                starting_date : this.userChoice.startingDate,
                room_id : this.cartRoom.roomId,
                user_id : this.currentUser,
                options : this.optionsID,
                occupants: this.userChoice.occupants
            };
            this.newBooking = (await axiosProvider.postWithOutAuth('/bookings',this.body));
            if(this.newBooking.status == 200){
                this.options=this.cartOptions.options;
                if(this.options.length>0){
                    this.options.forEach(option => {
                        this.optionToStore = {
                            'booking_id': this.newBooking.data.booking_id,
                            'option_id': option.id
                        };
                        this.optionToSave = (axiosProvider.postWithOutAuth('/bookingOptions', this.optionToStore));
                     });
                }

            this.emailBody={
                'booking_id' : this.newBooking.data.booking_id,
                'user_id' : this.currentUser

            };
            this.email = (await axiosProvider.postWithOutAuth('/sendBookingRecap',this.emailBody))
                localStorage.unset("cartOptions");
                localStorage.unset("userChoice");
                localStorage.unset("cartRoom");
                localStorage.unset("total_room_price");
                localStorage.unset("total_options_price");
                localStorage.unset("optionsID");
                this.$router.push({ name : 'ConfirmOrder'});
            }else{
                this.$router.push({name:'SomethingWentWrong'});
            }
        },
        removeData(event){
            event.preventDefault;
            localStorage.unset("userChoice");
            localStorage.unset("cartRoom");
            localStorage.unset("cartOptions");
            this.$router.push({ name: 'Home'});
        }

    },
    computed:{
         language(){
            if(localStorage.get("language") == "fr"){
                return true;
             }else{
                 return false;
            }
        },
        localStorageExists(){
            if(localStorage.get("userChoice")){
                return true;
            }else{
                return false;
            }
        }
    }
}

</script>

<style scoped>
.cercle{
    margin-right: 10px;
    margin-left: 10px;
    height: 2rem;
    width: 20px;
    height: 20px;
    border-radius: 20px;
    background: #272023;
}
.cercleOk{
    margin-right: 10px;
    margin-left: 10px;
    height: 2rem;
    width: 20px;
    height: 20px;
    border-radius: 20px;
    background: #E6B34B;
}
.smCercle{
    margin-right: 5px;
    margin-left: 5px;
    height: 2rem;
    width: 5px;
    height: 5px;
    border-radius: 20px;
    background: #272023;
}
.smCercleOk{
    margin-right: 5px;
    margin-left: 5px;
    height: 2rem;
    width: 5px;
    height: 5px;
    border-radius: 20px;
    background: #E6B34B;
}
.recapOrder{
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
