<template>
    <div class="userProfile flex flex-col items-center justify-center grow">
        <h1>Profil utilisateur</h1>
        <router-link :to="{name:'UpdateUser'}">Mettre à jour mon profil</router-link>
        <router-link :to="{name:'UpdatePassword'}">Mettre à jour mon mot de passe</router-link>
        <router-link :to="{name:'ConfirmDeleteAccount'}">Supprimer mon compte</router-link>

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
.userProfile{
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
