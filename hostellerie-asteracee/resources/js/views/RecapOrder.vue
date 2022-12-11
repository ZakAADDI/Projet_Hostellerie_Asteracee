<template>
    <div class="recapOrder flex flex-col grow mt-28 lg:mt-0">
        <span v-if="language" class="text-center lg:mt-28">Etape 5 : Récapitulatif de réservation</span>
        <span v-if="!language" class="text-center lg:mt-28">Set 5 : Booking summary</span>
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
        <span v-if="language" class="text-[#E6B34B] text-2xl">Récapitulatif de votre réservation :</span>
        <span v-if="!language" class="text-[#E6B34B] text-2xl">Booking summary :</span>
        </div>
        <div class="confirmUserIdentity flex flex-col grow">
        <div class="border-4 border-[#E6B34B] bg-[#272023] text-white flex flex-col justify-center items-center mt-6 mx-6 lg:w-1/3 lg:mx-auto">
            <span v-if="language" class="text-[#E6B34B] text-2xl">Votre séjour :</span>
            <span v-if="!language" class="text-[#E6B34B] text-2xl">Your stay :</span>
            <span v-if="language">Du {{ userChoice.startingDate }} au {{ userChoice.endingDate }}</span>
            <span v-if="!language">From {{ userChoice.startingDate }} to {{ userChoice.endingDate }}</span>
            <span v-if="language">soit {{ userChoice.nbrOfDays }} jours</span>
            <span v-if="!language">i.e {{ userChoice.nbrOfDays }} days</span>
            <span v-if="language">Pour {{ userChoice.occupants }} pers.</span>
            <span v-if="!language">For {{ userChoice.occupants }} pers.</span>
            <span v-if="language" class="text-2xl">soit {{ total_room_price }} € ttc.</span>
            <span v-if="!language" class="text-2xl">i.e {{ total_room_price }} € ati.</span>
        </div>
        <div class="border-4 border-[#E6B34B] bg-[#272023] text-white flex flex-col justify-center items-center mt-6 mx-6 lg:w-1/3 lg:mx-auto">
            <span v-if="language" class="text-[#E6B34B] text-2xl">Votre chambre :</span>
            <span v-if="!language" class="text-[#E6B34B] text-2xl">Your room :</span>
            <span>{{ cartRoom.roomName}}</span>
            <span v-if="language">Prix : {{ cartRoom.roomPrice}} €/nuits/pers</span>
            <span v-if="!language">Price : {{ cartRoom.roomPrice}} €/nights/pers</span>
        </div>

        <div class="border-4 border-[#E6B34B] bg-[#272023] text-white flex flex-col justify-center items-center mt-6 mx-6 lg:w-1/3 lg:mx-auto">
            <span v-if="language" class="text-[#E6B34B] text-2xl">Vos options :</span>
            <span v-if="!language" class="text-[#E6B34B] text-2xl">Your options :</span>
            <div class="flex flex-col items-center">
                <div v-for="option in options" :key=option.id>
                    <span>- {{ option.name }}</span>
                    <span> - {{ option.price }} €
                            <span v-if="option.type === 'daily' && language">/pers/jour</span>
                            <span v-if="option.type === 'daily' && !language">/pers/day</span>
                            <span v-if="option.type === 'weekly' && language">/semaine</span>
                            <span v-if="option.type === 'weekly' && !language">/week</span>
                            <span v-if="option.type === 'stay' && language">/sejour</span>
                            <span v-if="option.type === 'stay' && !language">/stay</span>

                    </span>

                </div>
                <span v-if="language" class="text-2xl">soit {{ total_options_price }} € ttc.</span>
                <span v-if="!language" class="text-2xl">i.e {{ total_options_price }} € ati.</span>
            </div>
        </div>

        <div class="border-4 border-[#E6B34B] bg-[#272023] text-white flex flex-col justify-center items-center mt-6 mx-6 lg:w-1/3 lg:mx-auto">
            <span v-if="language" class="text-[#E6B34B] text-2xl">Vos informations :</span>
            <span v-if="!language" class="text-[#E6B34B] text-2xl">Your id informations :</span>
            <span v-if="language" >Civilité : {{ currentUser.gender}}</span>
            <span v-if="!language" >Civility : {{ currentUser.gender}}</span>
            <span v-if="language" >Nom : {{ currentUser.lastname}}</span>
            <span v-if="!language" >Lastname : {{ currentUser.lastname}}</span>
            <span v-if="language" >Prénom : {{ currentUser.firstname}}</span>
            <span v-if="!language" >Firstname : {{ currentUser.firstname}}</span>
            <span v-if="language" >Adresse : {{ currentUser.address }}</span>
            <span v-if="!language" >Address : {{ currentUser.address }}</span>
            <span >Email : {{ currentUser.email }}</span>
        </div>
        <div class="border-4 border-[#E6B34B] bg-[#272023] text-white flex flex-col justify-center items-center mt-6 mb-6 pb-2 mx-6 lg:w-1/3 lg:mx-auto">
            <span v-if="language" class="text-[#E6B34B] text-2xl">Montant total de votre séjour</span>
            <span v-if="!language" class="text-[#E6B34B] text-2xl">Total amount for you stay</span>
            <span class="text-3xl">{{this.total_roomOptions }} €</span>

        </div>
        <div class="flex justify-center items-center">
            <button v-if="language" class="bg-[#E6B34B] p-4 rounded-md text-[#272023] mx-6" @click="submitBooking">Réserver</button>
            <button v-if="!language" class="bg-[#E6B34B] p-4 rounded-md text-[#272023] mx-6" @click="submitBooking">Book now</button>
            <button v-if="language" type="submit" class="bg-red-500 p-4 rounded-md text-[#272023] mx-6 my-4" @click="removeData">Annuler</button>
            <button v-if="!language" type="submit" class="bg-red-500 p-4 rounded-md text-[#272023] mx-6 my-4" @click="removeData">Cancel</button>
        </div>

    </div>
    </div>
