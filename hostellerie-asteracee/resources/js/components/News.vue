<template>
    <div class="news">
        <img class="svg" src="../assets/images/Frame226.svg" alt="">

        <h1>News</h1>
    </div>
    <div class="backNews">

    </div>
    <Separator />
</template>

<script>
import Separator from '../subComponents/Separator.vue'
export default {
    name: 'News',
    components: {
        Separator
    },
    methods: {

    },
    computed: {

    }
}
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Radley&display=swap');
.news{
    font-family: 'Radley', serif;
    display: flex;
    justify-content: center;
    flex-direction: column;
    background-color: black;
    height: 400px;
    width: 60vw;
    margin-left: 20vw;
    margin-right: 20vw;
    margin-top: 6rem;
    box-shadow: 3px 3px 2px lightslategray;
    color: white;
}
.backNews{
    height: 500px;
    width: 600px;
    background-color: #D2BD4D;
    position: relative;
    left: 30vw;
    margin-top: 6rem;
    bottom: 47vw;
    z-index: -1;
    box-shadow: 3px 3px 2px #D2BD4D;
}
.svg{
    width: 220px;
    top: -137px;
    position: relative;
    left: calc(45vw/2);
}
h1{
    font-size: 2rem;
    text-align: center;
    font-family: 'Radley', serif;

}
@media screen and (min-width: 576px) {

}
@media screen and (min-width: 768px) {

}
@media screen and (min-width: 992px) {


}
@media screen and (min-width: 1200px) {

}
@media screen and (min-width: 1400px) {

}
</style>

