<template>
    <div class="switchTo flex flex-col items-center justify-center grow">
        <div class="content">
            <h1 v-if="!language">Voulez vous continuer en Français ?</h1>
            <h1 v-if="language">Would you like to continue in English ?</h1>
            <div class="buttons">
                <a class="choice" v-if="!language" v-on:click="changeToFrench">Oui</a>
                <a class="choice" v-if="language" v-on:click="changeToEnglish">Yes</a>
                <button class="choice" v-if="language" v-on:click="noChange">Non</button>
                <button class="choice" v-if="!language" v-on:click="noChange">No</button>
            </div>


        </div>

    </div>
</template>

<script>
// import Header from '../subComponents/Header.vue';
import storage from '../services/localStorageProvider';
export default {
    name: 'SwitchTo',
    components: {
        // Header
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
    },
    methods:{
        noChange(){
            this.$router.push({name:'Home'})
        },
        changeToFrench : function(){
            storage.set("language", "fr");
            this.$router.push({name:"Home"})
        },
        changeToEnglish : function(){
            storage.set("language", "en");
            this.$router.push({name:"Home"})
        }
    }

}

</script>

<style scoped>

.switchTo{
    height: 40vh;
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
a{
    cursor: pointer;
}
.choice{
    margin: 1rem;
}
.buttons{
    display: flex;
    align-items: center;

}
.logo{
    position: absolute;
}
.content{
    text-align: center;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    background-color:#272023;
    color: #E6B34B;
    width: 400px;
    padding: 2rem;
    margin-left: auto;
    margin-right: auto;
    border: 40px solid #E6B34B;
}
@media screen and (min-width: 576px) {

    .logo{
        top: 0;
        width: 40%;
        margin-left: auto;
        margin-right: auto;
        left: 30vw;
    }
}
@media screen and (min-width: 768px) {
    .logo{
        top: 0;
        margin-left: auto;
        margin-right: auto;
    }
}
@media screen and (min-width: 992px) {

    .logo {
        width: 40%;
        position: absolute;
        margin-left: 2vw;
        top : 0;
    }
}
@media screen and (min-width: 1200px) {

    .logo {
        width: 30%;
        position: absolute;
        margin-left: 7vw;
        top : 0;
    }
}
@media screen and (min-width: 1400px) {

    .logo {
        width: 30%;
        position: absolute;
        margin-left: 6vw;
        top : 0;
    }
}
</style>
