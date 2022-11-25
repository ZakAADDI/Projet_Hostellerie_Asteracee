<template>
    <div class="prestations shadow-md shadow-gray-700 flex justify-around">
        <img src="../assets/images/svg/alcool.svg" alt="alcool">
        <img src="../assets/images/svg/coffee.svg" alt="coffee">
        <img src="../assets/images/svg/dog-side.svg" alt="dog">
        <img src="../assets/images/svg/pool.svg" alt="pool">
        <img src="../assets/images/svg/human-baby-changing-table.svg" alt="human-baby-changing-table">
        <img src="../assets/images/svg/silverware-fork-knife.svg" alt="silverware-fork-knife">
        <img src="../assets/images/svg/smoking-off.svg" alt="smoking-off">
        <img src="../assets/images/svg/wifi.svg" alt="wifi">
    </div>
</template>

<script>
export default {
    name: 'Prestations',
    components: {

    },
    methods: {

    },
    computed: {

    }
}
</script>

<style scoped>
.prestations{
    border-top: 3px solid #E6B34B;
    height: 6rem;
    width: 50vw;
    margin-left: auto;
    margin-right: auto;
    margin-bottom: 2rem;
}
img{
    width: 35px;
}
</style>
