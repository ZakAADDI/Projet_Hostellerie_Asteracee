<template>

    <div class="z-10 flex flex-col items-center justify-center grow">
        <h1>{{ $t("message.ourRooms") }}
        </h1>

        <!-- Dynamiser avec Section Axios -->
    </div>
</template>

<script>
import Rooms from '../components/Rooms.vue';

export default {
    name: 'OurRooms',
    components:{
        Rooms
    }
}
</script>

<style scoped>


</style>
