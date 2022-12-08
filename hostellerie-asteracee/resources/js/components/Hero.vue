<template>
    <div class="hero shadow-md shadow-gray-700 flex flex-col justify-center bg-[#E6B34B] mb-12 mx-auto">
        <div class="media flex justify-around mt-8">
            <img class="leftImg shadow-md shadow-gray-700 mt-40 absolute"  :src=leftImg :alt=leftImgAlt>
            <div class="video bg-[#272023] flex flex-col text-white justify-center items-center">
                <iframe class="mt-6 aspect-square" width="650" height="365" :src=centerMedia  frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen style="position: absolute; z-index: 1;"></iframe>
                <p class="text-center">{{ hero.text }}</p>
            </div>

            <img class="rightImg shadow-md shadow-gray-700 mt-40 absolute" :src=rightImg :alt=rightImgAlt>
        </div>
        
    </div>
</template>

<script>
import axiosProvider from "../services/axiosConfigProvider"
export default {
    name: 'Hero',

    data(){
        return{
            hero : [],
            leftImg : '',
            leftImgAlt : '',
            rightImg : '',
            rightImgAlt : '',
            centerMedia: ''
        }
    },
    async created(){
        this.hero = (await axiosProvider.get('/hero'))?.data;

        this.leftImg = this.hero.left_img;
        this.leftImgAlt = this.hero.left_img_alt;

        this.rightImg = this.hero.right_img;
        this.rightImgAlt = this.hero.right_img_alt;

        this.centerMedia = this.hero.center_media;
    }
}
</script>

<style scoped>

.hero{
    height: 600px;
    width: 60vw;
    margin-left: 20vw;
    margin-right: 20vw;
    animation: fadein ease-in-out 0.8s;
}
@keyframes fadein {
    0% {
    opacity:0;
    }
    100% {
    opacity:1;
    }
}
.rightImg, .leftImg{
    height: 400px;
}
.video{
    width: 50vw;
    margin-top: -10rem;
}
p{
    margin-top: 28rem;
}
.rightImg{
        display: none;

    }
.leftImg{
        display: none;
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

}
@media screen and (min-width: 1200px) {
    .rightImg{
        display: none;
    }
    .leftImg{
        display: none;
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

}
</style>

