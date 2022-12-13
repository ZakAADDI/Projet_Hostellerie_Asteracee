<template>
    <div class="flex flex-col items-center justify-center grow">
        <h1>Account Created</h1>
        <router-link :to="{ name: 'Home' }" class=" text-[#E6B34B]">
                Retour à l'accueil
        </router-link>
        <router-link :to="{ name: 'UserProfile' }" class=" text-[#E6B34B]">
                Voir mon compte
        </router-link>
    </div>
</template>

<script>
export default {
    name: 'ConfirmCreatedAccount',
    components:{
    }
}
</script>

<style scoped>

</style>
