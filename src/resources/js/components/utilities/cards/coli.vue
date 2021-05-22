<template>
<div class="card runde-ecke">
    <div class="row shadow">
        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 pb-5">
            <user :user="item.user" :asset="asset" :post-date="item.created_at"></user>
            <div class="icon--card">
                <img :src="item.categorie_id === '1' ? '/img/cube-outline.svg' : '/img/icons8-airport-100.png'" class="mt-2" alt="SVG mit img Tag laden" width="50" height="50" >
            </div>
        </div>
        <div class="col-md-9">
            <ul class="timeline">
                <li>
                    <a target="_blank" href="#">{{ item.to }}</a>
                    <a href="#" class="float-right pr-4">{{ item.dateFrom }}</a>
                </li>
                <li>
                    <a href="#">{{ item.to }}</a>
                    <a href="#" class="float-right pr-4" v-show="false">{{ item.dateTo }}</a>
                </li>
            </ul>
            <hr>
            <div class="notice notice-warning">
                <h6>Objects :
                    <span v-for="item2 in coliTransformer(item.objects)">
                        <span class="p-1 m-1 bg-success text-white">
                            <strong class="quigo-animate-class-css-element mr-1">{{ item2.description }}</strong>
                            <strong>{{ item2.qte }}</strong>
                        </span>
                    </span>
                    <span class="float-right kilo-price">VB</span>
                </h6>
            </div>
            <div class="notice notice-warning border-4">
                <strong class="mr-5">Message :</strong>
                <div class="text-break overflow-auto text-muted bg-white border rounded mb-4 mt-1 px-2">
                    {{ item.content }}
                </div>
            </div>
            <div class="notice notice-success text-right">

                <showImages :colis-name="item.colis_name" :images="item.images"></showImages>

                <a :href="item.Path" class="btn btn-primary w-100 btn-recherche contact-btn">Contactez l'expediteur</a>

            </div>
        </div>
    </div>
</div>
</template>

<script>

import user from './user';
import showImages from "./showImages";

export default {
    props: ['item','asset'],
    components: {
        user,
        showImages
    },
    methods: {
        coliTransformer(postObjects) {
            return JSON.parse(postObjects);
        }
    }

}
</script>

<style lang="scss">

.avalaible_kilo {
    font-size: 15px;
}

</style>
