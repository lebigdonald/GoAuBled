<template>
<div class="card runde-ecke">
        <div class="row shadow">
            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 pb-5">
               <userProfile :user="item.user" :asset="asset" :post-date="item.created_at"></userProfile>
                <div class="icon--card">
                    <img :src="item.categorie_id === 1 ? '/img/cube-outline.svg' : '/img/airport-100.png'" class="mt-2" alt="SVG mit img Tag laden" width="50" height="50" >
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
                <ul class="timeline">
                    <li>
                        <a target="_blank" href="#">{{ item.from }}</a>
                        <a href="#" class="float-right pr-4">{{ item.dateFrom }}</a>
                    </li>
                    <li>
                        <a href="#">{{ item.to }}</a>
                        <a href="#" class="float-right pr-4">{{ item.dateTo }}</a>
                    </li>
                </ul>
                <hr>
                <div class="notice notice-warning">
                    <h6>Kilo disponibles : <b-badge variant="info" class="mx-2 px-3 font-weight-bold avalaible_kilo" v-html="item.kilo + ' kg'"></b-badge><span class="float-right kilo-price">{{ item.prix }}€</span></h6>
                </div>
                <span v-for="object in travelTransformer(item.objects)">
                    <span v-if="object.id === 1 && object.available" class="p-2 m-2 bg-success text-white">
                        <strong class="quigo-animate-class-css-element mr-3"><span class="fa fa-envelope"></span></strong>
                        <strong v-html="object.price"></strong><span class="fa fa-euro"></span> / <span class="fa fa-envelope"></span>
                    </span>
                    <span v-else-if="object.id === 2 && object.available" class="p-2 m-2 bg-secondary text-white">
                        <strong class="quigo-animate-class-css-element mr-3"><span class="fa fa-laptop"></span></strong>
                        <strong v-html="object.price"></strong><span class="fa fa-euro"></span> / <span class="fa fa-laptop"></span>
                    </span>
                    <span v-else-if="object.id === 3 && object.available" class="p-2 m-2 bg-primary text-white">
                        <strong class="quigo-animate-class-css-element mr-3"><span class="fa fa-phone"></span></strong>
                        <strong v-html="object.price"></strong><span class="fa fa-euro"></span> / <span class="fa fa-phone"></span>
                    </span>
                </span>
                <div class="notice notice-warning mt-1">
                    <strong>Message : </strong>
                    <div class="text-break overflow-auto text-muted bg-white border rounded mb-4 mt-1 px-2">
                        {{ item.content }}
                    </div>
                </div>
                <div class="notice notice-success text-right">
                    <a :href="item.Path" class="btn btn-primary w-100 btn-recherche contact-btn">
                        Contactez le voyageur
                    </a>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

import userProfile from './user'

export default {
    props: ['item','asset'],
    components: {
        userProfile
    },

    mounted() {
        //
    },
    methods: {
        travelTransformer(element) {
            return JSON.parse(element);
        }
    }

}
</script>

<style lang="scss">

.avalaible_kilo {
    font-size: 15px;
}

</style>
