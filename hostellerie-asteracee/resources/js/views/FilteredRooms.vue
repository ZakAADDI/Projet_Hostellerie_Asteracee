<template>
    <div class="filteredRooms flex flex-col items-center grow mt-28 lg:mt-0">
        <span class="lg:mt-28">Etape 2 : Sélection de votre chambre </span>
        <div class="flex mb-6 w-screen justify-center items-center">
            <div class="cercleOk"></div>
                <div class="smCercleOk"></div>
                <div class="smCercleOk"></div>
                <div class="smCercleOk"></div>
            <div class="cercle"></div>
                <div class="smCercle"></div>
                <div class="smCercle"></div>
                <div class="smCercle"></div>
            <div class="cercle"></div>
                <div class="smCercle"></div>
                <div class="smCercle"></div>
                <div class="smCercle"></div>
            <div class="cercle"></div>
                <div class="smCercle"></div>
                <div class="smCercle"></div>
                <div class="smCercle"></div>
            <div class="cercle"></div>
        </div>
        <div class="bg-[#272023] text-white border-t-4 border-t-[#E6B34B] flex flex-col items-center p-6 justify-center">
        <span class="text-[#E6B34B] text-2xl">Votre réservation : </span>
            <span> Du {{ this.userChoice.startingDate}} au {{ this.userChoice.endingDate}} pour {{ this.userChoice.occupants }} pers.</span>
        </div>
        <button class="mt-4 bg-red-500 p-2 rounded-md text-[#272023] mb-6" @click="removeData">Annuler ma recherche</button>
        <div class="flex flex-col justify-center items-center lg:flex-row lg:flex-wrap" v-for="room in rooms" :key=room.id>
            <Card
            :title="room.room_type.name"
            :image="room.room_type.media_url"
            :alt="room.room_type.media_alt"
            :price="room.room_type.price"
            :showPrice="true"
            :description="room.room_type.description"
            :showButton="true"
            :roomNumber="room.number"
            :roomPrestations="room.prestations"
            :roomId="room.room_id"
            class="inline md:hidden mb-20"
            />
            <FilteredRoomCard
            :roomName="room.room_type.name"
            :roomNumber="room.number"
            :roomPrestations="room.prestations"
            :roomDescription="room.room_type.description"
            :roomImage="room.room_type.media_url"
            :roomAlt="room.room_type.media_alt"
            :roomPrice="room.room_type.price"
            :roomId="room.room_id"
            class="hidden md:flex" />
        </div>
    </div>
</template>

<script>
import FilteredRoomCard from '../components/FilteredRoomCard.vue'
import localStorage from '../services/localStorageProvider'
import axiosProvider from '../services/axiosConfigProvider'
import Card from '../components/Card.vue'
export default {
    name: 'FilteredRooms',
    data(){
        return{
            rooms:[]
        }
    },
    components:{
        FilteredRoomCard,
        Card
    },
    async created(){
        this.userChoice = localStorage.get("userChoice");
        this.parameters = [
            this.userChoice.startingDate,
            this.userChoice.endingDate
        ]

        this.rooms = (await axiosProvider.getWithParameters('/rooms',this.parameters))?.data;
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
.filteredRooms{
    animation: fadein ease-in-out 1s;
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
