<template>
    <span class="border-4 border-[#E6B34B] p-2 h-52 my-2 flex flex-col w-1/4 justify-around items-center">
                <div class="properties">
                    <p>Type de chambre :{{ roomProps.type}}</p>
                    <p>Prix : {{ roomProps.price }}€</p>
                    <p>Capacité d'accueil : {{ roomProps.capacity }} pers.</p>
                </div>

                <!-- <div class="displayImg h-36 w-36 object-contain">
                    <img :src="getImage" alt="" class="">
                </div> -->

                <div class="mx-2">
                    <button type="button" class="border-2 border-gray bg-gray-200 p-2 rounded-lg mx-2" @click="modifyElement">Modifier</button>
                    <button type="button" class="border-2 border-gray bg-red-200 p-2 rounded-lg mx-2" v-on:click="deleteElement">Supprimer</button>
                </div>
            </span>
</template>

<script>

export default {
    name: 'BoCardRooms',
    props: {
        roomProps : Object
    },
    methods:{
        modifyElement :function(event){
            event.preventDefault();
            console.log('Chambre à modifier avec id = ' + this.roomProps.id)
        },
        deleteElement: function(event){
            event.preventDefault();
            console.log('Chambre à supprimer avec id = ' + this.roomProps.id)
        }
    },
//     computed: {
//         getImage() {
//         if (this.roomProps) {
//               return this.roomProps.media.data['url'];
//             } else {
//             return "https://media.istockphoto.com/vectors/no-image-vector-symbol-missing-available-icon-no-gallery-for-this-vector-id1128826884?k=20&m=1128826884&s=612x612&w=0&h=3GMtsYpW6jmRY9L47CwA-Ou0yYIc5BXRQZmcc81MT78=";
//         }
//     },
// }
}
</script>

<style scoped>

</style>
