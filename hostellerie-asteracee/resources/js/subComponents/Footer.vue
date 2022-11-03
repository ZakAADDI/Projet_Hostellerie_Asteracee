<template>
    <div class="footer">
        <div class="section1">
            <div class="location">
                <img class="imagesIcones" src="../assets/images/icones/location.svg" alt="icone de localisation">
                <p>25 quai du lac - 74 000 Annecy</p>
            </div>

            <div class="siteMapp">
                <h5>Plan du site</h5>
                <a href="*">Accueil</a>
                <a href="*">Nos chambres</a>
                <a href="*">Nos Services</a>
                <a href="*">Nos Nouveautés</a>
            </div>
        </div>
        <div class="section2">
            <div class="phone">
                <img class="imagesIcones" src="../assets/images/icones/phone.svg" alt="icone de téléphone">
                <p>+334 56 56 56 56</p>
            </div>

            <img class="rosace" src="../assets/images/Frame231.svg" alt="décoration">
        </div>
        <div class="section3">
            <div class="email">
                 <img class="imagesIcones" src="../assets/images/icones/email.svg" alt="icone de mail">
                <p>email@email.fr</p>
            </div>
            <div class="socialNetwork">
                <img src="../assets/images/icones/facebook.svg" alt="facebook">
                <img src="../assets/images/icones/instagram.svg" alt="instagram">
                <img src="../assets/images/icones/twitter.svg" alt="twitter">
            </div>

        </div>
    </div>
</template>

<script>

export default {
    name: 'Footer'
}
</script>

<style scoped>
.footer {
    width: 100vw;
    height: auto;
    background-color: black;
    display: flex;
    justify-content: center;
}
a {
    color: white;
    transition-duration: 0.9s;
    margin-right: 2rem;
}

a:hover {
    color: #D2BD4D;
    transition-duration: 0.9s, 0.9s;
}
p{
    color: white;
}
.section1, .section2{
    border-right: 3px solid #D2BD4D;
}
.section1{
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    width: calc(100vw / 3);
}
.section2{
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    align-items: center;
    width: calc(100vw /3);
}
.section3{
    display: flex;
    flex-direction: column;
    width: calc(100vw/3);
    align-items: center;
}
.siteMapp{
    display: flex;
    flex-direction: column;
}

.imagesIcones{
    width: 20px;
    height: 20px;
}
.rosace{
    width: 200px;
    position: relative;
}
.socialNetwork{
    display: flex;
    justify-content: space-between;
    width: 50%;
    margin-left: auto;
    margin-right: auto;
}
.socialNetwork img{
    width: 40px;
}
.email, .phone, .location{
    display: flex;
    margin: 0.5rem;
}
.email p, .phone p, .location p{
    margin-left: 0.5rem;
}
</style>
