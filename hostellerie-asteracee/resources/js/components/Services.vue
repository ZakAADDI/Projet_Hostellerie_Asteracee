<template>
    <div class="services">
        <img class="svg" src="../assets/images/Frame226.svg" alt="">
        <h1>Nos Services</h1>
        <div class="cards">
            <Card /><Card /><Card />
        </div>
    </div>
</template>

<script>
import Card from '../components/Card.vue'
export default {
    name: 'Services',
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
.services{
    display: flex;
    justify-content: center;
    flex-direction: column;
    /* background-color: #D2BD4D; */
    background: black;
    height: 500px;
    width: 60vw;
    margin-left: 20vw;
    margin-right: 20vw;
    margin-bottom: 5rem;
    box-shadow: 3px 3px 2px lightslategray;
    color: #D2BD4D;
}
h1{
    font-size: 2rem;
    text-align: center;
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
