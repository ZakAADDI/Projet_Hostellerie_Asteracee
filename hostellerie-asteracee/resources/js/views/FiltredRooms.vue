<template>
    <div class="filtredRooms flex flex-col items-center mt-16 grow">
        <div class="bg-[#272023] text-white border-t-4 border-t-[#E6B34B] flex flex-col items-center p-6 flex flex-col justify-center items-center">
        <span>Je suis le résultat du Banner de Chambres Filtrées pour les dates du : </span>
            <span> {{ this.userChoice.startingDate}} au {{ this.userChoice.endingDate}} pour {{ this.userChoice.occupants }} pers.</span>
        </div>
        <div class="flex flex-col justify-center items-center" v-for="room in rooms" :key=room.id>
            <FiltredRoomCard
            :roomName="room.room_type.name"
            :roomNumber="room.number"
            :roomPrestations="room.prestations"
            :roomDescription="room.room_type.description"
            :roomImage="room.room_type.media_url"
            :roomAlt="room.room_type.media_alt"
            :roomPrice="room.room_type.price" />
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
        this.body = [
            {
                "starting_date": this.userChoice.startingDate,
                "ending_date":  this.userChoice.endingDate
            }
        ]
        this.rooms = (await axiosProvider.postWithOutAuth('/filteredRooms',this.body))?.data;
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
