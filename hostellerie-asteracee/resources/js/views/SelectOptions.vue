<template>
<div>
     <div class="bg-[#272023] text-white border-t-4 border-t-[#E6B34B] flex flex-col items-center p-6 justify-center">
    <span class="text-[#E6B34B] text-2xl">Votre réservation : </span>
            <span> Du {{ this.userChoice.startingDate}} au {{ this.userChoice.endingDate}} pour {{ this.userChoice.occupants }} pers.</span>
    </div>
    <div class="options flex flex-col items-center justify-center mx-auto grow border-4 border-[#E6B34B] bg-[#272023] text-white shadow-md shadow-gray-400 w-2/3 p-4">
        <h1 class="mb-4">Choisissez les options de votre séjour</h1>

        <form @submit.prevent="submitForm">
            <div class="flex flex-row justify-between" v-for="option in options" v-bind:key=option.id>
                <input type="checkbox" :id="option.name" :value="option.name" v-model="selectedOption" >
                <label :for="option.id">{{ option.name }}</label>
                <span>{{ option.description }}</span>
                <span>{{ option.price }} €</span>
            </div>
            <div class="flex flex-col m-4">
                <button type="submit" class="bg-[#E6B34B] p-2 rounded-md text-[#272023] mb-4">Enregistrer mes options</button>
                <button type="submit" class="bg-red-500 p-2 rounded-md text-[#272023]" @click="removeData">Annuler</button>
            </div>

        </form>
    </div>
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
            cart: [],
            userChoice:[]
        }
    },
    async created(){
         this.options = (await axiosProvider.get('/options'))?.data;
         this.userChoice = localStorage.get("userChoice");
         this.cartRoom = localStorage.get("cartRoom");
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
