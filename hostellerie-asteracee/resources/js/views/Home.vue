<template>
    <div class="home">
        <Hero />
        <Rooms />
        <Separator />
        <Services />
        <Separator />
        <News />
        <Separator />
        <Reviews />
    </div>
</template>

<script>
import Separator from '../subComponents/Separator.vue'
import Hero from '../components/Hero.vue'
import Rooms from '../components/Rooms.vue'
import Services from '../components/Services.vue'
import News from '../components/News.vue'
import Reviews from '../components/Reviews.vue'
export default {
    name: 'Home',
    components: {
        Separator,
        Hero,
        Rooms,
        Services,
        News,
        Reviews,
    }
}
 // On page load or when changing themes, best to add inline in `head` to avoid FOUC
 if (localStorage.getItem('color-theme') === 'light' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: light)').matches)) {
        document.documentElement.classList.add('light');
    } else {
        document.documentElement.classList.remove('light')
    }
</script>

<style >


</style>
