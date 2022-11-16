<template>

    <div
        class="h-28 w-2/3 bg-black text-white border-t-4 border-t-[#D2BD4D] mb-10 mx-auto shadow-md shadow-gray-700 relative">
        <span class="w-24 h-10 bg-black border-t-4 border-t-[#D2BD4D] text-white block absolute bottom-0">0</span>
        <div class="w-20 h-10 bg-[#D2BD4D] absolute bottom-0"></div>
        
    <!-- TO DO "le petit bitogniot" -->
        <div class="flex justify-around h-full items-center">
            
            <div class="flex flex-col align-middle">
                <h2 class=""> Offres </h2>
                <h2 class=""> exceptionnelles </h2>
            </div>
            <div class=" flex flex-col align-middle" v-for="deal in deals" :key=deal.id>
                <h2 v-if="language">{{ deal.title_fr}}</h2>
                <p v-if="language"> {{ deal.content_fr}}</p>
                <h2 v-if="!language">{{ deal.title_en}}</h2>
                <p v-if="!language"> {{ deal.content_en}}</p>
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
        this.response = await axios.get(baseUri + '/deals');
        this.deals = this.response.data;
    }
}
</script>

<style scoped>

</style>
