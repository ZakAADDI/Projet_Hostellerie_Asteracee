<template>
     <div class="z-10 border-4 border-[#E6B34B] bg-[#272023] text-white flex flex-col justify-center items-center mt-6 mx-6 lg:w-1/2 lg:mx-auto grow">
    <div class="flex flex-col items-center justify-center">
        <h1>{{ $t("message.areYouSureDeleteAcc") }} ?
        </h1>
        <h1>{{ $t("message.bookingsWillBeDeleted") }}</h1>
        <div class="flex flex-row items-baseline">
            <button @click="confirmDeleteAccount" class="bg-red-500 p-4 rounded-md text-[#272023] mx-6 my-4">{{ $t("message.deleteAcc") }}</button>
        <button @click="returnMyAccount" class="bg-[#E6B34B] p-4 rounded-md text-[#272023] mx-6 mb-6">{{ $t("message.cancel") }}</button>
        </div>

    </div>
    </div>
</template>

<script>
export default {
    name: 'DeleteAccount',
    components:{
    },
    methods:{
        returnMyAccount(){
            this.$router.push({name:'UserProfile'});
        },
        confirmDeleteAccount(){
        }
    },
}
</script>

<style scoped>

</style>
