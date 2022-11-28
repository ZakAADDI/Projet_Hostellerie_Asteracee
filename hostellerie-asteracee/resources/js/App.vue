<template>

    <div class>
        <Header />


        <router-view/>


        <Footer
        :twitterLogo="this.twitterLogo"
        :facebookLogo="this.facebookLogo"
        :instagramLogo="this.instagramLogo"
        :email="this.email"
        :address="this.address"
        :phone="this.phone"
        :sectionRoom="this.sectionRoom"
        :sectionNews="this.sectionNews"
        :sectionService="this.sectionService" />
    </div>
</template>

<script>
import axiosProvider from "../js/services/axiosConfigProvider"
import storage from './services/localStorageProvider';
import Header from './subComponents/Header.vue';
import Footer from './subComponents/Footer.vue';
export default {
    name: "App.vue",
     data(){
        return{
            email: '',
            address: '',
            phone: '',
            twitterLogo: '',
            facebookLogo: '',
            instagramLogo: '',
            sectionRoom: '',
            sectionService: '',
            sectionNews: ''
        }
    },
    components:{
        Header,
        Footer
    },
    created() {
        if(this.currentLanguage = storage.get("language") == ''){
            this.currentLanguage = storage.set("language", "fr");
        }

    },
    async created(){
        // Footer Infos
        this.footerElements = (await axiosProvider.get('/contacts'))?.data;
        this.email = this.footerElements[2].text;
        this.phone = this.footerElements[1].text;
        this.address = this.footerElements[0].text;

        // Footer Icon
        this.iconSocial = (await axiosProvider.get('/medias'))?.data;
        this.twitterLogo = this.iconSocial[15].url;
        this.facebookLogo = this.iconSocial[16].url;
        this.instagramLogo = this.iconSocial[17].url;

        // Footer Site Mapping
        this.rooms = (await axiosProvider.get('/rooms'))?.data;
        this.sectionRoom = this.rooms[0].section;
        this.services = (await axiosProvider.get('/services'))?.data;
        this.sectionService= this.services[0].section;
        this.news = (await axiosProvider.get('/infos'))?.data;
        this.sectionNews = this.news[0].section;
    }
}
</script>


<style >

@import url('https://fonts.googleapis.com/css2?family=Radley&display=swap');

html, body{
    font-family: 'Radley', sans-serif;
}
#app {
    font-family: 'Radley', sans-serif;
}

</style>
