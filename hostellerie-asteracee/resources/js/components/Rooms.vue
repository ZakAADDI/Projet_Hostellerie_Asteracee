<template>
    <div class="rooms">
        <img class="svg" src="../assets/images/Frame226.svg" alt="">
        <h1>Nos Chambres</h1>
        <div class="cards">
            <Card /><Card /><Card />
        </div>
    </div>
</template>

<script>
import Card from '../components/Card.vue';

export default {
    name: 'Rooms',
    components: {
        Card
    },
    methods: {

    },
    computed: {

    }
}
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Radley&display=swap');

.rooms{
    font-family: 'Radley', serif;
    display: flex;
    justify-content: center;
    flex-direction: column;
    background-color: black;
    height: 475px;
    width: 60vw;
    margin-left: 20vw;
    margin-right: 20vw;
    margin-top: 2rem;
    margin-bottom: 5rem;
    box-shadow: 3px 3px 2px lightslategray;
    color: #D2BD4D;
}
h1{
    font-size: 2rem;
    text-align: center;
    font-family: 'Radley', serif;

}
.cards{
    display: flex;
    justify-content: space-around;
}
.svg{
    width: 220px;
    top: -30px;
    position: relative;
    left: calc(45vw/2);
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
