<template>
    <div class="confirmUserIdentity flex flex-col grow mt-28 lg:mt-0">
            <span class="text-center lg:mt-28">Etape 4 : Confirmation de votre identité</span>
        <div class="flex mb-6 w-screen justify-center items-center">
            <div class="cercleOk"></div>
                <div class="smCercleOk"></div>
                <div class="smCercleOk"></div>
                <div class="smCercleOk"></div>
            <div class="cercleOk"></div>
                <div class="smCercleOk"></div>
                <div class="smCercleOk"></div>
                <div class="smCercleOk"></div>
            <div class="cercleOk"></div>
                <div class="smCercleOk"></div>
                <div class="smCercleOk"></div>
                <div class="smCercleOk"></div>
            <div class="cercle"></div>
                <div class="smCercle"></div>
                <div class="smCercle"></div>
                <div class="smCercle"></div>
            <div class="cercle"></div>
        </div>
        <div class="bg-[#272023] text-white flex flex-col justify-center items-center mx-6 text-center  lg:justify-end lg:w-1/3 lg:mx-auto lg:pb-6 p-2 border-t-4 border-t-[#E6B34B]">
            <span class="text-[#E6B34B] text-2xl">Votre séjour :</span>
            <span>Du {{ userChoice.startingDate }} au {{ userChoice.endingDate }}</span>
            <span>soit {{ userChoice.nbrOfDays }} jours</span>
            <span>Pour {{ userChoice.occupants }} pers.</span>
            <span class="text-2xl">soit {{ total_room_price }} € ttc.</span>
            <button class="bg-[#E6B34B] p-2 rounded-md text-[#272023] mx-2 my-2">Modifier</button>
        </div>
        <div class="border-4 border-[#E6B34B] bg-[#272023] text-white flex flex-col justify-center items-center mt-6 mx-6 lg:w-1/3 lg:mx-auto">
            <span class="text-[#E6B34B] text-2xl">Votre chambre :</span>
            <span>{{ cartRoom.roomName}}</span>
            <span>Prix : {{ cartRoom.roomPrice}} €/nuits/pers</span>
            <button class="bg-[#E6B34B] p-2 rounded-md text-[#272023] mx-2 my-2">Modifier</button>
        </div>

        <div class="border-4 border-[#E6B34B] bg-[#272023] text-white flex flex-col justify-center items-center mt-6 mx-6 lg:w-1/3 lg:mx-auto">
            <span class="text-[#E6B34B] text-2xl">Vos options :</span>
            <div class="flex flex-col items-center">
                <div v-for="option in options" :key=option.id>
                    <span>- {{ option.name }}</span>
                    <span> - {{ option.price }} €
                            <span v-if="option.type ===     'daily'">/jour</span>
                            <span v-if="option.type ===     'weekly'">/semaine</span>
                            <span v-if="option.type === 'stay'">/   sejour</span>
                    </span>

                </div>
                <span class="text-2xl">soit {{ total_options_price }} € ttc.</span>
                <button class="bg-[#E6B34B] p-2 rounded-md text-[#272023] mx-2 my-2">Modifier</button>
            </div>
        </div>

        <div class="border-4 border-[#E6B34B] bg-[#272023] text-white flex flex-col justify-center items-center mt-6 mx-6 lg:w-1/2 lg:mx-auto">
            <span class="text-[#E6B34B] text-2xl">Vos informations :</span>
            <span>Civilité : {{ currentUser.gender}}</span>
            <span>Nom : {{ currentUser.lastname}}</span>
            <span>Prénom : {{ currentUser.firstname}}</span>
            <span>Adresse : {{ currentUser.address }}</span>
            <span>Email : {{ currentUser.email }}</span>
            <button class="bg-[#E6B34B] p-2 rounded-md text-[#272023] mx-2 my-2">Modifier</button>
        </div>
        <div class="flex justify-center items-center">
            <button class="bg-[#E6B34B] p-4 rounded-md text-[#272023] mx-6" @click="submitBooking">Réserver</button>
            <button type="submit" class="bg-red-500 p-4 rounded-md text-[#272023] mx-6 my-4" @click="removeData">Annuler</button>
        </div>

    </div>
</template>

<script>
import localStorage from '../services/localStorageProvider'
import axiosProvider from '../services/axiosConfigProvider'
export default {
    name: 'confirmUserIdentity',
    data(){
        return{
            userChoice: Object,
            cartRoom: Object,
            cartOptions: Object,
            currentUser : Object,
            total_room_price: Number
        }
    },
    components:{
    },
    async created(){
        this.userChoice = localStorage.get("userChoice");
        this.cartRoom = localStorage.get("cartRoom");
        this.cartOptions = localStorage.get("cartOptions");
        this.total_room_price = localStorage.get("total_room_price");
        this.total_options_price = localStorage.get("total_options_price");
        this.options = this.cartOptions.options;
        this.userToken = localStorage.get("user")[1];
        this.body =
            {
                "token":this.userToken
            }
        this.currentUser = (await axiosProvider.postWithOutAuth('/findUser',this.body))?.data;
    },
    methods:{
        submitBooking(){
            this.$router.push({ name : 'RecapOrder'});
        },
        removeData(event){
            event.preventDefault;
            localStorage.unset("userChoice");
            localStorage.unset("cartRoom");
            localStorage.unset("cartOptions");
            this.$router.push({ name: 'Home'});
        }
    }
}
</script>

<style scoped>
.cercle{
    margin-right: 10px;
    margin-left: 10px;
    height: 2rem;
    width: 20px;
    height: 20px;
    border-radius: 20px;
    background: #272023;
}
.cercleOk{
    margin-right: 10px;
    margin-left: 10px;
    height: 2rem;
    width: 20px;
    height: 20px;
    border-radius: 20px;
    background: #E6B34B;
}
.smCercle{
    margin-right: 5px;
    margin-left: 5px;
    height: 2rem;
    width: 5px;
    height: 5px;
    border-radius: 20px;
    background: #272023;
}
.smCercleOk{
    margin-right: 5px;
    margin-left: 5px;
    height: 2rem;
    width: 5px;
    height: 5px;
    border-radius: 20px;
    background: #E6B34B;
}
.confirmUserIdentity{
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
