<template>
<div>
        <h2 class="mb-4 h-32 w-4/5 bg-[#D2BD4D] flex justify-center items-center mx-auto text-4xl text-center tracking-tight font-extrabold text-gray-900 light:text-white shadow-md shadow-gray-700">{{ this.section }}</h2>
        <div class="bg-black shadow-md shadow-gray-700 w-2/3 mx-auto pt-8 pb-8 mb-8 mt-12">
            <CardNews v-for="(n,i) in news" :key="i"
                      :title="n.title"
                      :content="n.content"
                      :date="n.publication_date"
                      :image="n.media['data']"
                      :index="i"/>
        </div>
</div>
</template>

<script>
import axiosProvider from "../services/axiosConfigProvider"
import CardNews from "./CardNews";
export default {
    name: 'News',
    components: {
        CardNews
    },
    data(){
        return {
            section : '',
            news : []
        }
    },
    async created(){
        this.news = (await axiosProvider.get('/infos'))?.data;
        this.section = this.news[0].section

    }
}
</script>

<style scoped>
</style>
