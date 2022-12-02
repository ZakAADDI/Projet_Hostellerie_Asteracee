<template>
    <div class="flex flex-col items-center justify-center grow">
        <h1>Aïe, quelque chose s'est mal passé </h1>
        <router-link :to="{ name: 'Home' }" class=" text-[#E6B34B]">
                Retour à l'accueil
        </router-link>
        <router-link :to="{ name: 'CreateUser' }" class=" text-[#E6B34B]">
                Essayer à nouveau
        </router-link>
    </div>
</template>

<script>
export default {
    name: 'SomethingWentWrong',
    components:{
    }
}
</script>

<style scoped>

</style>
