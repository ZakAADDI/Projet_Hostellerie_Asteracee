<template>
    <div class="flip-card">
        <div class="flip-card-inner">
            <div class="flip-card-front shadow-md shadow-gray-200 relative">
                <img :src=image :alt=image.alt>
                <div class="spanType">
                    <span v-if="language">{{ titleFr }}</span>
                    <span v-else>{{ title }}</span>
                </div>

                <img class="logo absolute ml-16 bottom-0 top-48" src="../assets/images/LogoSVG.svg" alt="logo de l'hostellerie">
            </div>
            <div class="flip-card-back">
               <div class="type">{{ title }}</div>
                <div class="content">{{ description }}</div>

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
        title: String,
        description: Array,
        price: String,
        showPrice: Boolean,
        image: String
    },
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
    height: 180px;
}
.logo{
    width: 80px;
}
.spanType{
    padding-top: 2rem;
}
</style>
