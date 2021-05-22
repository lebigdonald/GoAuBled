<template>
    <section id="services" class="home-news-section" v-if="lastNews.length > 0">
        <div class="container py-2">
            <div class="section-header">
                <h2 class="text-center title__annonce">
                    Les dernieres annonces
                </h2>
            </div>
            <div class="row mb-4">
                <div class="owl-item col-md-4 col-sm-12 col-xs-12 mb-4" v-for="(item, index) in lastNews" :key="item.id + 'cat-2' + index">
                    <div class="testimonial-item" style="width: 350px; height: 500px; background-color: white">
                        <div class="card" v-if="item.categorie_id === '2'">
                            <div class="card-header w-100 d-flex justify-content-between">
                                <el-image
                                    class="logo-post rounded-circle"
                                    style="width: 50px; height: 50px"
                                    src="/img/airport-100.png"
                                    fit="fit">
                                </el-image>
                                <div class="d-flex flex-column justify-content-center align-items-center">
                                    <img class="avatar" width="30px" height="30px" :src="item.user.avatar" alt="item.user.default_avatar">
                                    <div class="font-italic font-weight-bold" v-html="item.user.name"></div>
                                </div>
                            </div>

                            <div class="card-body">

                                <div class="d-flex justify-content-between">

                                    <div class="d-flex flex-column align-items-center justify-content-center  my-4">

                                        <svg class="svg-icon" viewBox="0 0 20 20">
                                            <path d="M10,1.375c-3.17,0-5.75,2.548-5.75,5.682c0,6.685,5.259,11.276,5.483,11.469c0.152,0.132,0.382,0.132,0.534,0c0.224-0.193,5.481-4.784,5.483-11.469C15.75,3.923,13.171,1.375,10,1.375 M10,17.653c-1.064-1.024-4.929-5.127-4.929-10.596c0-2.68,2.212-4.861,4.929-4.861s4.929,2.181,4.929,4.861C14.927,12.518,11.063,16.627,10,17.653 M10,3.839c-1.815,0-3.286,1.47-3.286,3.286s1.47,3.286,3.286,3.286s3.286-1.47,3.286-3.286S11.815,3.839,10,3.839 M10,9.589c-1.359,0-2.464-1.105-2.464-2.464S8.641,4.661,10,4.661s2.464,1.105,2.464,2.464S11.359,9.589,10,9.589"></path>
                                        </svg>

                                        <div class="d-flex justify-content-center align-items-center flex-column">
                                            <div class="text-wrap font-weight-bold" v-html="item.from"></div>
                                            <div v-html="item.dateTo"></div>
                                        </div>
                                    </div>

                                    <div class="d-flex flex-column align-items-center justify-content-center my-4">
                                        <svg class="svg-icon" viewBox="0 0 20 20">
                                            <path d="M10,1.375c-3.17,0-5.75,2.548-5.75,5.682c0,6.685,5.259,11.276,5.483,11.469c0.152,0.132,0.382,0.132,0.534,0c0.224-0.193,5.481-4.784,5.483-11.469C15.75,3.923,13.171,1.375,10,1.375 M10,17.653c-1.064-1.024-4.929-5.127-4.929-10.596c0-2.68,2.212-4.861,4.929-4.861s4.929,2.181,4.929,4.861C14.927,12.518,11.063,16.627,10,17.653 M10,3.839c-1.815,0-3.286,1.47-3.286,3.286s1.47,3.286,3.286,3.286s3.286-1.47,3.286-3.286S11.815,3.839,10,3.839 M10,9.589c-1.359,0-2.464-1.105-2.464-2.464S8.641,4.661,10,4.661s2.464,1.105,2.464,2.464S11.359,9.589,10,9.589"></path>
                                        </svg>

                                        <div class="d-flex justify-content-center align-items-center flex-column">
                                            <div class="text-wrap font-weight-bold" v-html="item.to"></div>
                                            <div v-html="item.dateTo"></div>
                                        </div>
                                    </div>

                                </div>

                                <div class="d-flex justify-content-between bg-success text-white p-1">

                                    <div>
                                        <strong class="">{{ item.kilo }}Kg</strong>
                                    </div>

                                    <div>
                                        <strong class="">{{ item.prix }}</strong>
                                        <span class="fa fa-euro"></span> / KG
                                    </div>

                                </div>

                                <div v-for="object in travelTransformer(item.objects)">
                                    <div v-if="object.id === 1 && object.available" class="d-flex justify-content-between bg-warning text-white my-2 p-1">

                                        <div>
                                            <strong class=""><span class="fa fa-envelope"></span></strong>
                                        </div>

                                        <div>
                                            <strong>{{ object.price }} </strong>
                                            <span class="fa fa-euro"></span> / <span class="fa fa-envelope"></span>
                                        </div>

                                    </div>
                                    <div v-if="object.id === 2 && object.available" class="d-flex justify-content-between bg-secondary text-white my-2 p-1">
                                        <div>
                                            <strong class=""><span class="fa fa-laptop"></span></strong>
                                        </div>

                                        <div>
                                            <strong>{{ object.price }} </strong>
                                            <span class="fa fa-euro"></span> / <span class="fa fa-laptop"></span>
                                        </div>
                                    </div>
                                    <div v-if="object.id === 3 && object.available" class="d-flex justify-content-between bg-primary text-white my-2 p-1">
                                        <div>
                                            <strong class=""><span class="fa fa-phone"></span></strong>
                                        </div>

                                        <div>
                                            <strong>{{ object.price }} </strong>
                                            <span class="fa fa-euro"></span> / <span class="fa fa-phone"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="my-4 d-flex justify-content-between">
                                    <strong>Companie:</strong>
                                    <strong v-html="item.compagnie"></strong>
                                </div>

                                <div class="w-100 text-center">
                                    <el-button class="w-100" @click="goToPath(item.Path)" round>Contactez le voyageur</el-button>
                                </div>

                            </div>
                        </div>
                        <div class="card" v-else>
                            <div class="card-header w-100 d-flex justify-content-between">
                                <el-image
                                    class="logo-post rounded-circle"
                                    style="width: 50px; height: 50px"
                                    src="/img/cube-outline.svg"
                                    fit="fit">
                                </el-image>
                                <div class="d-flex flex-column justify-content-center align-items-center">
                                    <img class="avatar" width="30px" height="30px" :src="item.user.avatar" alt="item.user.default_avatar">
                                    <div class="font-italic font-weight-bold" v-html="item.user.name"></div>
                                </div>
                            </div>

                            <div class="card-body">

                                <div class="d-flex justify-content-between">

                                    <div class="d-flex flex-column align-items-center justify-content-center  my-4">

                                        <svg class="svg-icon" viewBox="0 0 20 20">
                                            <path d="M10,1.375c-3.17,0-5.75,2.548-5.75,5.682c0,6.685,5.259,11.276,5.483,11.469c0.152,0.132,0.382,0.132,0.534,0c0.224-0.193,5.481-4.784,5.483-11.469C15.75,3.923,13.171,1.375,10,1.375 M10,17.653c-1.064-1.024-4.929-5.127-4.929-10.596c0-2.68,2.212-4.861,4.929-4.861s4.929,2.181,4.929,4.861C14.927,12.518,11.063,16.627,10,17.653 M10,3.839c-1.815,0-3.286,1.47-3.286,3.286s1.47,3.286,3.286,3.286s3.286-1.47,3.286-3.286S11.815,3.839,10,3.839 M10,9.589c-1.359,0-2.464-1.105-2.464-2.464S8.641,4.661,10,4.661s2.464,1.105,2.464,2.464S11.359,9.589,10,9.589"></path>
                                        </svg>

                                        <div class="d-flex justify-content-center align-items-center flex-column">
                                            <div class="text-wrap font-weight-bold" v-html="item.from"></div>
                                            <div v-html="item.dateFrom"></div>
                                        </div>
                                    </div>

                                    <div class="d-flex flex-column align-items-center justify-content-center my-4">
                                        <svg class="svg-icon" viewBox="0 0 20 20">
                                            <path d="M10,1.375c-3.17,0-5.75,2.548-5.75,5.682c0,6.685,5.259,11.276,5.483,11.469c0.152,0.132,0.382,0.132,0.534,0c0.224-0.193,5.481-4.784,5.483-11.469C15.75,3.923,13.171,1.375,10,1.375 M10,17.653c-1.064-1.024-4.929-5.127-4.929-10.596c0-2.68,2.212-4.861,4.929-4.861s4.929,2.181,4.929,4.861C14.927,12.518,11.063,16.627,10,17.653 M10,3.839c-1.815,0-3.286,1.47-3.286,3.286s1.47,3.286,3.286,3.286s3.286-1.47,3.286-3.286S11.815,3.839,10,3.839 M10,9.589c-1.359,0-2.464-1.105-2.464-2.464S8.641,4.661,10,4.661s2.464,1.105,2.464,2.464S11.359,9.589,10,9.589"></path>
                                        </svg>
                                        <div class="d-flex justify-content-center align-items-center flex-column">
                                            <div class="text-wrap font-weight-bold" v-html="item.to"></div>
                                            <div>&nbsp</div>
                                        </div>
                                    </div>

                                </div>

                                <div v-for="(el, index) in coliTransformer(item.objects)" class="d-flex justify-content-between text-white my-2 p-1" :class="index === 0 ? 'bg-info': 'bg-success'">

                                    <div>
                                        <strong class="" v-html="el.description"></strong>
                                    </div>

                                    <div>
                                        <strong v-html="el.qte"></strong>
                                    </div>

                                </div>

                                <div class="w-100 text-center mt-5">
                                    <el-button class="w-100" @click="goToPath(item.Path)" round>Contactez l'expediteur</el-button>
                                </div>

                            </div>
                        </div>
                        <div class="card-footer">
                            <span class="fa fa-clock-o"></span>
                            <time class="p-2 text-info text-bold text-center">{{'Poster ' + item.createdAt }}</time>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>

export default {
    props: ["posts"],
    data: function() {
        return {
            lastNews: []
        };
    },
    mounted() {
        this.lastNews = this.posts;
    },
    methods: {
        goToPath(path) {
            window.location = path;
        },
        travelTransformer(element) {
            console.log(JSON.parse(element));
            return JSON.parse(element);
        },

        coliTransformer(postObjects) {
            return JSON.parse(postObjects);
        }
    }
};
</script>

<style lang="scss" scoped>

.testimonial-item {
    min-height: 600px;
}

.home-news-section {
    background-color: #e9ecef;
    margin-top: 30px;
    margin-bottom: 30px;
    padding: 30px;
}
.home-post-title {
    text-align: center;
}

.timer {
    position: absolute;
    bottom: 0;
    left: 0;
}
.svg-icon {
    cursor: var(--icon-cursor, inherit);
    width: 30px;
    height: 30px;
    fill: var(--icon-color, #8bc73d);
    stroke: var(--icon-color, #8bc73d);
}
.card-footer {
    position: absolute;
    bottom: 0 !important;
    background-color: transparent;
    border-top: none;
}
</style>
