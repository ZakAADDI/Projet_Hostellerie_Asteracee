<template>
    <div class="options flex flex-col items-center mt-16 grow">
        <form @submit.prevent="submitForm">
            <div class="flex flex-row justify-between" v-for="option in options" v-bind:key=option.id>
                <input type="checkbox" :id="option.name" :value="option.name" v-model="selectedOption" >
                <label :for="option.id">{{ option.name }}</label>
                <span>{{ option.description }}</span>
                <span>{{ option.price }}</span>
            </div>
            <button type="submit" class="bg-[#E6B34B] p-2 rounded-md text-[#272023]">Enregistrer mes options</button>
            <button type="submit" class="bg-red-500 p-2 rounded-md text-[#272023]" @click="removeData">Annuler</button>
        </form>
    </div>
</template>

<script>

import axiosProvider from '../services/axiosConfigProvider'
import localStorage from '../services/localStorageProvider'
export default {
    name: 'SelectOptions',
    data(){
        return{
            options:[],
            selectedOption : [],
            cart: []
        }
    },
    async created(){
         this.options = (await axiosProvider.get('/options'))?.data;
    },
    methods:{
        submitForm(){
            localStorage.set("cartOptions",{"options":this.selectedOption})

        },
        removeData(event){
            event.preventDefault;
            localStorage.unset("userChoice");
            localStorage.unset("cartRoom");
            localStorage.unset("cartOptions");
            this.$router.push({ name: 'Home'});
        }
    }
}
</script>

<style scoped>
.options{
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
