<template>
    <div class="grid grids-cols-3 sm:grid-cols-1 md:grid-cols-3 bg-black text-white">

        <!-- LOCATION -->
        <div class="flex-col justify-center items-center p-5 order-1">
            <div class="flex justify-center items-center p-5">
                <img class="w-6 mr-3" src="../assets/images/icones/location.svg" alt="icone de localisation">
                <p>25 quai du lac - 74 000 Annecy</p>
            </div>
            <div class="hidden md:block ">
                <h5>Plan du site</h5>
                <a href="*">Accueil</a>
                <a href="*">Nos chambres</a>
                <a href="*">Nos Services</a>
                <a href="*">Nos Nouveautés</a>
            </div>
        </div>

        <!-- PHONE -->
        <div class="flex flex-col justify-center items-center pt-5 sm:order-3 md:order-2">
            <div class="flex justify-center items-center">
                <img class="w-6 mr-3" src="../assets/images/icones/phone.svg" alt="icone de téléphone">
                <p>+334 56 56 56 56</p>
            </div>
            <img class="rosace" src="../assets/images/Frame231.svg" alt="décoration">
        </div>

        <!-- EMAIL -->
        <div class="flex flex-col justify-center items-center p-5 sm:order-2 md:order-3">
            <div class="flex justify-center items-center m-5">
                 <img class="w-6 mr-3" src="../assets/images/icones/email.svg" alt="icone de mail">
                <p>email@email.fr</p>
            </div>
            <div class="flex">
                <img src="../assets/images/icones/facebook.svg" alt="facebook">
                <img src="../assets/images/icones/instagram.svg" alt="instagram">
                <img src="../assets/images/icones/twitter.svg" alt="twitter">
            </div>
        </div>

    </div>
</template>

<script>

export default {
    name: 'Footer2'
}
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Radley&display=swap');


</style>
