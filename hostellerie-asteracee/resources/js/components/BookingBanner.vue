<template>
     <form @submit.prevent="submitForm" class="bookingForm shadow-md shadow-gray-700 flex justify-around items-center">
        <div class="border-2 border-[#E6B34B] p-4 rounded-md text-white">
            <label for="startingDate">Starting date:</label>
        <input type="date" name="startingDate" min="2021-01-01" max="2023-12-31" class="text-[#272023] ml-2" v-model="startingDate">
        </div>
        <div class="border-2 border-[#E6B34B] p-4 rounded-md text-white">
            <label for="endingDate">Ending date:</label>
        <input type="date" name="endingDate" min="2021-01-01" max="2023-12-31" class="text-[#272023] ml-2" v-model="endingDate">
        </div>
        <div class="border-2 border-[#E6B34B] p-4 rounded-md text-white flex justify-center">
            <label for="occupants">Pers :</label>
            <input type="number" name="occupants" min="1" max="10" class="text-[#272023] rounded-m ml-2" v-model="numberOccupants">
        </div>
        <div>
            <button type="submit" class="bg-[#E6B34B] p-4 rounded-md text-[#272023]">Réserver</button>
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
            console.log(days);

            localStorage.set(
                "userChoice",
                    {
                        "startingDate" : this.startingDate,"endingDate" : this.endingDate,"occupants":this.numberOccupants,
                        "nbrOfDays": days
                    }
                );
            this.$router.push('FilteredRooms');
        }
    }

}
</script>

<style scoped>
.bookingForm{
    border-top: 3px solid #E6B34B;
    height: 6rem;
    width: 80vw;
    margin-left: auto;
    margin-right: auto;
    margin-bottom: 2rem;
    background-color: #272023;
}
</style>
