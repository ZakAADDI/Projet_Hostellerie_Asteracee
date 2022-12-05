<template>
    <div class="filtredRooms flex flex-col items-center mt-16 grow">
        <div class="bg-[#272023] text-white border-t-4 border-t-[#E6B34B] flex flex-col items-center p-6 justify-center">
        <span class="text-[#E6B34B] text-2xl">Votre réservation : </span>
            <span> Du {{ this.userChoice.startingDate}} au {{ this.userChoice.endingDate}} pour {{ this.userChoice.occupants }} pers.</span>
        </div>
        <button class="mt-4 bg-red-500 p-2 rounded-md text-[#272023]" @click="removeData">Annuler ma recherche</button>
        <div class="flex flex-col justify-center items-center" v-for="room in rooms" :key=room.id>
            <FiltredRoomCard
            :roomName="room.room_type.name"
            :roomNumber="room.number"
            :roomPrestations="room.prestations"
            :roomDescription="room.room_type.description"
            :roomImage="room.room_type.media_url"
            :roomAlt="room.room_type.media_alt"
            :roomPrice="room.room_type.price"
            :roomId="room.room_id" />
        </div>


    </div>
</template>

<script>
import FiltredRoomCard from '../components/FiltredRoomCard.vue'
import localStorage from '../services/localStorageProvider'
import axiosProvider from '../services/axiosConfigProvider'

export default {
    name: 'FiltredRooms',
    data(){
        return{
            rooms:[]
        }
    },
    components:{
        FiltredRoomCard
    },
    async created(){
        this.userChoice = localStorage.get("userChoice");
        this.parameters = [
            this.userChoice.startingDate,
            this.userChoice.endingDate
        ]

        this.rooms = (await axiosProvider.getWithParameters('/rooms',this.parameters))?.data;
        console.log(this.rooms);
    },
    methods:{
        removeData(event){
            event.preventDefault;
            localStorage.unset("userChoice");
            localStorage.unset("cartRoom");
            this.$router.push({ name: 'Home'});
        }
    }
}
</script>

<style scoped>
.filtredRooms{
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
