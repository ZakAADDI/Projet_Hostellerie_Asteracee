<template>
    <div class="reviews shadow-md shadow-gray-700">
        <input type="radio" name="position" />
        <input type="radio" name="position" />
        <input type="radio" name="position" checked />
        <input type="radio" name="position" />
        <input type="radio" name="position" />
        <main id="carousel">
            <div class="item" v-for="review in reviews" :key=review.id>
                <span class="user">
                <img v-if="isMale(review)" :src=maleImg.url alt="" style="width: 60px;">
                <img v-if="!isMale(review)" :src=femaleImg.url alt="" style="width: 60px;">

                <p>{{ review.user_firstname}} {{review.user_lastname}}</p></span>
                <p>{{ review.title }}</p>
                <span >
                    <span class="flex m-4" v-if="review.score == '1'">
                        <img src="../assets/images/starFull.png" alt="">
                        <img src="../assets/images/starEmpty.png" alt="">
                        <img src="../assets/images/starEmpty.png" alt="">
                        <img src="../assets/images/starEmpty.png" alt="">
                        <img src="../assets/images/starEmpty.png" alt="">
                    </span>
                    <span class="flex m-4" v-if="review.score == '2'">
                        <img src="../assets/images/starFull.png" alt="">
                        <img src="../assets/images/starFull.png" alt="">
                        <img src="../assets/images/starEmpty.png" alt="">
                        <img src="../assets/images/starEmpty.png" alt="">
                        <img src="../assets/images/starEmpty.png" alt="">
                    </span>
                    <span class="flex m-4" v-if="review.score == '3'">
                        <img src="../assets/images/starFull.png" alt="">
                        <img src="../assets/images/starFull.png" alt="">
                        <img src="../assets/images/starFull.png" alt="">
                        <img src="../assets/images/starEmpty.png" alt="">
                        <img src="../assets/images/starEmpty.png" alt="">
                    </span>
                    <span class="flex m-4" v-if="review.score == '4'">
                        <img src="../assets/images/starFull.png" alt="">
                        <img src="../assets/images/starFull.png" alt="">
                        <img src="../assets/images/starFull.png" alt="">
                        <img src="../assets/images/starFull.png" alt="">
                        <img src="../assets/images/starEmpty.png" alt="">
                    </span>
                    <span class="flex m-4" v-if="review.score == '5'">
                        <img src="../assets/images/starFull.png" alt="">
                        <img src="../assets/images/starFull.png" alt="">
                        <img src="../assets/images/starFull.png" alt="">
                        <img src="../assets/images/starFull.png" alt="">
                        <img src="../assets/images/starFull.png" alt="">
                    </span>

                </span>
                <p>{{ review.content }}</p>

            </div>

        </main>
    </div>
</template>

<script>
import axiosProvider from "../services/axiosConfigProvider"
export default {
    name: 'Reviews',
    components: {
    },
    data(){
        return{
            reviews: [],
            maleImg: Object,
            femaleImg: Object
        }
    },
    async created(){
        this.reviews = (await axiosProvider.get('/reviews'))?.data;
        this.displayImg = (await axiosProvider.get('/medias'))?.data;

        this.femaleImg = this.displayImg[12];
        this.maleImg = this.displayImg[13];
    },
    methods:{
        isMale(review){
            return review.gender == 'Male';
        }
    }
}
</script>

<style scoped>
img{
    width: 25px;
}

.reviews{
    width: 80vw;
    margin-left: auto;
    margin-right: auto;
    border: 3px solid #E6B34B;
    margin-bottom: 3rem;
    height: auto;
}

.user{
    display: flex;
    width: 100%;
    justify-content: flex-start;
    align-items: center;
    font-size: 1.5rem;
}
.user img{
    margin-right: 1rem;
}
div {
  height: 600px;
  margin: 0;
  display: grid;
  grid-template-rows: 500px 100px;
  grid-template-columns: 1fr 30px 30px 30px 30px 30px 1fr;
  align-items: center;
  justify-items: center;
}

main#carousel {
  grid-row: 1 / 2;
  grid-column: 1 / 8;
  width: 100%;
  height: 500px;
  display: flex;
  align-items: center;
  justify-content: center;
  overflow: hidden;
  transform-style: preserve-3d;
  perspective: 600px;
  --items: 5;
  --middle: 3;
  --position: 1;
  pointer-events: none;
}

div.item {
  position: absolute;
  width: 400px;
  height: 420px;
  --r: calc(var(--position) - var(--offset));
  --abs: max(calc(var(--r) * -1), var(--r));
  transition: all 0.25s linear;
  transform: rotateY(calc(-25deg * var(--r)))
    translateX(calc(-400px * var(--r)));
  z-index: calc((var(--position) - var(--abs)));
}
.item{
    display: flex;
    flex-direction: column;
    padding: 2rem;
}
div.item:nth-of-type(1) {
  --offset: 1;
  background-color: white;
  border: 2px solid #E6B34B;
}
div.item:nth-of-type(2) {
  --offset: 2;
  background-color: white;
  border: 2px solid #E6B34B;
}
div.item:nth-of-type(3) {
  --offset: 3;
  background-color: white;
  border: 2px solid #E6B34B;
}
div.item:nth-of-type(4) {
  --offset: 4;
  background-color: white;
  border: 2px solid #E6B34B;
}
div.item:nth-of-type(5) {
  --offset: 5;
  background-color: white;
  border: 2px solid #E6B34B;
}

input:nth-of-type(1) {
  grid-column: 2 / 3;
  grid-row: 2 / 3;
}
input:nth-of-type(1):checked ~ main#carousel {
  --position: 1;
}

input:nth-of-type(2) {
  grid-column: 3 / 4;
  grid-row: 2 / 3;
}
input:nth-of-type(2):checked ~ main#carousel {
  --position: 2;
}

input:nth-of-type(3) {
  grid-column: 4 /5;
  grid-row: 2 / 3;
}
input:nth-of-type(3):checked ~ main#carousel {
  --position: 3;
}

input:nth-of-type(4) {
  grid-column: 5 / 6;
  grid-row: 2 / 3;
}
input:nth-of-type(4):checked ~ main#carousel {
  --position: 4;
}

input:nth-of-type(5) {
  grid-column: 6 / 7;
  grid-row: 2 / 3;
}
input:nth-of-type(5):checked ~ main#carousel {
  --position: 5;
}

@media screen and (min-width: 576px) {

}
@media screen and (min-width: 768px) {

}
@media screen and (min-width: 992px) {


}
@media screen and (min-width: 1200px) {

}
@media screen and (min-width: 1400px) {

}
</style>
