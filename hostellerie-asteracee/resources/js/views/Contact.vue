<template>

    <div class="flex flex-col">
        <hr class="w-80 h-1 bg-[#E6B34B] mx-auto">
        <hr class="w-80 h-0.5 bg-[#E6B34B] mx-auto">

        <div class="h-12 w-80 mx-auto my-10 rounded-sm text-2xl font-bold text-center">N'hésitez pas à nous <br> contacter !</div>

        <hr class="w-80 h-0.5 bg-[#E6B34B] mx-auto">
        <hr class="w-80 h-1 bg-[#E6B34B] mx-auto">
    </div>

    <div class="contact bg-[#272023] w-11/12 mx-auto border-4 border-[#E6B34B] my-12">
        <form @submit.prevent="submitContact" class="flex flex-col">

            <label class="text-white text-xl ml-10 mt-7" for="email">eMail</label>
            <input class="w-64 h-8 mx-auto" name="email" type="text" v-model="email">

            <label class="text-white text-xl ml-10 mt-3" for="subject">Subject</label>
            <input class="w-64 h-8 mx-auto" name="subject" type="text" v-model="subject">

            <label class="text-white text-xl ml-10 mt-3" for="message">Message</label>
            <textarea class="w-64 h-40 mx-auto" name="message" type="text" v-model="message"></textarea>

            <button class="bg-[#E6B34B] h-12 w-40 mx-auto my-10 rounded-sm text-2xl font-bold">Envoyer</button>

        </form>
    </div>
</template>

<script>
import emailjs from '@emailjs/browser';

export default {
    name: 'Contact',
    components: {
    },
    data() {
        return {
            email: '',
            subject: '',
            message: ''
        }
    },
    methods: {
        submitContact(e) {
            try {
                emailjs.sendForm('service_221d5yz', 'template_bd9p9yl', e.target,
                    'bbyfEd_o77jz3eSoT', {
                    email: this.email,
                    message: this.message,
                    subject: this.subject
                })
                console.log('Ok')
            } catch (error) {
                console.log({ error })
            }
        }
    }
}
</script>

<style scoped>
.contact {
    animation: fadein ease-in-out 0.5s;
}

@keyframes fadein {
    0% {
        opacity: 0;
    }

    100% {
        opacity: 1;
    }
}
</style>
