<template>
    <section class="flex flex-col lg:flex-row 2xl:flex-row xl:flex-row items-center bg-white shadow-md shadow-[#E6B34B] w-3/4 backgroundNews mx-auto my-8 border-2 border-[#E6B34B]">
        <img v-if="!isEven" class="object-cover h-auto w-48 mt-8" :src=image :alt=imageAlt>
        <div class="flex flex-col justify-between p-4 leading-normal">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-[#272023] dark:text-white">{{ title }}</h5>
            <h2 class="mb-2 text-2x1 font-bold dark:text-white">{{ date }}</h2>
            <p class="mb-3 font-normal text-[#272023]">{{ content }}</p>
        </div>
        <img v-if="isEven" class="object-cover h-auto w-48 mb-8" :src=image :alt=imageAlt>

    </section>
</template>

<script>

export default {
    name: "CardNews",
    props: {
        title: String,
        content: String,
        date: String,
        image: String,
        imageAlt: String,
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

</style>
