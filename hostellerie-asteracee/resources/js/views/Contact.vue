<template>
    <div>

    <div class="flex flex-col mt-12">
        <hr class="w-80 h-1.5 bg-[#E6B34B] mx-auto sm:w-11/12">
        <hr class="w-72 h-1 bg-[#E6B34B] mx-auto mt-0.5 sm:w-10/12">

        <div class="h-12 w-80 text-2xl font-bold text-center mx-auto mt-4 mb-7" id="title">N'hésitez pas à nous <br> contacter !</div>

        <hr class="w-72 h-1 bg-[#E6B34B] mx-auto mb-0.5 sm:w-10/12">
        <hr class="w-80 h-1.5 bg-[#E6B34B] mx-auto sm:w-11/12">
    </div>

    <div class="contact bg-[#272023] w-11/12 mx-auto border-4 border-[#E6B34B] my-12">
        <form @submit.prevent="submitContact" class="flex flex-col">

            <label class="text-white text-xl ml-10 mt-7 sm:ml-36" for="email">eMail</label>
            <input class="w-72 h-8 mx-auto" name="email" type="text" v-model="email">

            <label class="text-white text-xl ml-10 mt-3" for="subject">Subject</label>
            <input class="w-72 h-8 mx-auto" name="subject" type="text" v-model="subject">

            <label class="text-white text-xl ml-10 mt-3" for="message">Message</label>
            <textarea class="w-72 h-40 mx-auto" name="message" type="text" v-model="message"></textarea>

            <button class="bg-[#E6B34B] h-12 w-56 mx-auto my-10 rounded-sm text-2xl font-bold">Envoyer</button>

        </form>
    </div>
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
