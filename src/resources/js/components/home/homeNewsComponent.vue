<template>
    <section id="services" class="home-news-section" v-if="lastNews.length > 0">
        <div class="container">
            <div class="section-header">
                <h2 class="text-center title__annonce">
                    Les dernieres annonces
                </h2>
            </div>
            <b-card-group>
                <b-card class="my-4 mx-2 w-auto" v-for="item in lastNews" :key="item.id">
                    <b-card-text>
                        <img
                            :src="
                                item.categorie_id == 1
                                    ? '/img/cube-outline.svg'
                                    : '/img/icons8-airport-100.png'
                            "
                            class="card-logo mt-2"
                            alt="SVG mit img Tag laden"
                            width="50"
                            height="50"
                        />
                    </b-card-text>
                    <b-card-text class="text-center">
                        <vue-letter-avatar class="card-user-logo" :name="item.user.name !== undefined ? item.user.name : 'Ramdom' " size='60' :rounded=true />
                    </b-card-text>
                    <div>
                        <h5 class="text-nowrap home-post-title" style="font-size:18px;"><b-badge variant="secondary">{{ item.from }}</b-badge>
                        <b-icon class="mx-1" icon="arrow-right-circle-fill" variant="info" aria-hidden="true"></b-icon>
                        <b-badge variant="secondary">{{ item.to }}</b-badge></h5>
                        <p>Depart: <span class="float-right font-weight-bold">{{ item.dateFrom }}</span></p>
                        <p>Arrivee: <span class="float-right font-weight-bold">{{ item.dateTo }}</span></p>
                        <hr>
                        <p>Kilos Disponibles : <span class="float-right font-weight-bold"><h5><b-badge variant="secondary">{{ item.kilo }}</b-badge></h5></span></p>
                        <p>Prix du Kilo : <span class="float-right font-weight-bold"><h5><b-badge variant="secondary">{{ item.prix }}<i data-v-4e9a6efe="" class="fas fa-euro-sign pl-1"></i></b-badge></h5></span></p>
                    </div>
                    <div class="text-center">
                        <b-link :href="item.Path" class="btn btn-secondary btn-block">reserver</b-link>
                    </div>
                    <template v-slot:footer>
                        <small class="text-muted">{{ item.created_at }}</small>
                    </template>
                </b-card>
            </b-card-group>
        </div>
    </section>
</template>

<script>
export default {
    props: ["news"],
    data: function() {
        return {
            lastNews: []
        };
    },
    mounted() {
        this.lastNews = this.news;
    }
};
</script>

<style lang="scss" scoped>
    @import "./../../../sass/_variables.scss";

    .home-news-section {
        background-color: $gray-50;
        margin-top: 30px;
        margin-bottom: 30px;
        padding: 30px;
    }

    .card-user-logo {
        width: 90px;
        height: 90px;
        border-radius: 100%;
        background: rgb(139 199 61) !important;
    }
    .home-post-title {
        text-align: center;
    }
</style>
