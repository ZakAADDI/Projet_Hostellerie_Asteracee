<template>
    <div class="z-10 flex flex-col items-center justify-center grow">
        <h1>{{ $t("message.accountCreated") }}</h1>
        <router-link :to="{ name: 'Home' }" class=" text-[#E6B34B]">
            {{ $t("message.home") }}
        </router-link>
        <router-link :to="{ name: 'UserProfile' }" class=" text-[#E6B34B]">
            {{ $t("message.myAccount") }}
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
