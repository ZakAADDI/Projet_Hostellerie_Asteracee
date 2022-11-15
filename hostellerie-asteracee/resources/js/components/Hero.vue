<template>
    <div class="hero">
        <div class="media">
            <img class="leftImg" :src=leftImg :alt=leftAlt>
            <div class="video">
                <iframe width="650" height="365" src="https://www.youtube.com/embed/-B7VhYjd6xc" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen style="position: absolute; z-index: 1;"></iframe>
                <p v-if="language">{{ hero.text_fr}}</p>
                <p v-if="!language">{{ hero.text_en}}</p>
            </div>

            <img class="rightImg" :src=rightImg :alt=rightAlt>
        </div>
    </div>
</template>

<script>
import storage from '../store/index';
import axios from 'axios'
export default {
    name: 'Hero',

    data(){
        return{
            hero : [],
            leftImg : '',
            rightImg : '',
            centerImg : '',
            leftAlt : '',
            rightAlt : '',
            centerAlt : ''
        }
    },
    computed: {
        language() {
            const language = storage.get("language");
            return language === "fr";
        },
    },
    async mounted(){
        const baseUri = 'http://127.0.0.1:8000/api';
        this.response = await axios.get(baseUri + '/heroes');
        this.hero = this.response.data
        this.leftImg = this.hero.left_media.url
        this.rightImg = this.hero.right_media.url
        this.leftAlt = this.hero.left_media.alt
        this.leftAlt = this.hero.right_media.alt
        console.log(this.leftImg);
        console.log(this.rightImg)
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
    height: 155%;
    width: 50vw;
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

