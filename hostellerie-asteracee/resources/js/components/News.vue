<template>
    <div class="news">
        <h1>News</h1>
    </div>
    <div class="backNews">

    </div>
</template>

<script>
export default {
    name: 'News',
    components: {

    },
    methods: {

    },
    computed: {

    }
}
</script>

<style scoped>
.news{
    display: flex;
    justify-content: center;
    flex-direction: column;
    background-color: #D2BD4D;
    height: 400px;
    width: 60vw;
    margin-left: 20vw;
    margin-right: 20vw;
    margin-top: 6rem;
    box-shadow: 3px 3px 2px orange;
}
.backNews{
    height: 500px;
    width: 600px;
    background-color: black;
    position: relative;
    left: 30vw;
    margin-top: 6rem;
    bottom: 47vw;
    z-index: -1;
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

