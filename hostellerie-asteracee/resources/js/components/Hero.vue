<template>
    <div class="hero shadow-md shadow-gray-700">
        <div class="media">
            <img class="leftImg shadow-md shadow-gray-700"  :src=leftImg :alt=leftImgAlt>
            <div class="video">
                <iframe width="650" height="365" :src=centerMedia  frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen style="position: absolute; z-index: 1;"></iframe>
                <p>{{ hero.text }}</p>
            </div>

            <img class="rightImg shadow-md shadow-gray-700" :src=rightImg :alt=rightImgAlt>
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


@import url('https://fonts.googleapis.com/css2?family=Radley&display=swap');

.hero{
    font-family: 'Radley', serif;

    display: flex;
    justify-content: center;
    flex-direction: column;
    background-color: #E6B34B;
    height: 600px;
    width: 60vw;
    margin-left: 20vw;
    margin-right: 20vw;
    box-shadow: 4px 4px lightyellow;
    margin-bottom: 3rem;
}
.media{
    display: flex;
    justify-content: space-around;
    margin-top: 2rem;
}

.rightImg, .leftImg{
    height: 400px;
    margin-top: 10rem;
    position: absolute;
}
.video{
    background-color: #272023;
    height: 170%;
    width: 50vw;
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: -10rem;
    flex-direction: column;
    color: white;
}
p{
    margin-top: 28rem;
}
.logo{
    position: absolute;
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

