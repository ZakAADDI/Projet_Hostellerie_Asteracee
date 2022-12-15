<template>
    <div class="home">
        <Hero />
        <BookingBanner />
        <Separator />
        <Rooms />
        <DealsBanner/>
        <Separator />
        <Services />
        <Separator />
        <News />
        <Separator />
        <BannerTitle />
        <Reviews />
        <Prestations />
    </div>
</template>

<script>
import Separator from '../subComponents/Separator.vue'
import Hero from '../components/Hero.vue'
import Rooms from '../components/Rooms.vue'
import Services from '../components/Services.vue'
import News from '../components/News.vue'
import Reviews from '../components/Reviews.vue'
import DealsBanner from '../subComponents/DealsBanner.vue'
import BookingBanner from '../components/BookingBanner.vue'
import Prestations from '../subComponents/Prestations.vue'
import BannerTitle from '../subComponents/BannerTitle.vue'
export default {
    name: 'Home',
    components: {
    Separator,
    Hero,
    Rooms,
    Services,
    News,
    Reviews,
    DealsBanner,
    BookingBanner,
    Prestations,
    BannerTitle
}
}
 // On page load or when changing themes, best to add inline in `head` to avoid FOUC
 if (localStorage.getItem('color-theme') === 'light' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: light)').matches)) {
        document.documentElement.classList.add('light');
    } else {
        document.documentElement.classList.remove('light')
    }
</script>

<style scoped>
.home{
     animation: fadein ease-in-out 0.5s;
}
@keyframes fadein {
    0% {
    opacity:0;
    }
    100% {
    opacity:1;
    }
  }
</style>
