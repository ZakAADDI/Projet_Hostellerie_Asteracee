<template>
    <div class="filtredRooms flex flex-col items-center mt-16 grow">
        <div class="bg-[#272023] text-white border-t-4 border-t-[#E6B34B] flex flex-col items-center p-6">
        <span>Je suis le résultat du Banner de Chambres Filtrées pour les dates du : </span>
            <span> {{ this.userChoice.startingDate}} au {{ this.userChoice.endingDate}} pour {{ this.userChoice.occupants }} pers.</span>
        </div>
        <FiltredRoomCard />
        <FiltredRoomCard />
        <FiltredRoomCard />
        <FiltredRoomCard />
        <FiltredRoomCard />

    </div>
</template>

<script>
import FiltredRoomCard from '../components/FiltredRoomCard.vue'
import localStorage from '../services/localStorageProvider'

export default {
    name: 'FiltredRooms',
    components:{
        FiltredRoomCard
    },
    async created(){
        this.userChoice = localStorage.get("userChoice");
        console.log(this.userChoice);
    }
}
</script>

<style scoped>
.filtredRooms{
    height: 50vh;
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
