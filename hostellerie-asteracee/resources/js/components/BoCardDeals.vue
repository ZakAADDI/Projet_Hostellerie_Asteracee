<template>
    <span class="border-4 border-[#D2BD4D] p-2 h-64 my-2 flex flex-col w-1/4 justify-around items-center">
                <div class="properties">
                    <p>Titre de l'offre :{{ dealProps.title}}</p>
                    <p>Description {{ dealProps.content }}</p>
                    <p>En cours de validité : </p><p v-html="getStatus"></p>
                </div>
                <div class="mx-2">
                    <button type="button" class="border-2 border-gray bg-gray-200 p-2 rounded-lg mx-2" @click="modifyElement">Modifier</button>
                    <button type="button" class="border-2 border-gray bg-red-200 p-2 rounded-lg mx-2" v-on:click="deleteElement">Supprimer</button>
                </div>
            </span>
</template>

<script>

export default {
    name: 'BoCardDeals',
    props: {
        dealProps : Object
    },
    methods:{
        modifyElement :function(event){
            event.preventDefault();
            console.log('Offre à modifier avec id = ' + this.dealProps.id)
        },
        deleteElement: function(event){
            event.preventDefault();
            console.log('Offre à supprimer avec id = ' + this.dealProps.id)
        }
    },
    computed:{
        getStatus(){
            if(this.dealProps.is_active == 1){
                return "Oui";
            }else{
                return "Non";
            }
        }
    }
}
</script>

<style scoped>

</style>
