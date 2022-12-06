<template>
    <div class="filteredRoomsCard border-4 border-[#E6B34B] w-2/3 p-6 flex flex-row grow bg-[#272023] text-white shadow-md shadow-gray-400 m-8 transform transition duration-500 hover:scale-110 lg:w-4/6">
        <div class="flex flex-col justify-center items-center sm:mx-auto">
            <p>{{ roomName }}</p>
            <img style="width:40px" src="../assets/images/LogoSVG.svg" alt="logo de l'hostellerie">
            <p class="text-center">{{ roomDescription }}</p>
        </div>
        <div>
            <img class="border-4 border-[#E6B34B] shadow-md shadow-gray-200 mx-auto w-1/2" :src=roomImage :alt=roomAlt>
        </div>
        <div class="flex flex-col justify-center items-center">
            <p class="mt-2">Prix : {{ roomPrice }} € /nuit/pers.</p>
            <div class="flex justify-between">
               <span v-for="prestation in roomPrestations" :key=prestation.id >
                <img :src=prestation.media_url :alt=prestation.media_alt class="fill-white">
            </span>
            </div>
            <button type="submit" class="bg-[#E6B34B] p-2 mt-2 rounded-md text-[#272023]" @click="addToCart">Réserver</button>
        </div>

    </div>
</template>

<script>
import localStorage from '../services/localStorageProvider'
export default {
    name: 'FilteredRoomCard',
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
            localStorage.set(
                "cartRoom",
                    {
                        "roomId" : this.roomId,
                        "roomName" : this.roomName,
                        "roomDescription" : this.roomDescription,
                        "roomPrestations" : this.roomPrestations,
                        "roomImage" : this.roomImage,
                        "roomAlt" : this.roomAlt,
                        "roomPrice" : this.roomPrice,
                        "roomNumber" : this.roomNumber,
                    }
                );
            this.$router.push({ name: 'SelectOptions'});

        }
    }
}
</script>

<style scoped>
.filteredRoomsCard{
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
