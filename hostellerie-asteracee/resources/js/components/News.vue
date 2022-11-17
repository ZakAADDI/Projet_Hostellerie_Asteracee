<template>
        <h2 v-if="language" class="mb-4 h-32 w-4/5 bg-[#D2BD4D] flex justify-center items-center mx-auto text-4xl text-center tracking-tight font-extrabold text-gray-900 light:text-white shadow-md shadow-gray-700">Les
            Nouveautés</h2>
        <h2 v-if="!language" class="mb-4 h-32 w-4/5 bg-[#D2BD4D] flex justify-center items-center mx-auto text-4xl text-center tracking-tight font-extrabold text-gray-900 light:text-white shadow-md shadow-gray-700">News</h2>
        <div class="bg-black shadow-md shadow-gray-700 w-2/3 mx-auto pt-8 pb-8 mb-8 mt-12">
            <CardNews v-for="(n,i) in news" :key="i"
                      :titleEn="n.title_en"
                      :titleFr="n.title_fr"
                      :content-en="n.content_en"
                      :content-fr="n.content_fr"
                      :date="n.publication_date"
                      :image="n.media"
                      :index="i"/>
        </div>
</template>

<script>
import axios from "axios";
import storage from '../store/index.js'
import CardNews from "./CardNews";
export default {
    name: 'News',
    components: {
        CardNews
    },
    data(){
        return {
            news : []
        }
    },
    computed:{
        language(){
            const language = storage.get("language");
            return language === "fr";
        }
    },
    async created(){
            const baseUri = 'http://127.0.0.1:8000/api';
            let response = await axios.get(baseUri + '/infos');
            this.news = response.data
    }
}
</script>

<style scoped>
</style>
