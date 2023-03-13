<template>

    <div class="updateBooking bg-[#272023] w-11/12 mx-auto border-4 border-[#E6B34B] z-10 my-6 grow">

        <form @submit.prevent="updateBooking" class="flex flex-col">
            <h1 class="text-xl mt-3 ml-3 text-white">Booking n° {{ this.booking.booking_id }}</h1>
            <div class="flex flex-col justify-center items-center">
            <label class="text-xl mt-3 text-white" for="starting_date" v-if="language">Date de début</label>
            <label class="text-xl mt-3 text-white" for="starting_date" v-if="!language">Starting Date</label>
            <input class="w-72 h-8 mx-auto text-black" name="lastname" type="date" v-model="starting_date" :v-html=this.starting_date>

            </div>

            <div class="flex flex-col justify-center items-center mb-6">
            <label class="text-xl mt-3 text-white" for="ending_date" v-if="language">Date de fin</label>
            <label class="text-xl mt-3 text-white" for="ending_date" v-if="!language">Ending Date</label>
            <input class="w-72 h-8 mx-auto text-black" name="lastname" type="date" v-model="ending_date" :v-html=this.ending_date>
            </div>

            <div class="flex flex-col justify-center items-center mb-6">
                <h1 class="text-xl text-center my-3 text-white">Room type</h1>
                <img class="mx-auto w-[150px]" :src=roomImg alt="">
                <p class="text-white mx-auto text-center my-8 w-1/2">{{ roomDesc }}</p>

                <button class="bg-[#E6B34B] h-18 w-56 mx-auto my-4 rounded-sm text-xl font-bold" @click="changeRoomType">Changer mon type de chambre</button>
            </div>

            <div v-if="formRoomChanging">
                <h1 class="text-xl text-center mb-8 text-white">Formulaire de changement de type de chambre</h1>
                <div class="flex flex-row justify-center items-center">
                    <button class="bg-[#E6B34B] h-18 w-56 mx-auto my-4 rounded-sm text-xl font-bold">Chambre de luxe</button>
                    <button class="bg-[#E6B34B] h-18 w-56 mx-auto my-4 rounded-sm text-xl font-bold">Suite</button>
                    <button class="bg-[#E6B34B] h-18 w-56 mx-auto my-4 rounded-sm text-xl font-bold">Chambre Classique</button>
                </div>

            </div>


            <div class="flex flex-col justify-center items-center" v-for="option in this.options" v-bind:key=option.id>
                <div class="flex justify-arround items-center">
                    <input type="checkbox" :id="option.id" :value="option.id" v-model="userOptions" class="mr-2">
                    <label :for="option.id" class="font-bold text-white">{{ option.name }}</label>
                </div>

                <span class="text-white">{{ option.description }}</span>
                <div class="flex flex-row">
                    <span v-if="language" class="flex flex-row font-bold text-white">Prix {{ option.price }} €
                        <p v-if="option.type === 'daily'">/pers/jour</p>
                        <p v-if="option.type === 'weekly'">/semaine</p>
                        <p v-if="option.type === 'stay'">/sejour</p>
                    </span>
                    <span v-if="!language" class="flex flex-row font-bold text-white">Price {{ option.price }} €
                        <p v-if="option.type === 'daily'">/pers/day</p>
                        <p v-if="option.type === 'weekly'">/week</p>
                        <p v-if="option.type === 'stay'">/stay</p>
                    </span>
                </div>

            </div>

            <button type="submit" class="bg-[#E6B34B] h-12 w-56 mx-auto mt-10 mb-2 rounded-sm text-2xl font-bold" @click="updateBooking">Update</button>
            <button class="bg-red-500 h-12 w-56 mx-auto mb-10 rounded-sm text-2xl font-bold">Cancel my booking</button>

        </form>

</div>
</template>

<script>
import { tsImportEqualsDeclaration } from '@babel/types';
import axiosProvider from '../services/axiosConfigProvider';
import localStorage from "../services/localStorageProvider"


export default {
    name: 'UpdateBooking',
    components: {
    },
    data() {
        return {
            booking: Object,
            starting_date: '',
            ending_date: '',
            options : [],
            userOptions:[],
            roomImg: String,
            roomDesc: String,
            formRoomChanging: false
        }
    },
    async created(){
        this.bookingId=this.$route.query.bookingId;
        this.booking = (await axiosProvider.get('/bookings/'+this.bookingId)).data;
        this.starting_date = this.booking.starting_date
        this.ending_date = this.booking.ending_date
        this.roomImg = this.booking.room.room_type.media_url;
        this.roomDesc = this.booking.room.room_type.description;
        this.userOptions = this.booking.options.map(userOption => userOption.id);
        this.options = (await axiosProvider.get('/options'))?.data;

    },
    methods: {
        updateBooking() {
            this.data = {
                'options' : this.userOptions,
                'starting_date' : this.starting_date,
                'ending_date': this.ending_date
            };
            console.log(this.data);
            // this.newBooking = axiosProvider.patch('/bookings/'+this.bookingId);

        },
        changeRoomType(){
            this.formRoomChanging = true
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
.updateBooking {
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
