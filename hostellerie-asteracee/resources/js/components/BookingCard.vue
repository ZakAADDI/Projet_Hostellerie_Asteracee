<template>
    <div class="flip-card mb-16" :class="{'gray' : roomStatus === 'ended'}" >
        <div class="flip-card-inner">
            <div class="flip-card-front shadow-md shadow-gray-200 relative">
                <img style="width:300px;height:270px;" :src=roomImg.media_url>

                <div class="pt-8">
                    <span>{{ startingDate }} - {{ endingDate }}</span>
                    <img class="separator" src="../assets/images/Frame226.svg" alt="">

                </div>

                <!-- <img class="absolute ml-16 bottom-0 top-60" style="width:80px" src="../assets/images/LogoSVG.svg" alt="logo de l'hostellerie"> -->
            </div>
            <div class="flip-card-back">
               <div class="bg-[#E6B34B] text-[#272023] flex justify-start pl-4 w-3/4">{{ startingDate }} - {{ endingDate }}</div>
               <div>{{ roomDescription.description }}</div>
                <div class="text-white ">total price {{ totalPrice }}€</div>

                <span v-if="status" class="modifyDelete">
                            <button @click="updateBooking">
                                <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg" class="modify">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M22.9393 0.43934C23.5251 -0.146447 24.4749 -0.146447 25.0607 0.43934L29.5607 4.93934C30.1464 5.52513 30.1464 6.47487 29.5607 7.06066L14.5607 22.0607C14.2794 22.342 13.8978 22.5 13.5 22.5H9C8.17157 22.5 7.5 21.8284 7.5 21V16.5C7.5 16.1022 7.65804 15.7206 7.93934 15.4393L22.9393 0.43934ZM10.5 17.1213V19.5H12.8787L26.3787 6L24 3.62132L10.5 17.1213ZM0 7.5C0 5.84315 1.34315 4.5 3 4.5H10.5C11.3284 4.5 12 5.17157 12 6C12 6.82843 11.3284 7.5 10.5 7.5H3V27H22.5V19.5C22.5 18.6716 23.1716 18 24 18C24.8284 18 25.5 18.6716 25.5 19.5V27C25.5 28.6569 24.1569 30 22.5 30H3C1.34315 30 0 28.6569 0 27V7.5Z" fill="white"/>
                                </svg>
                            </button>
                            <button @click="deleteBooking">
                                <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg" class="delete">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M7.5 3C7.5 1.34315 8.84315 0 10.5 0H19.5C21.1569 0 22.5 1.34315 22.5 3V6H25.4845C25.4938 5.99991 25.5031 5.99991 25.5124 6H28.5C29.3284 6 30 6.67157 30 7.5C30 8.32843 29.3284 9 28.5 9H26.8967L25.5957 27.2137C25.4836 28.7837 24.1772 30 22.6033 30H7.39668C5.82276 30 4.51644 28.7837 4.4043 27.2137L3.10332 9H1.5C0.671573 9 0 8.32843 0 7.5C0 6.67157 0.671573 6 1.5 6H4.48762C4.49692 5.99991 4.50621 5.99991 4.51548 6H7.5V3ZM10.5 6H19.5V3H10.5V6ZM6.11096 9L7.39668 27H22.6033L23.889 9H6.11096ZM12 12C12.8284 12 13.5 12.6716 13.5 13.5V22.5C13.5 23.3284 12.8284 24 12 24C11.1716 24 10.5 23.3284 10.5 22.5V13.5C10.5 12.6716 11.1716 12 12 12ZM18 12C18.8284 12 19.5 12.6716 19.5 13.5V22.5C19.5 23.3284 18.8284 24 18 24C17.1716 24 16.5 23.3284 16.5 22.5V13.5C16.5 12.6716 17.1716 12 18 12Z" fill="red"/>
                                </svg>
                            </button>
                        </span>
            </div>
        </div>
    </div>


</template>

<script>
export default {
    name: 'BookingCard',
    props: {
        startingDate: String,
        endingDate: String,
        totalPrice: Number,
        roomStatus: String,
        roomImg: Object,
        roomDescription: Object,
        bookingId: Number
    },created(){
        this.bookingStatus=this.$route.query.userBookings;
    },
    computed:{
        status(){
        if(this.bookingStatus == 'running'){
            return true;
        }else{
            return false;
        }
        }
    },
    methods:{
        updateBooking(){
            console.log('update ' + this.bookingId + ' ?')
        },
        deleteBooking(){
            console.log('delete ' + this.bookingId + ' ?')
        }
    }


}
</script>

<style scoped>

.flip-card {
    font-family: 'Radley', serif;
    width: 300px;
    height: 300px;
    perspective: 1000px;
    animation: fadein ease-in-out 1.5s;
}
@keyframes fadein {
    0% {
    opacity:0;
    }
    100% {
    opacity:1;
    }
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
    border: 1px solid #E6B34B;
}

.flip-card-front {
    background-color: white;
    color: #272023;
    height: 350px;
    width: 300px;
}

.flip-card-back {
    background-color: #272023;
    color: white;
    transform: rotateY(180deg);
    width: 300px;
    height: 350px;
    box-shadow: 4px 4px 4px gray;
    display: flex;
    flex-direction: column;
    justify-content: space-around;
}
.gray{
    filter: grayscale(1);
}

.modifyDelete{
    position: absolute;
    bottom: 0;
    display: flex;
    justify-content: space-between;
    width: 100%;
}
.modify{
    margin-left: 1rem;
    margin-bottom: 1rem;
}
.delete{
    margin-left: 7rem;
    margin-right: 1rem;
}
.separator{
    width: 80px;
    position: relative;
    top: -56px;
    margin-left: auto;
    margin-right: auto;
}
</style>
