<template>
    <section class="bg-white light:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6 backgroundDiv" >
            <div class="mx-auto max-w-screen-md text-center mb-8 lg:mb-12">
                <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 light:text-white">Our Rooms</h2>
            </div>
            <div class="space-y-8 lg:grid lg:grid-cols-3 sm:gap-6 xl:gap-10 lg:space-y-0 bg-black">

                <div
                    class="flex flex-col p-6 mx-auto max-w-lg bg-black rounded-lg xl:p-8 light:bg-gray-800 light:text-white flip-card">

                    <div class="flip-card-inner">
                        <div class="flip-card-front">
                            <img src="https://www.atoutnautic.fr/wp-content/uploads/2020/05/paddle-lac-annecy.jpg"
                                alt="le lac">
                            <div class="spanType">
                                <span>Deluxe</span>
                            </div>

                            <img class="logo" src="../assets/images/LogoSVG.svg" alt="logo de l'hostellerie">
                        </div>
                        <div class="flip-card-back">
                            <div class="type">Deluxe</div>
                            <div class="content">Bla bla bla</div>
                            <div class="price">140 € - </div>
                        </div>
                    </div>

                </div>

                <div
                    class="flex flex-col p-6 mx-auto max-w-lg bg-black rounded-lg xl:p-8 light:bg-gray-800 light:text-white flip-card">

                    <div class="flip-card-inner">
                        <div class="flip-card-front">
                            <img src="https://www.atoutnautic.fr/wp-content/uploads/2020/05/paddle-lac-annecy.jpg"
                                alt="le lac">
                            <div class="spanType">
                                <span>Deluxe</span>
                            </div>

                            <img class="logo" src="../assets/images/LogoSVG.svg" alt="logo de l'hostellerie">
                        </div>
                        <div class="flip-card-back">
                            <div class="type">Deluxe</div>
                            <div class="content">Bla bla bla</div>
                            <div class="price">140 € - </div>
                        </div>
                    </div>

                </div>

                <div
                    class="flex flex-col p-6 mx-auto max-w-lg bg-black rounded-lg xl:p-8 light:bg-gray-800 light:text-white flip-card">

                    <div class="flip-card-inner">
                        <div class="flip-card-front">
                            <img src="https://www.atoutnautic.fr/wp-content/uploads/2020/05/paddle-lac-annecy.jpg"
                                alt="le lac">
                            <div class="spanType">
                                <span>Deluxe</span>
                            </div>

                            <img class="logo" src="../assets/images/LogoSVG.svg" alt="logo de l'hostellerie">
                        </div>
                        <div class="flip-card-back">
                            <div class="type">Deluxe</div>
                            <div class="content">Bla bla bla</div>
                            <div class="price">140 € - </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
</template>

<script>
export default {
    name: 'Rooms',
    components: {
    }
}
</script>

<style scoped>
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
    width: 200px;
    height: 350px;
    backface-visibility: hidden;
    border: 1px solid #D2BD4D;
}

.flip-card-front {
    background-color: white;
    color: black;
    width: 200px;
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
    width: 100%;
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
</style>
