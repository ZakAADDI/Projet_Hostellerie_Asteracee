<template>
     <form @submit.prevent="submitForm" class="bookingBanner bg-[#272023] shadow-md shadow-gray-700 flex flex-col justify-around items-center p-4 md:flex-row border-t-4 border-t-[#E6B34B] mx-auto mb-8 w-5/6">
        <span v-if="language" class="text-[#E6B34B] text-2xl mx-auto flex justify-center items-center text-center">Réserver Maintenant</span>
        <span v-if="!language" class="text-[#E6B34B] text-2xl mx-auto flex justify-center items-center text-center">Book Now</span>

        <div class="border-2 border-[#E6B34B] p-4 rounded-md text-white flex md:flex-col justify-between w-11/12 mb-2 md:mr-2 lg:flex-row lg:justify-center lg:items-baseline lg:w-1/4">
            <label v-if="language" class="text-center" for="startingDate">Arrivé le :</label>
            <label v-if="!language" class="text-center" for="startingDate">Starting date:</label>
        <input type="date" name="startingDate" min="2021-01-01" max="2023-12-31" class="text-[#272023] ml-2 bg-[#E6B34B] p-1" v-model="startingDate">
        </div>
        <div class="border-2 border-[#E6B34B] p-4 rounded-md text-white flex md:flex-col  justify-between w-11/12 mb-2 md:mr-2 lg:flex-row lg:justify-center lg:w-1/4 lg:items-baseline">
            <label v-if="language" class="text-center" for="endingDate">Départ le:</label>
            <label v-if="!language" class="text-center" for="endingDate">Ending date:</label>
        <input type="date" name="endingDate" min="2021-01-01" max="2023-12-31" class="text-[#272023] ml-2 bg-[#E6B34B] p-1" v-model="endingDate">
        </div>
        <div class="border-2 border-[#E6B34B] p-4 rounded-md text-white flex md:flex-col  justify-between w-11/12 mb-2 md:mr-2 lg:flex-row lg:justify-center lg:w-1/4 lg:items-baseline">
            <label class="text-center" for="occupants">Personnes :</label>
            <input type="number" name="occupants" min="1" max="10" class="text-[#272023] rounded-m ml-2 bg-[#E6B34B] text-center p-1" v-model="numberOccupants">
        </div>
        <div class="flex justify-center items-center">
            <button v-if="language" type="submit" class="bg-[#E6B34B] p-4 rounded-md text-[#272023]">Réserver</button>
            <button v-if="!language" type="submit" class="bg-[#E6B34B] p-4 rounded-md text-[#272023]">Book Now</button>
        </div>
    </form>
</template>

<script>
import localStorage from '../services/localStorageProvider'
export default {
    name: 'BookingBanner',
     data(){
         return{
            startingDate: "",
            endingDate: "",
            numberOccupants: ""
         }
     },
    methods:{
        submitForm :function(){
            let date1 = new Date(this.startingDate);
            let date2 = new Date(this.endingDate);
            let diff = date2.getTime() - date1.getTime();
            let days = Math.ceil(diff/(1000*3600*24));
            localStorage.set(
                "userChoice",
                    {
                        "startingDate" : this.startingDate,"endingDate" : this.endingDate,"occupants":this.numberOccupants,
                        "nbrOfDays": days
                    }
                );
            this.$router.push('FilteredRooms');
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
.bookingBanner{
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
