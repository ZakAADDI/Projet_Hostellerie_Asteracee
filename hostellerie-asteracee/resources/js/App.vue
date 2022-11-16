<template>

    <div>
        <Header />


        <router-view/>


        <Footer2 />
    </div>
</template>

<script>
import storage from './store/index';
import Header from './subComponents/Header.vue';
import Footer2 from './subComponents/Footer2.vue';
export default {
    name: "App.vue",
    components:{
        Header,
        Footer2
    },
    data(){
            return {
                currentLanguage : ''
            }
    },
    created() {
        if(this.currentLanguage = storage.get("language") == ''){
            this.currentLanguage = storage.set("language", "fr");
        }
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
