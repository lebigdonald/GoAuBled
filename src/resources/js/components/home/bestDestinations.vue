<template>
    <section id="services" class="my-5 py-4">
        <div class="container">
            <div class="section-header">
                <h2 class="text-center">
                    Quelques Destinations preferes <br> de nos utilisateurs
                </h2>
            </div>
            <div class="row w-100 h-100">
                <div class="col-md-6">
                    <div class="block">
                        <span class="demonstration"></span>
                        <el-carousel height="300px">
                            <el-carousel-item v-for="(item, index) in departs" :key="item.img + index  + 1">
                                <h2 class="text-item-color font-weight-bold text-center">{{ item.name }}</h2>
                                <el-image :src="item.img"></el-image>
                            </el-carousel-item>
                        </el-carousel>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="block">
                        <span class="demonstration"></span>
                        <el-carousel trigger="click" height="300px">
                            <el-carousel-item v-for="(item, index) in arrivees" :key="item.img + index">
                                <h2 class="text-item-color font-weight-bold text-center">{{ item.name }}</h2>
                                <el-image :src="item.img"></el-image>
                            </el-carousel-item>
                        </el-carousel>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>

    export default {
        props: ['destinations'],
        data: function () {
            return {
                departs: [],
                arrivees: []
            }
        },
        methods: {

            filterData: function() {

                const el = this

                $.each(this.destinations, function(key, value) {

                    el.departs.push({name: value.city_from, img: value.image_from})

                    el.arrivees.push({name: value.city_to, img: value.image_to})

                });
        },

        },

        mounted() {

            this.filterData();
        }
    }

</script>

<style>
    .el-carousel__item h3 {
        color: #475669;
        font-size: 14px;
        opacity: 0.75;
        line-height: 150px;
        margin: 0;
    }

    .el-carousel__item:nth-child(2n) {
        background-color: transparent;
    }

    .text-item-color {
        color: #8bc73d;
    }

    .el-carousel__item:nth-child(2n+1) {
        background-color: transparent;
    }

    .el-image__error {
        display: none;
    }
</style>
