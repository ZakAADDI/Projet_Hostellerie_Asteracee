<template>
    <div class="z-10 flex flex-col items-center justify-center grow">
        <h1>{{ $t("message.logout") }} ?</h1>
        <button @click="logout">{{ $t("message.yes") }}</button>
        <button @click="returnHome">{{ $t("message.no") }}</button>
    </div>
</template>

<script>
import localStorage from '../services/localStorageProvider'
import axios from 'axios'

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
            axios.post('/api/logout');

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
