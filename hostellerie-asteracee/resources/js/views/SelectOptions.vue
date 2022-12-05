<template>
<div class="flex flex-col grow">

     <div class="bg-[#272023] text-white border-t-4 border-t-[#E6B34B] flex flex-col items-center p-6 justify-center w-1/2 mx-auto">
    <span class="text-[#E6B34B] text-2xl">Votre réservation : </span>
            <span> Du {{ this.userChoice.startingDate}} au {{ this.userChoice.endingDate}} pour {{ this.userChoice.occupants }} pers.</span>
    </div>
    <span class="border-4 border-[#E6B34B] bg-[#272023] text-white flex flex-col justify-center items-center">
        <span class="text-[#E6B34B] text-2xl">Votre chambre : </span>
        <p>{{ roomName }}</p>
        <p>{{ roomDescription }}</p>
        <img class="border-4 border-[#E6B34B] shadow-md shadow-gray-200" :src=roomImage :alt=roomAlt>
        <p>Prix : {{ roomPrice }} € /nuit/pers.</p>
        <div class="flex justify-between">
           <span v-for="prestation in roomPrestations" :key=prestation.id >
            <img :src=prestation.media_url alt="" class="fill-white">
        </span>
        </div>
    </span>

    <div class="options flex flex-col items-center justify-center mx-auto grow border-4 border-[#E6B34B] bg-[#272023] text-white shadow-md shadow-gray-400 w-2/3">
    <span class="text-[#E6B34B] text-2xl">Vos options : </span>
        <h1 class="mb-4">Choisissez les options de votre séjour</h1>

        <form @submit.prevent="submitForm">
            <div class="flex flex-col justify-between" v-for="option in options" v-bind:key=option.id>
                <div class="flex justify-arround items-center">
                    <input type="checkbox" :id="option.id" :value="option.id" v-model="selectedOption" >
                    <label :for="option.id">{{ option.name }}</label>
                </div>

                <span>{{ option.description }}</span>
                <div class="flex">
                    <span>Prix {{ option.price }} €
                        <p v-if="option.type === 'daily'">/jour</p>
                        <p v-if="option.type === 'weekly'">/semaine</p>
                        <p v-if="option.type === 'stay'">/sejour</p>
                    </span>
                </div>

            </div>
            <div class="flex flex-col m-4">
                <button type="submit" class="bg-[#E6B34B] p-2 rounded-md text-[#272023] mb-4">Enregistrer mes options</button>
                <button type="submit" class="bg-red-500 p-2 rounded-md text-[#272023]" @click="removeData">Annuler</button>
            </div>

        </form>
    </div>
</div>
</template>

<script>
import axiosProvider from '../services/axiosConfigProvider'
import localStorage from '../services/localStorageProvider'
export default {
    name: 'SelectOptions',
    component:{
    },
    data(){
        return{
            options:[],
            cart: [],
            userChoice:[],
            userRoom: [],
            roomName: String,
            roomNumber: Number,
            roomPrestations: Object,
            roomDescription: String,
            roomImage : String,
            roomAlt: String,
            roomId: Number,
            roomPrice: Number,
            userOptions:[],
            selectedOption: []
        }
    },
    async created(){
         this.options = (await axiosProvider.get('/options'))?.data;
         this.userChoice = localStorage.get("userChoice");
         this.cartRoom = localStorage.get("cartRoom");
         this.userRoom = (await axiosProvider.get('/rooms/'+ this.cartRoom.roomId))?.data;
         this.roomName = this.userRoom.room_type.name
         this.roomNumber = this.userRoom.roomNumber
         this.roomPrestations = this.userRoom.prestations
         this.roomDescription = this.userRoom.room_type.description
         this.roomImage = this.userRoom.room_type.media_url
         this.roomAlt = this.userRoom.room_type.media_alt
         this.roomPrice = this.userRoom.room_type.price
         this.roomId = this.userRoom.room_id
    },
    methods:{
        submitForm(){
            this.userOptions= [];
            this.options.forEach(element => {
                if(document.getElementById(element.id).checked){
                    this.userOptions.push(element)
                }
            });
            localStorage.set("cartOptions",{"options":this.userOptions})
            this.$router.push({name:'ConfirmUserIdentity'})

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

    }
}
</script>

<style scoped>
.options{
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
