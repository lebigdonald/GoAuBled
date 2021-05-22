<template>
    <section class="bg-page-header kontakt-bg-about-greenforest">
        <notifications classes="notiferror" :duration="3000" width="600" position="bottom right" group="error"/>
        <notifications classes="notifsuccess" :duration="3000" width="600" position="bottom right" group="success"/>
        <div class="">
            <div class="row my-4" style="background-color:#f7f1e3">
                <div class="col-md-8">
                    <pulse-loader :loading="loading" :color="color" :size="size"></pulse-loader>
                    <h3 class="contact-title text-success"></h3>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="tel" class="form-control" id="vorname" name="Nom"
                                       placeholder="Nom" v-model="message.vorname">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-group">
                                    <input type="tel" class="form-control" id="nachname" name="Prenom"
                                           placeholder="Prenom" v-model="message.name">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="tel" class="form-control" id="subjectId" name="subject" v-model="message.subject"
                               placeholder="Sujet">
                    </div>
                    <textarea class="form-control text-area" rows="3" placeholder="Votre message ..." v-model="message.content"></textarea>

                    <div class="row">
                        <h4 class="title_h4">j'aimerai etre contactez : </h4>
                        <div class="col-md-8 elements text-center">
                            <div class="form-group  element">
                                <input type="radio" id="one" :value="true" v-model="perfone">
                                <label for="one" class="option">par Telefon</label>
                            </div>
                            <div class="form-group element">
                                <input type="radio" id="two" :value="false" v-model="perfone">
                                <label for="two" class="option">par Mail</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input v-if="perfone" type="tel" class="form-control" id="fone" name="fone"
                                       placeholder="mon numero de telephone" v-model="message.telnummer">
                                <input v-else type="tel" class="form-control" id="email" name="email"
                                       placeholder="mon adresse Mail" v-model="message.email">
                            </div>
                        </div>
                    </div>
                    <button @click="dataSend()" class="btn btn-primary btn-lg my-4 btn-recherche submit">Anfrage abschicken</button>
                </div>
                <div class="col-md-4">
                    <h3 class="contact-title"></h3>
                    <ul class="contact-address">
                        <li>
                            <i class="flaticon-placeholder"></i>
                            <div class="contact-content">
                                <p>Post : <a class="kontak-link"
                                    href="https://www.google.com/maps/search/?api=1&query=Am+Kaltenbach+8,+51491+Overath"
                                    target="_blank">Am Sandberg 7, 51641 Gummersbach</a></p>
                            </div>
                        </li>
                        <li>
                            <i class="flaticon-vibrating-phone"></i>
                            <div class="contact-content">
                                <p>Phone : <a class="kontak-link" href="tel:+4922068529695">02206 7657585787</a></p>
                            </div>
                        </li>
                        <li>
                            <i class="flaticon-time-left"></i>
                            <div class="contact-content">
                                <p>Heure disponible : <a class="kontak-link" href="">09:00 bis 19:00</a></p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
</template>
<script>
    import PulseLoader from 'vue-spinner/src/PulseLoader.vue'
    export default {
        components: {
            PulseLoader
        },
        data: function () {
            return {
                perfone: false,
                success_message: false,
                error_message: false,
                message: {
                    name: '',
                    vorname: '',
                    subject: '',
                    content: '',
                    telnummer: '',
                    email: '',
                    sendmail: ' info@wechsel-fair.de'
                },
                loading: false,
                color: 'green',
                size: '20px'
            }
        },
        methods: {
            dataSend: function () {
                if (this.message.vorname !== '' && this.message.name !== '' && this.message.content !== '' && this.message.subject !== '') {
                    this.loading = true;
                    axios.post('/contactUs', this.message).then((response) => {
                        this.success_message = true;
                        this.message.email = '';
                        this.message.name = '';
                        this.message.vorname = '';
                        this.message.subject = '';
                        this.message.content = '';
                        this.message.telnummer = '';
                        this.loading = false;
                        this.$notify({group: 'success', text: 'Votre message á ete envoyé.'});
                    }).catch((error) => {
                        this.error_message = false;
                    });
                } else {
                    this.$notify({group: 'error', text: 'Svp remplissez toutes les cases obligatoires.'});
                    this.success_message = false;
                    this.error_message = true;
                }
            }
        }
    }
</script>
<style scoped>
    .kontakt {
        padding-top: 30px !important;
    }
    .kontakt-bg-about-greenforest {
        margin-bottom: 0px;
    }
    .contact-address .contact-content p {
        color: #000000;
        font-weight: bold;
    }
    textarea {
        font-size: 24px;
        color: black;
        text-align: center !important;
    }
    .elements {
        display: flex;
        justify-content: space-between;
        margin-bottom: 34px;
    }
    form label {
        color: black;
        padding: 0px 24px;
    }
    .title_h4 {
        padding: 20px;
    }
    .mt-5 {
        margin-bottom: 50px;
    }
    input[type=tel] {
        color: black !important;
        text-align: center !important;
        font-size:20px;
    }
    .submit {
        margin-bottom: 100px;
        text-align: center;
    }
    .contact-content {
        padding-top: 10px;
    }
    .element {
        display: flex;
        justify-content: space-between;
    }
    .option {
        margin-right: 18px !important;
        font-weight: bold;
        color: black;
    }
    .element {
        margin-bottom: 10px;
        font-weight: bold;
    }
    input[type="radio"] {
        margin: 6px !important;
        color: white !important;
        background-color: green !important;
    }
    a {
        text-decoration: none;
    }
    .kontak-link {
        color: green;
        padding-left: 5px;
        font-weight: bold;
    }
    .kontak-link:hover {
        color: gray;
        font-weight: bold;
    }
    .success {
        color: white;
        background-color: green;
        text-align: center;
        top: -46px;
        position: relative;
        margin-left: 50px;
    }
    .has-error {
        color: white;
        background-color: red;
        text-align: center;
        top: -46px;
        position: relative;
        margin-left: 50px;
    }
</style>