<template>
    <section class="bg-white light:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6 backgroundDiv shadow-md shadow-gray-700" >
            <div class="mx-auto max-w-screen-md text-center mb-8 lg:mb-12">
                <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-[#272023] light:text-white">{{ this.section }}</h2>

            </div>
            <div class="space-y-8 lg:grid lg:grid-cols-3 sm:gap-6 xl:gap-10 lg:space-y-0 bg-[#272023]" >


                <div
                    v-for="room in rooms" :key=room.id
                    class="flex flex-col p-6 mx-auto max-w-lg xl:p-8 light:bg-gray-800 light:text-white flip-card">
                    <Card
                    :showPrice="true"
                    :image="room.media_url"
                    :alt="room.media_alt"
                    :title="room.type"
                    :price="room.price"
                    :description="room.description"/>
                </div>

            </div>
        </div>
    </section>
</template>

<script>
import axiosProvider from "../services/axiosConfigProvider"
import Card from '../components/Card.vue'
export default {
    name: 'Rooms',
    components: {
        Card
    },
    data(){
        return {
            section: '',
            rooms: []
        }
    },
    async created(){
        this.rooms = (await axiosProvider.get('/rooms'))?.data;
        console.log(this.rooms);
        this.section = this.rooms[0].section;
    }
}
</script>

<style scoped>
.space-y-8>.p-6{
    margin-bottom: 5rem;
    padding: 0;
}
.lg\:grid-cols-3{
    padding-top: 2rem;

}
.lg\:grid-cols-3[data-v-d87a50c6] {
    width: auto;
}
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
    border: 1px solid #E6B34B;
}

.flip-card-front {
    background-color: white;
    color: #272023;
    width: 200px;
    height: 350px;
    box-shadow: 4px 4px 4px gray;
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

.type {
    width: 50%;
    background-color: #E6B34B;
    color: #272023;
    display: flex;
    justify-content: flex-start;
    padding-left: 1rem;
}

.content {
    color: white;
}

.price {
    width: 50%;
    background-color: #E6B34B;
    color: #272023;
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
    background-color: #E6B34B;
    margin-bottom: 3rem;
}
</style>
