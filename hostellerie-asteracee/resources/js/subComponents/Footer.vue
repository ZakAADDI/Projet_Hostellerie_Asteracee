<template>
    <div class="flex flex-col sm:flex-row justify-evenly bg-[#272023] text-white border-t-4 border-t-[#E6B34B] relative bottom-0 w-full grow-0">

        <!-- LOCATION -->
        <div class="flex-col justify-center items-center p-5 order-1">
            <div class="flex justify-center items-center p-5">
                <img class="w-6 mr-3" src="../assets/images/icones/location.svg" alt="icone de localisation">
                <p>{{ address }}</p>
            </div>
            <div class="hidden sm:flex md:flex lg:flex xl:flex flex-col justify-center items-center">
                <h5>Plan du site</h5>
                <router-link :to="{name:'Home'}">Accueil</router-link>
                <router-link :to="{name:'OurRooms'}">Nos chambres</router-link>
                <router-link :to="{name:'OurServices'}">Nos services</router-link>
                <router-link :to="{name:'Contact'}">Nous contacter</router-link>
                <router-link :to="{name:'WhoAreWe'}">Qui Sommes Nous ?</router-link>
            </div>
        </div>

        <!-- PHONE -->
        <div class="flex flex-col justify-between items-center sm:order-2 order-3 pt-5">
            <div class="flex justify-center items-center m-5">
                <img class="w-6 mr-3" src="../assets/images/icones/phone.svg" alt="icone de téléphone">
                <p>+33 {{ phone }}</p>
            </div>
            <img class="rosace" src="../assets/images/Frame231.svg" alt="décoration">
        </div>

        <!-- EMAIL -->
        <div class="flex flex-col justify-start items-center p-5 sm:order-2 md:order-3">
            <div class="flex justify-center items-center m-5">
                 <img class="w-6 mr-3" src="../assets/images/icones/email.svg" alt="icone de mail">
                <p>{{ email }}</p>
            </div>
            <div class="flex">
                <span>
                    <img :src=facebookLogo alt="facebook" class="mr-4">
                </span>
                <span>
                    <img :src=instagramLogo alt="instagram" class="mr-4">
                </span>
                <span>
                    <img :src=twitterLogo alt="twitter">
                </span>
            </div>
        </div>

    </div>
</template>

<script>
export default {
    name: 'Footer',
    props:{
        facebookLogo: String,
        twitterLogo: String,
        instagramLogo: String,
        email: String,
        address: String,
        phone: String,
        sectionRoom: String,
        sectionService: String,
        sectionNews: String
   }

}
</script>

<style scoped>

</style>
