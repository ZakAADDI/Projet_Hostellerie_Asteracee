<template>
    <div class="flex flex-col items-center justify-center grow text-center w-full mx-auto mt-[100px] mb-[100px]">
        <div class="mt-[40px]">
            <h1 class="text-[30px] font-bold">À propos de nous</h1>
        </div>

        <div class="mt-[40px]">
            <h1 class="text-[20px] font-bold">L’HOSTELLERIE OUVRE SES PORTES</h1> 
        </div>
        
        <hr class="h-[3px] w-[200px] bg-[#E6B34B]">
        <hr class="h-[3px] w-[150px] bg-[#E6B34B]">

        <p class="mt-[30px] text-[20px] w-[300px] sm:w-[500px] md:w-[750px] lg:w-[1000px]">À peine achevé, l'Hostellerie de l'Astéracée a ouvert ses portes le 13 Décembre 2022. <br> Les premiers invités sont subjugués par la découverte d’un hôtel haut de gamme, avec un style contemporain.</p>

        <div class="mt-[40px]">
            <h1 class="text-[20px] font-bold">QUI SOMMES-NOUS ?</h1> 
        </div>

        <hr class="h-[3px] w-[200px] bg-[#E6B34B]">
        <hr class="h-[3px] w-[150px] bg-[#E6B34B]">

        <div class="grid grid-cols-1 space-y-20 lg:grid-cols-3 lg:space-y-0 mt-[40px]">
            <div class="flex flex-col justify-center items-center">
                
                    <img src="../../../public/storage/images/IronMan.jpg" alt="" class="w-[150px] sm:w-[200px] md:w-[250px] lg:w-[300px] border-[2px] border-[#E6B34B] rounded-[50%]">
                
                    <h1 class="text-[25px] font-bold mt-7">Arthur RAYNAL</h1>
                    <hr class="h-[3px] w-[150px] bg-[#E6B34B]">

            </div>
            <div class="flex flex-col justify-center items-center lg:mx-4 xl:mx-10">
               
                    <img src="../../../public/storage/images/DocterStrange.jpg" alt="" class="w-[150px] sm:w-[200px] md:w-[250px] lg:w-[300px] border-[2px] border-[#E6B34B] rounded-[50%]">
               
                    <h1 class="text-[25px] font-bold mt-7">Gaëtan CRISTINA</h1>
                    <hr class="h-[3px] w-[150px] bg-[#E6B34B]">

            </div>
            <div class="flex flex-col justify-center items-center">
               
                    <img src="../../../public/storage/images/CaptainAmerica.jpg" alt="" class="w-[150px] sm:w-[200px] md:w-[250px] lg:w-[300px] border-[2px] border-[#E6B34B] rounded-[50%]">
                
                    <h1 class="text-[25px] font-bold mt-7">Zakaria AADDI</h1>
                    <hr class="h-[3px] w-[150px] bg-[#E6B34B]">

            </div>
         
        </div>

        <div class="mt-[30px]">
            <h1 class="text-[20px] font-bold mt-[40px]">NOUS RETROUVER SUR LA CARTE</h1> 
        </div>
        
        <hr class="h-[3px] w-[200px] bg-[#E6B34B]">
        <hr class="h-[3px] w-[150px] bg-[#E6B34B]">

        <div class="mt-[40px]">
            <iframe class="w-full md:w-[600px] xl:w-[1200px] h-[250px] shadow-2xl" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1123.6338146174705!2d6.138064847775451!3d45.90377521077321!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x478b8fc2026b8489%3A0x764caf7cb2ddcdc9!2sImp%C3%A9rial%20Palace!5e0!3m2!1sfr!2sfr!4v1678463290364!5m2!1sfr!2sfr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
</template>

<script>
export default {
    name: 'WhoAreWe',
    components:{
    }
}
</script>

<style scoped>

</style>