</template>

<script>
import localStorage from '../services/localStorageProvider'
import axiosProvider from '../services/axiosConfigProvider'
import emailjs from '@emailjs/browser';

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
        this.userToken = localStorage.get("user")[1];
        this.body =
            {
                "token":this.userToken
            }
        this.currentUser = (await axiosProvider.postWithOutAuth('/findUser',this.body))?.data;
        this.services = (await axiosProvider.get('/services'))?.data;
            this.service1 = this.services[0];
            this.service2 = this.services[1];
            this.service3 = this.services[2];

    },
     data(){
        return{
            total_roomOptions: Number,
            room_occupantsDays: Number,
            total_room_price: Number,
            userChoice: Object,
            cartRoom: Object,
            cartOptions: Object,
            currentUser : Object,
            options: Object,
            services: Object,
            civility : '',
            language: '',
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
        submitBooking(e){
            this.language = localStorage.get("language");
            if(this.currentUser.gender === "male" && this.language == "fr"){
                this.civility = "Monsieur"
            }
            if(this.currentUser.gender === "male" && this.language == "en"){
                this.civility = "Sir"
            }
            if(this.currentUser.gender === "female" && this.language == "fr"){
                this.civility = "Madame"
            }
            if(this.currentUser.gender === "female" && this.language == "en"){
                this.civility = "Miss"
            }
            this.body = {
                    gender: this.civility,
                    firstname: this.currentUser.firstname,
                    lastname: this.currentUser.lastname,
                    startingDate: this.userChoice.startingDate,
                    endingDate: this.userChoice.endingDate,
                    nbrOfDays: this.userChoice.nbrOfDays,
                    occupants: this.userChoice.occupants,
                    roomName: this.cartRoom.roomName,
                    roomDescription: this.cartRoom.roomDescription,
                    roomPrice: this.cartRoom.roomPrice,
                    service1Name : this.service1.title,
                    service1Content : this.service1.content,
                    service2Name : this.service2.title,
                    service2Content : this.service2.content,
                    service3Name : this.service3.title,
                    service3Content : this.service3.content,
                };

                if(this.language == "fr"){
                    this.response = emailjs.send('service_221d5yz', 'template_uym8zdc', this.body, 'bbyfEd_o77jz3eSoT')
                }
                if(this.language == "en"){
                    this.response = emailjs.send('service_2xuxogk', 'template_q5sj1a8', this.body, '7EV5cfIjJKZzqpYhk')
                }
                this.$router.push({ name : 'ConfirmOrder'});
            },
        async submitBooking(){
            this.body={
                ending_date : this.userChoice.endingDate,
                starting_date : this.userChoice.startingDate,
                total_price : this.total_room_price,
                room_id : this.cartRoom.roomId,
                user_id : 1
            };
            this.newBooking = (await axiosProvider.postWithAuth('/bookings',this.body));
            if(this.newBooking.status == 200){
                this.options=this.cartOptions.options;
                if(this.options.length>0){
                    this.options.forEach(option => {
                        this.optionToStore = {
                            'booking_id': this.newBooking.data.booking_id,
                            'option_id': option.id
                        };
                        this.optionToSave = (axiosProvider.postWithAuth('/bookingOptions', this.optionToStore));
                     });
                }
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
