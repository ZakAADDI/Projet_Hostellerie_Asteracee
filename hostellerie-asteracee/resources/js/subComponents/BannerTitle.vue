<template>
    <div class="banner">
         <h2 class="mb-4 h-32 w-4/5 bg-[#E6B34B] flex justify-center items-center mx-auto text-4xl text-center tracking-tight font-extrabold text-gray-900 light:text-white shadow-md shadow-gray-700">On parle de Nous</h2>
    </div>
</template>

<script>
export default {
    name: 'BannerTitle',
    components: {

    },
    methods: {

    },
    computed:{

    }
}
</script>

<style scoped>
.banner{
    animation: fadein ease-in-out 2s;
}

@keyframes fadein {
    0% {
    opacity:0;
    }
    100% {
    opacity:1;
    }
}

</style>
