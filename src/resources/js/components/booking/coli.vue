<template>
<div>
    <section id="about" class="mb-0 section-booking">
        <h1 class="text-justify text-center headline-text">Je me propose!</h1>
        <div class="container shadow">
            <div class="row">
                <div class="col-lg-3 col-sm-12 justify-content-center">
                    <userProfile :user="owner" :asset="asset"></userProfile>
                </div>
                <div class="col-lg-9  col-sm-12 travel-detail">
                    <h3> Details du Colis</h3>
                    <div class="row w-100 p-2">
                        <div class="col-md-5 py-2">
                            <el-timeline>
                                <el-timeline-item
                                    v-for="(activity, index) in activities"
                                    :key="index"
                                    :timestamp="activity.timestamp">
                                    {{activity.content}}
                                </el-timeline-item>
                            </el-timeline>
                        </div>
                        <div class="text-left col-md-7 py-2">
                            <h4 class="text-center">Objets à transporter</h4>
                            <div class="my-4 pt-2 text-center">
                                <span v-for="item2 in toTransportedObjects(post.objects)">
                                    <p class="p-2 m-2 bg-success text-white d-flex justify-content-between">
                                        <strong class="quigo-animate-class-css-element mr-3">{{ item2.description }}</strong>
                                        <strong>{{ item2.qte }}</strong>
                                    </p>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 p-4">
                            <div>Message de l' expediteur: </div>
                            <div v-html="post.content" class="border p-2"></div>
                        </div>
                        <div class="col-md-12 p-4">
                            <button class="btn btn-reserve"  data-toggle="collapse" data-target="#reserver" type="submit">je me propose</button>
                            <button @click="startConversationWith" class="btn btn-primary btn-contact-reserve">contacter l'expéditeur</button>
                        </div>
                        <div class="row p-4">
                            <div id="reserver" class="collapse">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="email">Choississez le Post avec le quel vous aimeriez vous proposer</label>
                                        <b-form-select v-model="selected" :options="options" size="sm"></b-form-select>
                                    </div>
                                </div>
                                <div class="col-md-12 p-4">
                                    <div class="row">
                                        <div class="col-md-3 m-2" v-for="(item2, index) in form.takenObjects" :value="item2.qte" :key="item2 + index + item2">
                                            <div class="d-flex flex-column">
                                                <div class="form-check d-flex justify-content-between">
                                                    <label class="form-check-label" :for="'exampleCheck1-'+ index">{{ item2.name }}</label>
                                                    <input type="checkbox" class="form-check-input" :id="'exampleCheck1-'+ index" v-model="item2.checked">
                                                </div>
                                                <div class="my-1" v-if="item2.checked">
                                                    <label class="form-check-label">Quantité</label>
                                                    <input type="text" v-model="item2.qte" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="email">Avez vous des precisions ?</label>
                                        <textarea type="textarea" class="form-control voyageur-textarea" id="message"
                                                  v-model="form.message"  name="message"></textarea>
                                        <button class="btn btn-reserve" @click.prevent="sendBooking" type="submit">Envoyer</button>
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

import Store from '../../store/index'

export default {

    props: ['post', 'owner', 'currentUser', 'path', 'posts', 'asset'],

    components: {contactUser, userProfile},

    data: function() {
        return {
            setisActiveChat: true,
            bookingSpinerShow: false,
            selected: null,
            messages: [],
            activities: [],
            form: {
                selectedPost: null,
                message: null,
                takenObjects: [],
            },
            options: []
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
    watch: {
        selected: function(value) {
           this.form.selectedPost =  this.posts.filter(function (post) {
               return post.id === value;
           })
        }
    },
    methods: {
        startConversationWith() {
            if(this.owner.id === this.currentUser.id){
                Vue.$toast.error('votre reservation ne peut etre effectuer.', {
                        position: 'top-right'
                    });
                return;
            }
            Store.dispatch('setisActiveChat', !this.getisActiveChat);
            axios.get(`/conversation/${this.owner.id}`)
                .then((response) => {
                this.messages = response.data;
            })
        },
        saveNewMessage(message) {
            this.messages.push(message);
        },
        sendBooking() {
            if (this.currentUser.id === this.owner.id) {
                Vue.$toast.error('Vous ete le proprietaire de ce post. vous ne pouvez pas reserver.', {
                    position: 'top-right'
                });
                return;
            }
            if (this.posts.length > 0 && this.form.selectedPost !== null) {
              this.bookingSpinerShow = true;
                this.form.takenObjects = JSON.stringify(this.form.takenObjects);
                axios.post(`/post/booking/${this.post.slug}/${this.owner.id}`,
              {
                  post: this.post.id,
                  user: this.id,
                  form: this.form,
                  bookingType: 'coli'
              })
                .then(() => {

                    Vue.$toast.success('votre reservation a ete soumise avec success.', {
                        position: 'top-right'
                    });

                    this.form.selectedPost = null;
                    this.form.message = null;
                    this.selected = null;
                    this.bookingSpinerShow = false;
                    this.form.takenObjects = [];
                    this.coliTransformer(this.post.objects);
                })
            }else {
                Vue.$toast.error('vueillez verifier que toutes les informations ont ete bien saisies.', {
                    position: 'top-right'
                });
            }
        },
        toTransportedObjects(element) {
            return JSON.parse(element);
        },
        coliTransformer(postObjects) {
            JSON.parse(postObjects).forEach((item) => {
                this.form.takenObjects.push({ name: item.description, checked: false, qte: 0 })
            });
        }
    },
    mounted() {
       Store.dispatch('setisActiveChat', true);
       this.posts.forEach(element => {
           this.options.push({ value: element.id, text: element.from + ' pour ' + element.to + ' du ' +  element.dateFrom })
       });
       this.activities.push({ content: this.post.from, timestamp: this.post.dateFrom },{ content: this.post.to, timestamp: 'Pas definit' })
        this.coliTransformer(this.post.objects);
    }
}
</script>

<style lang="scss">
    .section-booking {
        background-color: #e9ecef;
    }
    .el-timeline-item__node {
        background-color: #0c2e8a !important;
    }
    .el-timeline-item__timestamp {
      color: white !important;
        font-weight: bold;
    }
    .el-timeline-item__content {
        font-weight: bold;
    }
</style>
