<template>
    <div class="z-10 flex flex-col items-center justify-center grow">
        <span>Votre commentaire a bien été pris en compte</span>
        <span>Merci</span>
        <router-link :to="{ name: 'UserProfile' }" class=" text-[#E6B34B]">
                Retour au profil
        </router-link>    </div>
</template>

<script>

export default {
    name: 'ConfirmAddedReview',
    components:{
    }
}
</script>

<style scoped>

</style>
