<template>
    <Header/>
    <div class="hero">
        <img class="logo" src="../assets/images/LogoHeader.svg" alt="Logo Hostellerie Asteracée">
        <div class="media">
            <img class="leftImg" src="../assets/images/leftImg.png" alt="Image du lac">
            <div class="video">
                <iframe width="650" height="365" src="https://www.youtube.com/embed/-B7VhYjd6xc" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen style="position: absolute; z-index: 1;"></iframe>
                <p>Un espace reposant entre lac et montagne</p>
            </div>

            <img class="rightImg" src="../assets/images/rightImg.png" alt="Image de la prison">
        </div>
    </div>
</template>

<script>
import Header from '../subComponents/Header.vue'
export default {
    name: 'Hero',
    data(){
        return{

        }
    },
    components: {
        Header
    },
    methods:{
        created(){

        }
    }


}
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Radley&display=swap');

.hero{
    font-family: 'Radley', serif;

    display: flex;
    justify-content: center;
    flex-direction: column;
    background-color: #D2BD4D;
    box-shadow: 3px 3px 2px #D2BD4D;
    height: 600px;
    width: 60vw;
    margin-left: 20vw;
    margin-right: 20vw;
    box-shadow: 4px 4px lightyellow;
}
.media{
    display: flex;
    justify-content: space-around;
    margin-top: 2rem;
}

img{
    width: 200px;

}
.rightImg, .leftImg{
    height: 400px;
    margin-top: 10rem;
    position: absolute;
    box-shadow: 3px 3px 2px lightslategray;
}
iframe{
    box-shadow: 3px 3px 2px lightslategray;

}
.video{
    background-color: black;
    height: 60vh;
    width: 500px;
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: -5rem;
    flex-direction: column;
    color: white;
}
p{
    margin-top: 28rem;
}
@media screen and (min-width: 576px) {
    .rightImg{
        display: none;

    }
    .leftImg{
        display: none;
    }
}
@media screen and (min-width: 768px) {
    .rightImg{
        display: none;
    }
    .leftImg{
        display: none;
    }
}
@media screen and (min-width: 992px) {
    .rightImg{
        display: none;
    }
    .leftImg{
        display: none;
    }
    .logo {
    width: 40%;
    position: absolute;
    margin-left: 15vw;
    top : 0;
}
}
@media screen and (min-width: 1200px) {
    .rightImg{
        display: none;
    }
    .leftImg{
        display: none;
    }
    .logo {
    width: 30%;
    position: absolute;
    margin-left: 15vw;
    top : 0;
}
}
@media screen and (min-width: 1400px) {
    .leftImg{
    left: 10vw;
    top: 40px;
    display: block;
}
.rightImg{
    right: 10vw;
    top: 40px;
    display: block;
}
.logo {
    width: 30%;
    position: absolute;
    margin-left: 15vw;
    top : 0;
}
}
</style>
