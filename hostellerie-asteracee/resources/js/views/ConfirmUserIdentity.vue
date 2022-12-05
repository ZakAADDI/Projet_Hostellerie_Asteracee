<template>
    <div class="confirmUserIdentity">
        <span class="text-[#E6B34B] text-2xl">Page de ConfirmUserIdentity</span>
    </div>
</template>

<script>
export default {
    name: 'confirmUserIdentity',
    components:{
    }
}
</script>

<style scoped>
.confirmUserIdentity{
    height: 50vh;
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
