<template>
    <div class="flex flex-col items-center justify-center grow">
        <h1>Profil utilisateur</h1>
        <router-link :to="{name:'UpdateUser'}">Mettre à jour mon profil</router-link>
        <router-link :to="{name:'UpdatePassword'}">Mettre à jour mon mot de passe</router-link>

    </div>
</template>

<script>
export default {
    name: 'UserProfile',
    components:{
    }
}
</script>

<style scoped>

</style>
