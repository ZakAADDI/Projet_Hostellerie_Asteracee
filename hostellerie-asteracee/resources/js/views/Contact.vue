<template>
    <div class="contact">
        <div class="contactForm">
            <form action="">
                <label for="email">Email</label>
                <input type="email">
                <label for="message">Message</label>
                <textarea name="message" id="message" cols="30" rows="10"></textarea>
                <button>Envoyer</button>
            </form>
        </div>
    </div>
</template>

<script>
export default {
    name: 'Contact',
    components:{
    }
}
</script>

<style scoped>
.contact{
    height: 50vh;
    animation: fadein ease-in-out 0.5s;
}
@keyframes fadein {
    0% {
    opacity:0;
    }
    100% {
    opacity:1;
    }
}
form{
    display: flex;
    flex-direction: column;
    border: 3px solid #E6B34B;
    width: 30vw;
    background-color: #272023;
    margin: auto;
    margin-top: 20vh;
    padding: 2rem;
}
label{
    color: white;
}
button{

    border: 3px solid #E6B34B;
    border-radius: 15px;
    padding-top: 2rem;
    display: flex;
    justify-content: center;
    align-items: center;
}

</style>
