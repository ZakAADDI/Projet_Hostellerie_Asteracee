<template>
        <h2 v-if="language" class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 light:text-white">Les
            Nouveautés</h2>
        <h2 v-if="!language" class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 light:text-white">News</h2>
        <div class="bg-black">
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
.bg-black{
    width: 80vw;
    margin-left: auto;
    margin-right: auto;
    padding-top: 2rem;
    padding-bottom: 2rem;
    margin-bottom: 2rem;
}
.mb-4 {
    text-align: center;
    background-color: #D2BD4D;
    color: black;
    width: 80vw;
    height: 8rem;
    display: flex;
    justify-content: center;
    align-items: center;
    margin-left: auto;
    margin-right: auto;
}
</style>
