<template>
    <div class="button">
        <router-link v-if="!user" :to="{ name: 'Connexion' }" class="mr-8 text-white hover:text-[#E6B34B] duration-700 w-48 flex flex-col justify-center items-center">
                Connexion
            </router-link>
            <router-link v-if="user" :to="{ name: 'ConfirmLogout' }" class="mr-8 text-white hover:text-[#E6B34B] duration-700 w-48 flex flex-col justify-center items-center">
                Deconnexion
            </router-link>
    </div>
</template>

<script>
import localStorage from '../services/localStorageProvider'
export default {
    name: 'LoginLogoutButton',
    components: {

    },
    methods: {

    },
    computed:{
         user() {
      const user = localStorage.get("user");
      if (user) {
        return true;
      } else {
        return false;
      }
    },
    }
}
</script>

<style scoped>
.button{
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
