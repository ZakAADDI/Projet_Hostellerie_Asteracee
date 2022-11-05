<template>

    <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 light:text-white">Nouveautés</h2>
<div class="bg-black">
    <section class="flex flex-col items-center bg-white border shadow-md md:flex-row md:max-w-xl  backgroundNews">
        <img class="object-cover w-full h-96 md:h-auto md:w-48" src="https://media-cdn.tripadvisor.com/media/photo-m/1280/17/fa/4c/57/grand-deluxe-pool-villa.jpg" alt="">
        <div class="flex flex-col justify-between p-4 leading-normal">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Ouverture de la Piscine d'hiver</h5>
            <h2 class="mb-2 text-2x1 font-bold dark:text-white">le 22/10/2022</h2>
            <p class="mb-3 font-normal text-black">Ouverture de la piscine d'hiver, pour toute inscription,
                veuillez-vous renseigner à l'accueil de l'hostellerie</p>
        </div>
    </section>

    <section class="flex flex-col items-center bg-white border shadow-md md:flex-row md:max-w-xl  backgroundNews">

        <div class="flex flex-col justify-between p-4 leading-normal">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Travaux sur le Parking</h5>
            <h2 class="mb-2 text-2x1 font-bold dark:text-white">le 28/09/2022</h2>
            <p class="mb-3 font-normal text-black">Du 1/10/2022 au 15/11/2022, le parking sera en travaux pour améliorer votre sécurité au sein de notre établissement. Veuillez nous excuser pour la gène occasionnée</p>
        </div>
        <img class="object-cover w-full h-96 md:h-auto md:w-48" src="https://www.ville-rieumes.fr/wp-content/uploads/sites/1427/2021/03/travaux-voirie.png" alt="">
    </section>
</div>
</template>

<script>
export default {
    name: 'News',
    components: {
    }
}
</script>

<!-- <style scoped>
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

.type {
    width: 50%;
    background-color: #D2BD4D;
    color: black;
    display: flex;
    justify-content: flex-start;
    padding-left: 1rem;
}

.content {
    color: white;
}

.price {
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

.logo {
    width: 80px;
    margin-top: 3rem;
    margin-left: auto;
    margin-right: auto;
}

.spanType {
    padding-top: 2rem;
}
.lg\:grid-cols-3{
    width: 70vw;
    margin-left: auto;
    margin-right: auto;
}

.backgroundDiv{
    width: 80vw;
    background-color: #D2BD4D;
    margin-bottom: 3rem;
}

</style> -->
<style scoped>
.backgroundNews {
    background-color: #D2BD4D;
    margin-left: auto;
    margin-right: auto;
    margin-bottom: 2rem;
    margin-top: 2rem;
    border: 2px solid #D2BD4D;
}

img {
    width: 20vh;
}
.bg-black{
    width: 50vw;
    margin-left: auto;
    margin-right: auto;
    padding-top: 2rem;
    padding-bottom: 2rem;
    margin-bottom: 2rem;
}
.mb-4 {
    text-align: center;
    background-color: #D2BD4D;
    color: black;
    width: 80vw;
    height: 8rem;
    display: flex;
    justify-content: center;
    align-items: center;
    margin-left: auto;
    margin-right: auto;
}
</style>
