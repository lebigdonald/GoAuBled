<template>
    <div>
        <section id="about" class="mb-5 reservation-component">
            <h1 class="text-justify text-center headline-text">Reserver un Voyage </h1>
            <notifications classes="notiferror" :duration="3000" width="600" position="top right" group="errors"/>
            <notifications classes="notifsuccess" :duration="3000" width="600" position="top right" group="success"/>
            <div class="container shadow">
                <div class="row">
                    <div class="col-lg-3 col-sm-12 justify-content-center">
                        <div class="">
                            <img class="avatar"
                                 src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcStl-KWsV0KVxQug2HoR6e3lx6UUSD4KAqyDbevILtDVDvs0YK1xA&s">
                        </div>
                        <div class="user-infos">
                            <strong>Name:</strong> <span>{{user.name}}</span><br>
                            <strong>Email:</strong> <span>{{user.email}}</span>
                        </div>
                        <hr class="hr-sepace">
                        <span>
                            <span v-if="user.email_verified_at != null">
                                <svg class="bi bi-check2-circle" width="1em" height="1em" viewBox="0 0 16 16"
                                     fill="currentColor"
                                     xmlns="http://www.w3.org/2000/svg">
						                <path fill-rule="evenodd"
                                              d="M15.354 2.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3-3a.5.5 0 1 1 .708-.708L8 9.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
                                        <path fill-rule="evenodd"
                                              d="M8 2.5A5.5 5.5 0 1 0 13.5 8a.5.5 0 0 1 1 0 6.5 6.5 0 1 1-3.25-5.63.5.5 0 1 1-.5.865A5.472 5.472 0 0 0 8 2.5z"/>
					            </svg>
                            </span>
                            <span v-else>
                                <svg class="bi bi-check2-circle" width="1em" height="1em" viewBox="0 0 16 16"
                                     fill="currentColor"
                                     xmlns="http://www.w3.org/2000/svg" style="color: red">
                                    <path fill-rule="evenodd"
                                          d="M15.354 2.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3-3a.5.5 0 1 1 .708-.708L8 9.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
						            <path fill-rule="evenodd"
                                          d="M8 2.5A5.5 5.5 0 1 0 13.5 8a.5.5 0 0 1 1 0 6.5 6.5 0 1 1-3.25-5.63.5.5 0 1 1-.5.865A5.472 5.472 0 0 0 8 2.5z"/>
					            </svg>
                            </span>
					Numéro vérifier
				</span><br>
                        <span>
                            <span v-if="user.email_verified_at != null">
                                <svg class="bi bi-check2-circle" width="1em" height="1em" viewBox="0 0 16 16"
                                     fill="currentColor"
                                     xmlns="http://www.w3.org/2000/svg">
						                <path fill-rule="evenodd"
                                              d="M15.354 2.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3-3a.5.5 0 1 1 .708-.708L8 9.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
						                <path fill-rule="evenodd"
                                              d="M8 2.5A5.5 5.5 0 1 0 13.5 8a.5.5 0 0 1 1 0 6.5 6.5 0 1 1-3.25-5.63.5.5 0 1 1-.5.865A5.472 5.472 0 0 0 8 2.5z"/>
					            </svg>
                            </span>
                            <span v-else>
                                <svg class="bi bi-check2-circle" width="1em" height="1em" viewBox="0 0 16 16"
                                     fill="currentColor"
                                     xmlns="http://www.w3.org/2000/svg" style="color: red">
						            <path fill-rule="evenodd"
                                          d="M15.354 2.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3-3a.5.5 0 1 1 .708-.708L8 9.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
                                   <path fill-rule="evenodd"
                                         d="M8 2.5A5.5 5.5 0 1 0 13.5 8a.5.5 0 0 1 1 0 6.5 6.5 0 1 1-3.25-5.63.5.5 0 1 1-.5.865A5.472 5.472 0 0 0 8 2.5z"/>
					        </svg>
                            </span>
					E-Mail vérifier
				</span><br>
                        <div class="starrr" data-rating="0"></div>
                        <div>

                            <div class="rating"><input type="radio" name="rating" value="5" id="5"><label
                                for="5">☆</label>
                                <input type="radio" name="rating" value="4" id="4"><label for="4">☆</label> <input
                                    type="radio" name="rating" value="3" id="3"><label for="3">☆</label> <input
                                    type="radio" name="rating" value="2" id="2"><label
                                    for="2">☆</label> <input type="radio" name="rating" value="1" id="1"><label
                                    for="1">☆</label>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-9  col-sm-12 travel-detail">
                        <h3> Details du trajet</h3>
                        <div class="row">
                            <div class="col-md-8">
                                <ul class="timeline offset-md-3">
                                    <span class="step-heure">{{travel.date_depart}}</span>
                                    <li>
                                        <p>{{travel.vilDepart}}</p>
                                    </li>

                                    <span class="step-heure">{{travel.date_arrive}}</span>
                                    <li>
                                        <p>{{travel.vilArrive}}</p>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-3 border">
                                <p>Kilos Disponibles : <span
                                    class="text-white font-weight-bold">{{total_kilos}}</span>
                                </p>
                                <p>Prix du Kilo : <span class="text-white font-weight-bold">{{travel.prixKilo}}</span>
                                </p>
                                <p>Compagnie : <span class="text-white font-weight-bold">{{travel.compagnie}}</span>
                                </p>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-md-6 reservation-form">
                                <button class="btn btn-reserve" type="submit">je reserve</button>
                                <button data-toggle="collapse" data-target="#reserver"
                                        class="btn btn-contact-reserve btn btn-primary">contacter
                                    le voyageur
                                </button>
                                <div id="reserver" class="collapse">
                                    <form v-on:submit.prevent="booking(travel.user_id,log_user,book,message,travel.id)">
                                        <div class="form-group">
                                            <label>Combien de Kilos ? :</label>
                                            <input v-model="book" type="number" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Votre message:</label>
                                            <textarea v-model="message" type="textarea"
                                                      class="form-control voyageur-textarea"></textarea>
                                            <button class="btn btn-info">envoyer</button>

                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <chat_box :user="user" :log_user="log_user"></chat_box>
        </section>
    </div>
</template>
<script>
    import Vue from 'vue';
    import chat_box from './chat/chat.vue';

    export default {
        components: {
            chat_box
        },
        props: ['user', 'travel', 'log_user'],

        data: function () {
            return {
                'total_kilos': 0,
                'total': 0,
                'book': null,
                'message': null,
                'sendUser': this.log_user
            }
        },
        methods: {
            booking: function (user_id, sendUser, book, message, post_id) {

                axios.post('/message/' + user_id + '/' + sendUser, {
                    'book_kilo': book,
                    'post_id': post_id,
                    'message': message
                }).then( (response)  => {
                        Vue.notify({
                            group: 'success',
                            title: 'Important message',
                            text: 'Votre reservation ete belle et bien enregistrer, merci pour votre confiance!'
                        });
                        this.book = null;
                        this.message = null;
                    }).catch( (error)  => {
                        Vue.notify({
                            group: 'errors',
                            title: 'Erreurs',
                            text: "il y a les erreurs,veuillez remplir tous champs s'il vous plait!"
                        });
                        console.log(error);
                    });
            }
        },
        watch: {
            book: function (val) {
                this.total_kilos = this.total - val;
                console.log(this.book);
            }
        },
        mounted() {
            this.total_kilos = this.travel.kiloAvalable;
            this.total = this.travel.kiloAvalable;
            this.sendUser = this.logUser;
        }
    }
</script>
