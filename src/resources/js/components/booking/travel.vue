<template>
    <div>
    <section id="about" class="mb-5 reservation-component">
        <h1 class="text-justify text-center headline-text">Reserver un Voyage </h1>
        <div class="container shadow">
            <div class="row">
                <div class="col-lg-3 col-sm-12 justify-content-center">
                    <userProfile :user="owner" :asset="asset"></userProfile>
                </div>
                <div class="col-lg-9  col-sm-12 travel-detail">
                    <h3> Details du Vovage</h3>
                    <div class="row w-100 p-2">
                        <div class="col-md-5 py-2">
                            <el-timeline>
                                <el-timeline-item
                                    v-for="(activity, index) in activities"
                                    :key="index"
                                    :timestamp="activity.timestamp">
                                    {{ activity.content }}
                                </el-timeline-item>
                            </el-timeline>
                        </div>
                        <div class="text-left col-md-7 py-2">
                            <div class="my-4 pt-2 text-center">

                                <div class="bg-success text-white p-2">
                                    <div>
                                        <strong class="">Kilos encore disponibles: </strong>
                                    </div>

                                    <div>
                                        <strong class="">{{ post.kilo }} Kg</strong>
                                    </div>
                                </div>
                                <h5 class="text-center my-4">Objets acceptables</h5>
                                <div v-for="object in travelTransformer(post.objects)">
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
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 p-4">
                            <div>Message du voyageur: </div>
                            <div v-html="post.content" class="border p-2"></div>
                        </div>
                        <div class="col-md-12 p-4">
                            <button class="btn btn-reserve"  data-toggle="collapse" data-target="#reserver" type="submit">je reserve</button>
                            <button @click="startConversationWith" class="btn btn-primary btn-contact-reserve">contacter le voyageur</button>
                        </div>
                        <div class="row">
                            <div id="reserver" class="collapse">
                                <div class="col-md-12 mx-3">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <input v-model="form.kilo" type="number" class="form-control" placeholder="kilos ?">
                                            </div>
                                        </div>
                                        <div class="col-md-3" v-if="checkElementByKey(1).available">
                                            <input v-model="form.envelopes" type="number" class="form-control" placeholder="Envelopes ?">
                                        </div>
                                        <div class="col-md-2" v-if="checkElementByKey(2).available">
                                            <input v-model="form.laptops" type="number" class="form-control" placeholder="Laptops ?">
                                        </div>
                                        <div class="col-md-3" v-if="checkElementByKey(3).available">
                                            <input v-model="form.phones" type="number" class="form-control" placeholder="Telephones ?">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <button class="btn btn-reserve" @click.prevent="bookingKilo" type="submit">reserver</button>
                                        <b-spinner v-show="bookingSpinerShow" small label="Small Spinner" type="grow"></b-spinner>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <contact-user :user="owner" :current="currentUser" :messages="messages" @new="saveNewMessage(message)" :path="path"></contact-user>
</div>
</template>

<script>
import contactUser from "./contact";
import userProfile from './../utilities/cards/user';
import Store from '../../store/index';

export default {

    props: ['post', 'owner', 'currentUser', 'path', 'asset'],

    components: {contactUser, userProfile},

    data: function() {
        return {
            setisActiveChat: true,
            messages: [],
            activities: [],
            options: [],
            bookingSpinerShow: false,
            form: {
                kilo: null,
                envelopes: null,
                phones: null,
                laptops: null,
            }
        }
    },
    computed: {
        getKilos: function() {
            return Store.getters.getKilos;
        },
        getisActiveChat: function() {
            return Store.getters.getisActiveChat;
        }
    },
    methods: {
        booking: function() {
            if(this.form.kilo > 0) { Store.dispatch('bookKilo', this.form.kilo);}
        },
        startConversationWith() {
            Store.dispatch('setisActiveChat', !this.getisActiveChat);
            axios.get(`/conversation/${this.owner.id}`)
                .then((response) => {
                this.messages = response.data;
            })
        },
        saveNewMessage(message) {
            this.messages.push(message);
        },
        bookingKilo() {
            if (this.form.kilo > this.getKilos || this.form.kilo <= 0) {

                Vue.$toast.warning('une erreur est survenue.', {
                    position: 'top-right'
                });
                return;
            }
            this.bookingSpinerShow = true;
                axios.post(`/post/booking/${this.post.slug}/${this.owner.id}`,
                {
                    form: this.form,
                    owner: this.owner,
                    post: this.post.id,
                    user: this.currentUser,
                    bookingType: 'travel'

                }).then(() => {

                    this.form.kilo = null;
                    this.form.lettres = null;
                    this.form.electroniques = null;

                    Vue.$toast.success('votre reservation a ete soumise avec success.', {
                        position: 'top-right'
                    });
                    this.bookingSpinerShow = false;

                }).catch(() => {
                    Vue.$toast.warning('Ups une erreur est survenue lors de la soumission, veuillez verifier votre addresse email.', {
                        position: 'top-right'
                    });
                    this.bookingSpinerShow = false;
                })
        },
        travelTransformer(element) {
            return JSON.parse(element);
        },
        checkElementByKey(key) {
            return this.travelTransformer(this.post.objects).find(element => element.id === key);
        }
    },
    mounted() {
       Store.dispatch('setisActiveChat', true);
       Store.dispatch('setKilos', this.post.kilo);

        this.options.push({ value: this.post.id, text: this.post.from + ' pour ' + this.post.to + ' du ' +  this.post.dateFrom })
        this.activities.push({ content: this.post.from, timestamp: this.post.dateFrom },{ content: this.post.to, timestamp: this.post.dateTo })

    }

}
</script>
