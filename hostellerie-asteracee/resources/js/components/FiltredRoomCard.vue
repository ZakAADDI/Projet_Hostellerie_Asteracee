<template>
    <div class="filtredRoomsCard border-4 border-[#E6B34B] w-2/3 p-6 flex flex-col items-center bg-[#272023] text-white shadow-md shadow-gray-400 m-8 transform transition duration-500 hover:scale-110">
        <p>{{ roomName }}</p>
        <img class="" style="width:80px" src="../assets/images/LogoSVG.svg" alt="logo de l'hostellerie">
        <p>{{ roomDescription }}</p>
        <img class="border-4 border-[#E6B34B] shadow-md shadow-gray-200" :src=roomImage :alt=roomAlt>
        <p>Prix : {{ roomPrice }} € /nuit/pers.</p>
        <div class="flex justify-between">
           <span v-for="prestation in roomPrestations" :key=prestation.id >
            <img :src=prestation.media_url alt="" class="fill-white">
        </span>
        </div>

        <button type="submit" class="bg-[#E6B34B] p-2 rounded-md text-[#272023]" @click="addToCart">Réserver</button>
    </div>
</template>

<script>
import localStorage from '../services/localStorageProvider'
export default {
    name: 'FiltredRoomCard',
    props: {
        roomName: String,
        roomDescription: String,
        roomPrestation: Object,
        roomImage: String,
        roomAlt: String,
        roomPrice: Number,
        roomPrestations: Object,
        roomNumber: Number,
        roomId: Number
    },
    data(){
        return{
            prestation: Object
        }
    },
    methods:{
        addToCart: function(){
            localStorage.set("cartRoom", {"roomId" : this.roomId});
            this.$router.push({ name: 'SelectOptions'});

        }
    }
}
</script>

<style scoped>
.filtredRoomsCard{
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
