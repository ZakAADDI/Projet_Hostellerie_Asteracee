<template>
    <div class="prestations  flex flex-col justify-center mx-auto my-4 w-2/3 h-32 sm:flex-row mt-12">
        <div class="flex flex-row justify-between sm:justify-around mx-auto my-4 sm:mx-0 w-1/2">
            <img class="w-9" :src=svg.media_url :alt=svg.media_alt v-for="svg in firstPart" :key=svg.id >
        </div>
        <div class="flex flex-row justify-between sm:justify-around mx-auto my-4 sm:mx-0 w-1/2">
            <img class="w-9" :src=svg.media_url :alt=svg.media_alt v-for="svg in secondPart" :key=svg.id >
        </div>
    </div>
</template>

<script>
import axiosProvider from '../services/axiosConfigProvider'
export default {
    name: 'Prestations',
    data(){
        return{
            firstPart: [],
            secondPart: [],
            svg: Object
        }
    },
    async created(){
        this.svgs = (await axiosProvider.get('/prestations'))?.data;
        this.svgs.forEach(svg => {
            if(svg.id<= 4){
                this.firstPart.push(svg);
            }
            if(svg.id>4){
                this.secondPart.push(svg);
            }
        });
    }
}
</script>

<style scoped>
.prestations{
     animation: fadein ease-in-out 2s;
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
