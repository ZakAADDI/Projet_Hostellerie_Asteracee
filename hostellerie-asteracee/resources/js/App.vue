<template>

    <div>
        <router-view/>
    </div>
</template>

<script>
import storage from './store/index';
export default {
    name: "App.vue",
    created() {
        if(this.currentLanguage = storage.get("language") == ''){
            this.currentLanguage = storage.set("language", "fr");
        }

    },
    data(){
        return {
            currentLanguage : ''
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
