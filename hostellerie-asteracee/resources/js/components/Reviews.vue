<template>
    <div class="reviews">
        <input type="radio" name="position" />
        <input type="radio" name="position" />
        <input type="radio" name="position" checked />
        <input type="radio" name="position" />
        <input type="radio" name="position" />
        <main id="carousel">
            <div class="item">
                <span class="user"><img src="https://cdn3.iconfinder.com/data/icons/business-avatar-1/512/3_avatar-512.png" alt="" style="width: 60px;"><p>Nom Prénom</p></span>
                <p>Date</p>
                <p>Score</p>
                <p>Content</p>
                <p>Logo</p>
            </div>
            <div class="item">
                <span class="user"><img src="https://cdn3.iconfinder.com/data/icons/business-avatar-1/512/3_avatar-512.png" alt="" style="width: 60px;"><p>Nom Prénom</p></span>
                <p>Date</p>
                <p>Score</p>
                <p>Content</p>
                <p>Logo</p>
            </div>
            <div class="item">
                <span class="user"><img src="https://cdn3.iconfinder.com/data/icons/business-avatar-1/512/3_avatar-512.png" alt="" style="width: 60px;"><p>Nom Prénom</p></span>
                <p>Date</p>
                <p>Score</p>
                <p>Content</p>
                <p>Logo</p>
            </div>
            <div class="item">
                <span class="user"><img src="https://cdn3.iconfinder.com/data/icons/business-avatar-1/512/3_avatar-512.png" alt="" style="width: 60px;"><p>Nom Prénom</p></span>
                <p>Date</p>
                <p>Score</p>
                <p>Content</p>
                <p>Logo</p>
            </div>
            <div class="item">
                <span class="user"><img src="https://cdn3.iconfinder.com/data/icons/business-avatar-1/512/3_avatar-512.png" alt="" style="width: 60px;"><p>Nom Prénom</p></span>
                <p>Date</p>
                <p>Score</p>
                <p>Content</p>
                <p>Logo</p>
            </div>
            <div class="item">
                <span class="user"><img src="https://cdn3.iconfinder.com/data/icons/business-avatar-1/512/3_avatar-512.png" alt="" style="width: 60px;"><p>Nom Prénom</p></span>
                <p>Date</p>
                <p>Score</p>
                <p>Content</p>
                <p>Logo</p>
            </div>
        </main>
    </div>
</template>

<script>
export default {
    name: 'Reviews',
    components: {
    },
    created(){

    },
    methods: {

    },
    computed: {
    }
}
</script>

<style scoped>

.reviews{
    width: 80vw;
    margin-left: auto;
    margin-right: auto;
    border: 3px solid #D2BD4D;
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
  height: 250px;
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
  border: 2px solid #D2BD4D;
}
div.item:nth-of-type(2) {
  --offset: 2;
  background-color: white;
  border: 2px solid #D2BD4D;
}
div.item:nth-of-type(3) {
  --offset: 3;
  background-color: white;
  border: 2px solid #D2BD4D;
}
div.item:nth-of-type(4) {
  --offset: 4;
  background-color: white;
  border: 2px solid #D2BD4D;
}
div.item:nth-of-type(5) {
  --offset: 5;
  background-color: white;
  border: 2px solid #D2BD4D;
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
