<template>
<<<<<<< HEAD
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
=======

    <h2 v-if="language" class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 light:text-white shadow-md shadow-gray-700">Les Nouveautés</h2>
    <h2 v-if="!language" class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 light:text-white shadow-md shadow-gray-700">News</h2>
<div class="bg-black shadow-md shadow-gray-700">

<!--
    <section class="flex flex-col items-center bg-white border shadow-md md:flex-row md:max-w-xl  backgroundNews"
    v-for="new in news" :key="new.id">
        <img class="object-cover w-full h-96 md:h-auto md:w-48" src="{{new.media['url']}}" alt="{{new.media['alt']}}">
        <div class="flex flex-col justify-between p-4 leading-normal">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{new.title}}</h5>
            <h2 class="mb-2 text-2x1 font-bold dark:text-white">le {{new.date}}</h2>
            <p class="mb-3 font-normal text-black">{{new.contentFr}}</p>
>>>>>>> Footer-GaetanBis
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
