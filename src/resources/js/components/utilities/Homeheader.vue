<template>
    <header class="masthead" :style="{ backgroundImage: `url('${header.image}')`,  'height':  '500px' }">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12 text-center border d-flex justify-content-center align-item-center shadow-none header-bg-light rounded">
                    <div class="intro-content my-3 quigo-animate-class-css-element">
                        <search :title="header.title"></search>
                    </div>
                </div>
            </div>
        </div>
    </header>
</template>

<script>
    import search from '../search/search'
    export default {
        components: {search},
        props: ['header']
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
