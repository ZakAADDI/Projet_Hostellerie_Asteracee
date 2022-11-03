<template>
    <div class="flip-card">
        <div class="flip-card-inner">
            <div class="flip-card-front">
                <img src="https://www.atoutnautic.fr/wp-content/uploads/2020/05/paddle-lac-annecy.jpg" alt="le lac">
                <h4>Deluxe</h4>
                <p>logo artichaut</p>
            </div>
            <div class="flip-card-back">
                <h1>Le Lac</h1>
                <p>bla bla bla</p>
                <p>entre lac et montagne</p>
            </div>
        </div>
    </div>

</template>

<script>

export default {
    name: 'Card',

}
</script>

<style scoped>
.flip-card {
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
}

img {
    width: 200px;
}
</style>
