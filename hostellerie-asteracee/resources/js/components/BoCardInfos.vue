<template>
    <span class="border-4 border-[#D2BD4D] p-2 h-80 my-2 flex flex-col w-1/4 justify-around items-center">
                <div class="properties">
                    <p>Titre de la news :{{ infoProps.title}}</p>
                    <p>Description {{ infoProps.content }}</p>
                </div>
                <div class="mx-2">
                    <button type="button" class="border-2 border-gray bg-gray-200 p-2 rounded-lg mx-2" @click="modifyElement">Modifier</button>
                    <button type="button" class="border-2 border-gray bg-red-200 p-2 rounded-lg mx-2" v-on:click="deleteElement">Supprimer</button>
                </div>
            </span>
</template>

<script>

export default {
    name: 'BoCardInfos',
    props: {
        infoProps : Object
    },
    methods:{
        modifyElement :function(event){
            event.preventDefault();
            console.log('Offre à modifier avec id = ' + this.infoProps.id)
        },
        deleteElement: function(event){
            event.preventDefault();
            console.log('Offre à supprimer avec id = ' + this.infoProps.id)
        }
    }
}
</script>

<style scoped>

</style>
