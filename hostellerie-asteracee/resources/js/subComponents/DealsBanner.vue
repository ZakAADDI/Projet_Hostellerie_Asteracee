<template>

    <div
        class="h-450 w-3/4 sm:h-380 sm:w-4/6 md:h-400 md:w-4/6 lg:h-330 lg:w-4/5 xl:w-4/6 xl:h-48 bg-black border-t-4 border-t-[#D2BD4D] mb-10 mx-auto shadow-md shadow-gray-700 relative">

        <!-- Rectangle + border qui dépasse en bas à gauche du deals banner - à partir de l'iphone SE-->
        <div class="w-40 h-4  bg-black border-t-4 border-t-[#D2BD4D] text-white block absolute bottom-0 sm:top-24 sm:ml-2 xl:hidden"></div>
        <div class="w-20 h-10 sm:bg-[#D2BD4D] absolute bottom-0 sm:top-24 sm:ml-2 xl:hidden"></div>
        <!-- Rectangle + border qui dépasse en bas à gauche du deals banner xl - à partir de 1280px-->   
        <div class="xl:w-40 xl:h-10  xl:bg-black xl:border-t-4 xl:border-t-[#D2BD4D] text-white block absolute xl:bottom-0 ml-2"></div>
        <div class="xl:w-20 xl:h-10 xl:bg-[#D2BD4D] absolute xl:bottom-0 ml-2"></div>

        
        <div class="xl:flex h-full mt-7 xl:mt-0 2xl:justify-around">
            <!-- Content -->
            <div class="flex flex-col text-3xl text-[#D2BD4D] font-bold sm:mb-16 xl:mt-8">
                <h2 class="ml-3 sm:ml-24 xl:ml-14"> Offres </h2>
                <h2 class="ml-7 sm:ml-32 xl:ml-20"> exceptionnelles </h2>
            </div>
            <div class="text-white text-center flex flex-col mx-2 my-6 xl:justify-center" v-for="deal in deals" :key=deal.id >
                <h2 class= "text-xl font-bold xl:w-64" v-if="language">{{ deal.title_fr}}</h2>
                <p class= "text-base xl:w-64" v-if="language"> {{ deal.content_fr}}</p>
                <h2 class= "text-xl font-bold xl:w-64" v-if="!language">{{ deal.title_en}}</h2>
                <p class= "text-base xl:w-64" v-if="!language"> {{ deal.content_en}}</p>
            </div>
        </div>

    </div>

</template>

<script>
import axios from "axios";
import storage from '../store/index.js'
export default {
    name: 'DealsBanner',
    data(){
        return{
            deals: []
        }
    },
    computed: {
        language(){
            const language = storage.get("language");
            if(language == "fr"){
                return true;
            }else{
                return false;
            }
        }
    },
    async created(){
        const baseUri = 'http://127.0.0.1:8000/api';
        this.response = await axios.get(baseUri + '/sortedDeals');
        this.deals = this.response.data;
    }, 
}
</script>

<style scoped>

</style>
