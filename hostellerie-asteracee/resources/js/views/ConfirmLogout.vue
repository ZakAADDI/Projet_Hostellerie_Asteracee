<template>
    <div class="flex flex-col items-center justify-center grow">
        <h1>Log out ?</h1>
        <button @click="logout">Oui</button>
        <button @click="returnHome">Non</button>
    </div>
</template>

<script>
import localStorage from '../services/localStorageProvider'
import store from '../store/index'
export default {
    name: 'ConfirmLogout',
    components:{
    },
    computed:{
        logout(){
            store.commit('removeUser');
            localStorage.unset("user");
            localStorage.unset("userChoice");
            localStorage.unset("total_options_price");
            localStorage.unset("cartRoom");
            localStorage.unset("cartOptions");
            localStorage.unset("total_room_price");
            this.$router.push({name:'Home'})
        },
        returnHome(){
            this.$router.push({name:'Home'});
        }
    }
}
</script>

<style scoped>

</style>
