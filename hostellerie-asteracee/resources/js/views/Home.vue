<template>
    <div class="home">
        <Hero />
        <Rooms />
        <Services />
        <News />
        <Reviews />
        <Footer />
    </div>
</template>

<script>
import Hero from '../components/Hero.vue';
import Rooms from '../components/Rooms.vue';
import Services from '../components/Services.vue';
import News from '../components/News.vue';
import Reviews from '../components/Reviews.vue';
import Footer from '../subComponents/Footer.vue';
export default {
    name: 'Home',
    components: {
        Hero,
        Rooms,
        Services,
        News,
        Reviews,
        Footer
    }
}
</script>

<style >
@import url('https://fonts.googleapis.com/css2?family=Radley&display=swap');
</style>
