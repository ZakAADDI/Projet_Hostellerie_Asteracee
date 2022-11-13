<template>
    <div class="div">
        <div class="contactForm">
            <form action="">
                <label for="email">Email</label>
                <input type="email">
                <label for="message">Message</label>
                <input type="text">
                <button>Envoyer</button>
            </form>
        </div>
    </div>
</template>

<script>
import axios from "axios";
export default {
    name: 'Contact',
    components:{
    },
   mounted(){
        const response = axios.get('https://hp-api.herokuapp.com/api/characters');
        console.log(response);
    }
}
</script>

<style scoped>
form{
    display: flex;
    flex-direction: column;
    border: 3px solid #D2BD4D;
    width: 30vw;
    color: white;
    background-color: black;
    margin: auto;
    margin-top: 20vh;
    padding: 2rem;
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
