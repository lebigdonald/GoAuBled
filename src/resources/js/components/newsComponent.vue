<template>
    <section id="about" class="pb-5">
        <div class="container py-4">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-lg-12 text-center">
                    <h2 class="quigo-title">{{ title }}</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-3 mt-3 cathergorie">
                    <h4 class="my-4 text-center text-white">Affiner votre recherche</h4>
                    <div class="list-group search-box rounded">
                        <div class="col-sm-12">
                            <div class="form-check border-bottom mb-3">
                                <input class="form-check-input" type="radio" name="gridRadios" id="allnews"
                                        @input="showAllNews()"
                                       :checked="sortKey === 'allNews'">
                                <label class="form-check-label" for="allnews">
                                    Toutes les annonces
                                </label>
                            </div>
                            <div class="form-check border-bottom mb-3">
                                <input class="form-check-input" type="radio" name="gridRadios" id="Voyages"
                                       @input="sortNews('travel')"
                                       :checked="sortKey === 'travel'">
                                <label class="form-check-label" for="Voyages">
                                    Voyages
                                </label>
                            </div>
                            <div class="form-check border-bottom mb-3">
                                <input class="form-check-input" type="radio" name="gridRadios" id="Colis"
                                        @input="sortNews('pack')"
                                        :checked="sortKey === 'pack'">
                                <label class="form-check-label" for="Colis">
                                    Colis
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-3 col-md-9 col-lg-9">
                    <div v-for="(item, index) in laravelData.data" :key="index">
                        <div v-show="travel.show">
                            <div class="container py-3" v-if="item !== null && item.categorie_id === '2'">
                                <travel :item="item" :asset="asset"></travel>
                            </div>
                        </div>
                        <div v-show="pack.show">
                            <div class="container py-3" v-if="item !== null && item.categorie_id === '1'">
                                <coli :item="item" :asset="asset"></coli>
                            </div>
                        </div>
                    </div>
                   <div class="row mt-4 py-2 px-4 float-right">
                        <pagination :data="laravelData" size="large" align="left" @pagination-change-page="getResults">
                            <span slot="prev-nav">&lt; Previous</span>
                            <span slot="next-nav">Next &gt;</span>
                        </pagination>
                   </div>
                </div>
            </div>
        </div>
    </section>
</template>
<script>

Vue.component('pagination', require('laravel-vue-pagination'));

import travel from './utilities/cards/travel'
import coli from './utilities/cards/coli'
import store from '../store/index'

export default {
    props: ["keyWatch",'asset'],
    components: {
        travel,
        coli
    },
    data: function () {
        return {
            laravelData: {},
            messages: [],
            text: null,
            sortKey: '',
            posts: [],
            pack: {
                show: true
            },
            travel: {
                show: true
            },
            title: "Listes d'annonces"
        }
    },
    watch: {

        sortKey: function(val) {

            if (val === 'all') {
                this.showAllNews();
                return;

            }
            this.sortNews(val);

        }

    },
    methods: {
        sortNews: function(cat) {
            if (cat === 'travel') {
                store.dispatch('setOverlayShow', true);
                axios.get('/api/posts/travels').then((response) => {
                    this.laravelData = response.data;
                    this.title = "Annonces de voyages";
                    store.dispatch('setOverlayShow', false);
                })
            } else if (cat === 'pack') {
                store.dispatch('setOverlayShow', true);
                axios.get('/api/posts/packets').then((response) => {
                    this.laravelData = response.data;
                    this.title = "Annonces de packets";
                    store.dispatch('setOverlayShow', false);
                })
            }
        },
        showAllNews: function () {
            store.dispatch('setOverlayShow', true);
            axios.get('/api/posts').then((response) => {
                this.laravelData = response.data;
                this.title = "Liste d'annonces";
                store.dispatch('setOverlayShow', false);
            })
        },
        getResults(page = 1) {
            store.dispatch('setOverlayShow', true);
            axios.get('/api/posts?page=' + page)
                .then(response => {
                    this.laravelData = response.data;
                    store.dispatch('setOverlayShow', false);
                });
        }
    },
    mounted() {
        this.getResults();
        this.sortKey = this.keyWatch !== undefined ? this.keyWatch : 'all' ;
    },
}
</script>
<style>
    span.vorHumanns {
    font-weight: bold;
    color: gray;
    position: absolute;
    bottom: 25px;
}
</style>
