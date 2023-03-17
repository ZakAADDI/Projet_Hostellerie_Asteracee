<template>
    <div class="z-10 flex flex-col items-center justify-center grow">
        <h1>{{ $t("message.ourServices") }}
        </h1>

        <!-- Dynamiser avec Section Axios -->
    </div>
</template>

<script>
import Services from '../components/Services.vue';

export default {
    name: 'OurServices',
    components:{
    Services
}
}
</script>

<style scoped>

</style>
