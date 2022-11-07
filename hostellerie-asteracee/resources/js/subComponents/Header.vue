<template>
    <div class="header">
        <router-link :to="{ name: 'Test' }">Test</router-link>

        <a v-on:click="changeToFrench" v-if="!language" ><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/1f/Flag_of_France_official.svg/1200px-Flag_of_France_official.svg.png" alt="French Flag"></a>

        <a v-on:click="changeToEnglish"
        v-if="language"
        :to="{name: Home }"><img src="https://upload.wikimedia.org/wikipedia/commons/a/ae/Flag_of_the_United_Kingdom.svg" alt="English Flag" ></a>
    </div>
</template>

<script>
import storage from '../store/index';
export default {
    name: 'Header',
    components: {

    },
    methods:{
        changeToFrench : function(){
            this.currentLanguage = storage.set("language", "fr");
            this.$router.push({name:"Test"})
        },
        changeToEnglish : function(){
            this.currentLanguage = storage.set("language", "eng");
            this.$router.push({name:"Test"})
        }
    },
    computed:{
        language(){
            const language = storage.get("language");
            if(language == "fr"){
                return true;
            }else{
                return false;
            }
        }
    }
}
</script>

<style scoped>

.header {
    height: 6rem;
    background-color: black;
    display: flex;
    align-items: center;
    justify-content: flex-end;
}

a {
    color: white;
    transition-duration: 0.9s;
    margin-right: 2rem;
}

a:hover {
    color: #D2BD4D;
    transition-duration: 0.9s, 0.9s;
}
img{
    width: 30px;
}
</style>
