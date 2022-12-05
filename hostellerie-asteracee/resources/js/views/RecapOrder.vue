<template>
    <div class="recapOrder">
        <span class="text-[#E6B34B] text-2xl">Page de Recap Order</span>
    </div>
</template>

<script>
export default {
    name: 'RecapOrder',
    components:{
    }
}
</script>

<style scoped>
.recapOrder{
    animation: fadein ease-in-out 0.5s;
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
