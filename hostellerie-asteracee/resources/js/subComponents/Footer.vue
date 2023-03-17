<template>
    <div class="flex flex-col sm:flex-row justify-evenly bg-[#272023] text-white border-t-4 border-t-[#E6B34B] relative bottom-0 w-full grow-0">

        <!-- LOCATION -->
        <div class="flex-col justify-center items-center p-5 order-1">
            <div class="flex justify-center items-center p-5">
                <a class="flex" href="https://www.google.com/maps/place/Imp%C3%A9rial+Palace/@45.9037282,6.1446627,17z/data=!3m1!4b1!4m6!3m5!1s0x478b8fc2026b8489:0x764caf7cb2ddcdc9!8m2!3d45.9037282!4d6.1446627!16s%2Fg%2F1225qpmp?hl=fr" target="_blank">
                    <img class="w-6 mr-3" src="../assets/images/icones/location.svg" alt="icone de localisation">
                    <p>{{ address }}</p>
                </a>
            </div>
            <div class="hidden sm:flex md:flex lg:flex xl:flex flex-col justify-center items-center">
                <h5 >{{ $t("message.siteMap") }}</h5>
                <router-link :to="{name:'Home'}">{{ $t("message.home") }}</router-link>
                <router-link :to="{name:'OurRooms'}">{{ $t("message.ourRooms") }}</router-link>
                <router-link :to="{name:'OurServices'}">{{ $t("message.ourServices") }}</router-link>
                <router-link :to="{name:'Contact'}" >{{ $t("message.contactUs") }}</router-link>
                <router-link :to="{name:'WhoAreWe'}" >{{ $t("message.whoAreWe") }}</router-link>
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
                    <a href="https://fr-fr.facebook.com/" target="_blank">
                        <img :src=facebookLogo alt="facebook" class="mr-4">
                    </a>
                </span>
                <span>
                    <a href="https://www.instagram.com/" target="_blank">
                        <img :src=instagramLogo alt="instagram" class="mr-4">
                    </a>
                </span>
                <span>
                    <a href="https://twitter.com/?lang=fr" target="_blank">
                        <img :src=twitterLogo alt="twitter">
                    </a>
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
