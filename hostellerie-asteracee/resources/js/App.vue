<template>

    <div>
        <router-view/>
    </div>
</template>

<script>
import storage from './store/index';
export default {
    name: "App.vue",
    created(){
        this.language = storage.set("language", "fr");
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
