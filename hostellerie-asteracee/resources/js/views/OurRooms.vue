<template>
    <div class="mt-[100px]">
        <Rooms/>
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
