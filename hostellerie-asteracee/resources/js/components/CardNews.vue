<template>
    <section class="flex flex-col lg:flex-row 2xl:flex-row xl:flex-row items-center bg-white border shadow-md shadow-[#D2BD4D] w-3/4 backgroundNews">
        <img v-if="!isEven" class="object-cover h-auto w-48" src="https://www.ville-rieumes.fr/wp-content/uploads/sites/1427/2021/03/travaux-voirie.png" alt="">
        <div class="flex flex-col justify-between p-4 leading-normal">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ title }}</h5>
            <h2 class="mb-2 text-2x1 font-bold dark:text-white">{{ date }}</h2>
            <p class="mb-3 font-normal text-black">{{ content }}</p>
        </div>
        <img v-if="isEven" class="object-cover h-auto w-48" src="https://www.hthpiscine.fr/userfiles/images/Piscine_Hiver.png" alt="">

    </section>
</template>

<script>
import storage from "../services/localStorageProvider";

export default {
    name: "CardNews",
    props: {
        title: String,
        content: String,
        date: String,
        image: Object,
        index: Number
    },
    computed: {
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
