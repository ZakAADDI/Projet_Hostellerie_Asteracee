<template>
    <div class="header">
        <a href="*">Default</a>
        <a href="*"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/1f/Flag_of_France_official.svg/1200px-Flag_of_France_official.svg.png" alt="French Flag"></a>
    </div>
</template>

<script>

export default {
    name: 'Header',
    components: {

    }
}
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Radley&display=swap');

.header {
    font-family: 'Radley', serif;

    width: 100vw;
    height: 6rem;
    background-color: black;
    display: flex;
    align-items: center;
    justify-content: flex-end;
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
img{
    width: 30px;
}
</style>
