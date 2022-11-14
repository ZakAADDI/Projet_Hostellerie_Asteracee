<template>
    <div class="flip-card">
        <div class="flip-card-inner">
            <div class="flip-card-front">
                <img :src=image.url :alt=image.alt>
                <div class="spanType">
                    <span v-if="language">{{ titleFr }}</span>
                    <span v-else>{{ titleEn }}</span>
                </div>

                <img class="logo" src="../assets/images/LogoSVG.svg" alt="logo de l'hostellerie">
            </div>
            <div class="flip-card-back">
               <div v-if="language" class="type">{{ titleFr }}</div>
               <div v-if="!language" class="type">{{ titleEn }}</div>
                <div v-if="language" class="content">{{ contentFr }}</div>
                <div v-if="!language" class="content">{{ contentEn }}</div>
                <div v-if="showPrice" class="price">{{ price }} € </div>
            </div>
        </div>
    </div>

</template>

<script>

import storage from "../store";

export default {
    name: 'Card',
    props: {
        titleFr: String,
        titleEn: String,
        contentFr: String,
        contentEn: String,
        price: String,
        showPrice: Boolean,
        image: Object
    },
    computed: {
        language() {
            const language = storage.get("language");
            return language === "fr";
        }
    }
}
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Radley&display=swap');

.flip-card {
    font-family: 'Radley', serif;
    width: 200px;
    height: 300px;
    perspective: 1000px;

}

.flip-card-inner {
    position: relative;
    text-align: center;
    transition: transform 0.9s;
    transform-style: preserve-3d;
}

.flip-card:hover .flip-card-inner {
    transform: rotateY(180deg);
}

.flip-card-front,
.flip-card-back {
    position: absolute;
    width: auto;
    height: auto;
    backface-visibility: hidden;
    border: 1px solid #D2BD4D;
}

.flip-card-front {
    background-color: white;
    color: black;
    height: 350px;
    box-shadow: 4px 4px 4px gray;
}

.flip-card-back {
    background-color: black;
    color: white;
    transform: rotateY(180deg);
    width: 200px;
    height: 350px;
    box-shadow: 4px 4px 4px gray;
    display: flex;
    flex-direction: column;
    justify-content: space-around;
}
.type{
    width: 50%;
    background-color: #D2BD4D;
    color: black;
    display: flex;
    justify-content: flex-start;
    padding-left: 1rem;
}
.content{
    color: white;
}
.price{
    width: 50%;
    background-color: #D2BD4D;
    color: black;
    display: flex;
    justify-content: flex-end;
    padding-right: 1rem;
    padding: 0.3rem;
}
img {
    width: 200px;
}
.logo{
    width: 80px;
    margin-top: 3rem;
    margin-left: auto;
    margin-right: auto;
}
.spanType{
    padding-top: 2rem;
}
</style>
