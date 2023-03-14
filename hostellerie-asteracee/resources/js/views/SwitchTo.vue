<template>
    <div class="switchTo flex flex-col items-center justify-center grow">
        <div class="content">
            <h1 >{{ $t("message.doYouWantToContinueInEnglish") }}</h1>
            <div class="buttons">
                <a class="choice" v-on:click="changeTo">{{ $t("message.yes") }}</a>
                <button class="choice" v-on:click="noChange">{{ $t("message.no") }}</button>
            </div>


        </div>

    </div>
</template>

<script>
import storage from '../services/localStorageProvider';
import store from '../store/index'
export default {
    name: 'SwitchTo',
    components: {
        // Header
    },
    methods:{
        noChange(){
            this.$router.push({name:'Home'})
        },
        changeTo : function(){
            if (storage.get("language") === "fr"){
                storage.set("language", "en");
                storage.set("oldLanguage", "fr");
                store.commit('addLanguage', 'en')
            } else {
                storage.set("language", "fr");
                store.commit('addLanguage', 'fr')
                storage.set("oldLanguage", "en");
                store.commit('addLanguage', 'fr')
            }

            this.$router.push({name:"Home"})
        }
    }

}

</script>

<style scoped>

.switchTo{
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
