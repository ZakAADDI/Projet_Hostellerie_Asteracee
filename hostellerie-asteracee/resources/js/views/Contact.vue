<template>
    <div class="div">
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
form{
    display: flex;
    flex-direction: column;
    border: 3px solid #D2BD4D;
    width: 30vw;
    background-color: black;
    margin: auto;
    margin-top: 20vh;
    padding: 2rem;
}
label{
    color: white;
}
button{

    border: 3px solid #D2BD4D;
    border-radius: 15px;
    padding-top: 2rem;
    display: flex;
    justify-content: center;
    align-items: center;
}

</style>
