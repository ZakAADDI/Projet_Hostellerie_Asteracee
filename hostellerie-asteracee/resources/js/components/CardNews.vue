<template>
    <section class="flex flex-row items-center bg-white border shadow-md shadow-[#D2BD4D] w-3/4 backgroundNews">
        <img v-if="!isEven" class="object-cover w-full h-96 md:h-auto md:w-48" src="https://www.ville-rieumes.fr/wp-content/uploads/sites/1427/2021/03/travaux-voirie.png" alt="">
        <div class="flex flex-col justify-between p-4 leading-normal">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ titleFr }}</h5>
            <h5 v-if="!language" class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ titleEn }}</h5>
            <h2 v-if="language" class="mb-2 text-2x1 font-bold dark:text-white">le {{ date }}</h2>
            <h2 v-if="!language" class="mb-2 text-2x1 font-bold dark:text-white">the {{ date}}</h2>
            <p v-if="language" class="mb-3 font-normal text-black">{{ contentFr }}</p>
            <p v-if="!language" class="mb-3 font-normal text-black">{{ contentEn }}</p>
        </div>
        <img v-if="isEven" class="object-cover w-full h-96 md:h-auto md:w-48" src="https://www.hthpiscine.fr/userfiles/images/Piscine_Hiver.png" alt="">

    </section>
</template>

<script>
import storage from "../store";

export default {
    name: "CardNews",
    props: {
        titleFr: String,
        titleEn: String,
        contentFr: String,
        contentEn: String,
        date: String,
        image: Object,
        index: Number
    },
    computed: {
        language() {
            const language = storage.get("language");
            return language === "fr";
        },
        isEven(){
            return this.index % 2 === 0;
        }

    }
}
</script>

<style scoped>
.backgroundNews {
    margin-left: auto;
    margin-right: auto;
    margin-bottom: 2rem;
    margin-top: 2rem;
    border: 2px solid #D2BD4D;
}
</style>
