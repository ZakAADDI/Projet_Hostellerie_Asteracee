<template>
    <div class="w-4/5 mx-auto">
        <h1 class="text-center mt-24 font-bold text-3xl">Bienvenue dans le Back Office de l'hostellerie de l'Astéracée</h1>
        <h2 class="font-bold text-2xl mt-6">{{this.sectionRooms}}</h2>
            <button type="button" class="border-4 border-gray-300 bg-amber-200 p-2 rounded-lg" @click="clicked">Add new Room</button>

        <div class="roomsList flex justify-between border-b-4 border-b-[#272023]">
            <BoCardRooms  v-for="room in rooms" :key=room.id
            :roomProps="room" />
        </div>

        <h2 class="font-bold text-2xl mt-6">{{this.sectionDeals}}</h2>
        <button class="border-4 border-gray-300 bg-amber-200 p-2 rounded-lg" @click="clicked">Add new Deal</button>
        <div class="newsList flex justify-between border-b-4 border-b-[#272023]">
            <BoCardDeals v-for="deal in deals" :key=deal.id
             :dealProps="deal" />
        </div>

        <h2 class="font-bold text-2xl mt-6">{{this.sectionServices}}</h2>
        <button class="border-4 border-gray-300 bg-amber-200 p-2 rounded-lg" @click="clicked">Add new Service</button>
        <div class="servicesList flex justify-between border-b-4 border-b-[#272023]">
            <BoCardServices v-for="service in services" :key=service.id
             :serviceProps="service" />
        </div>

        <h2 class="font-bold text-2xl mt-6">{{this.sectionInfos}}</h2>
        <button class="border-4 border-gray-300 bg-amber-200 p-2 rounded-lg" @click="clicked">Add new Info</button>
        <div class="reviewsList flex justify-between border-b-4 border-b-[#272023]">
            <BoCardInfos v-for="info in infos" :key=info.id
            :infoProps="info"/>
        </div>

         <h2 class="font-bold text-2xl mt-6">{{this.sectionReviews}}</h2>
         <button class="border-4 border-gray-300 bg-amber-200 p-2 rounded-lg" @click="clicked">Add new Review</button>
        <div class="reviewsList flex justify-between border-b-4 border-b-[#272023]">

        </div>
    </div>
</template>

<script>
import axiosProvider from "../services/axiosConfigProvider"
import BoCardRooms from "../components/BoCardRooms.vue"
import BoCardServices from '../components/BoCardServices.vue'
import BoCardDeals from '../components/BoCardDeals.vue'
import BoCardInfos from '../components/BoCardInfos.vue'
export default {
    name: 'BackOffice',
    data(){
        return{
            rooms:[],
            services:[],
            deals:[],
            infos:[],
            reviews:[],
            sectionRooms: '',
            sectionServices:'',
            sectionDeals:'',
            sectionInfos: '',
            sectionReviews:''
        }
    },
    components:{
        BoCardRooms,
        BoCardServices,
        BoCardDeals,
        BoCardInfos
    },
    async created(){
        this.rooms = (await axiosProvider.get('/rooms'))?.data;
        this.sectionRooms = this.rooms[0].section;


        this.deals = (await axiosProvider.get('/deals'))?.data;
        this.sectionDeals = this.deals[0].section;

        this.services = (await axiosProvider.get('/services'))?.data;
        this.sectionServices = this.services[0].section;



        this.infos = (await axiosProvider.get('/infos'))?.data;
        this.sectionInfos = this.infos[0].section;



        this.reviews = (await axiosProvider.get('/reviews'))?.data;
        // console.log(this.reviews);
        this.sectionReviews = this.reviews[0].section;

        // this.heroes = (await axiosProvider.get('/heroes'))?.data;
        // this.contacts = (await axiosProvider.get('/contacts'))?.data;
        // this.medias = (await axiosProvider.get('/medias'))?.data;
    },
    methods:{
        clicked : function(event){
            event.preventDefault();
            console.log('Clicked');
        }
    }
}
</script>

<style scoped>

</style>
