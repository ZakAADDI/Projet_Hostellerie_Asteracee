<template>
    <div class="flip-card">
        <div class="flip-card-inner">
            <div class="flip-card-front shadow-md shadow-gray-200 relative">
                <img style="width:200px;height:180px" :src=image :alt=image.alt>
                <div class="pt-8">
                    <span >{{ title }}</span>
                </div>

                <img class="absolute ml-16 bottom-0 top-60" style="width:80px" src="../assets/images/LogoSVG.svg" alt="logo de l'hostellerie">
            </div>
            <div class="flip-card-back">
               <div class="bg-[#E6B34B] text-[#272023] flex justify-start pl-4 w-3/4">{{ title }}</div>
                <div class="text-white ">{{ description }}</div>

                <div v-if="showPrice" class="bg-[#E6B34B] text-[#272023] flex justify-end pr-4 w-2/4">- {{ price }} € </div>
            </div>
        </div>
    </div>

</template>

<script>

export default {
    name: 'Card',
    props: {
        title: String,
        description: String,
        price: Number,
        showPrice: Boolean,
        image: String
    },
}
</script>

<style scoped>

.flip-card {
    font-family: 'Radley', serif;
    width: 200px;
    height: 300px;
    perspective: 1000px;
    animation: fadein ease-in-out 1.5s;
}
@keyframes fadein {
    0% {
    opacity:0;
    }
    100% {
    opacity:1;
    }
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
    border: 1px solid #E6B34B;
}

.flip-card-front {
    background-color: white;
    color: #272023;
    height: 350px;
}

.flip-card-back {
    background-color: #272023;
    color: white;
    transform: rotateY(180deg);
    width: 200px;
    height: 350px;
    box-shadow: 4px 4px 4px gray;
    display: flex;
    flex-direction: column;
    justify-content: space-around;
}

</style>
