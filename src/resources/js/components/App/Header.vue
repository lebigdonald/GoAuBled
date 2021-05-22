<template>
    <header class="masthead" :style="{ backgroundImage: `url('${data.image}')`,  'height':  '800px' }">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12 text-center border d-flex justify-content-center align-item-center shadow-none header-bg-light rounded">
                    <div class="intro-content my-3">

                    </div>
                </div>
            </div>
        </div>
    </header>
</template>

<script>
    //import search from '../search/search'
    export default {
        //components: {search},
        props: ['data']
    }

</script>

<style lang="scss" scoped>

    .masthead {
        height: 100vh;
        min-height: 500px;
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
    }
</style>
