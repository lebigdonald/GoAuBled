<template>
    <div class="container my-4 p-5 border">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header bg-quigo text-white">
                        <i class="fa fa-envelope"></i> Laissez nous votre message.
                    </div>
                    <div class="card-body border">

                        <b-form @submit.prevent="onSubmit">

                            <b-form-group
                                id="input-group-1"
                                label-for="input-1"
                            >
                                <b-form-input
                                    id="input-1"
                                    v-model="form.name"
                                    type="text"
                                    placeholder="Entrer votre nom"
                                    required
                                ></b-form-input>

                            </b-form-group>

                            <b-form-group
                                id="input-group-1"
                                label-for="input-1"
                            >
                                <b-form-input
                                    id="input-1"
                                    v-model="form.email"
                                    type="email"
                                    placeholder="Entrer votre email"
                                    required
                                ></b-form-input>

                            </b-form-group>

                            <b-form-textarea
                                id="textarea"
                                v-model="form.content"
                                placeholder="Tapez votre message"
                                rows="3"
                                max-rows="6"
                            ></b-form-textarea>

                            <b-button type="submit" variant="success" class="mt-5" block>envoyer</b-button>

                        </b-form>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-4 my-2">
                <div class="card bg-light mb-3">
                    <div class="card-header bg-quigo text-white text-uppercase">
                    <i class="fa fa-home"></i>Adresse</div>
                    <div class="card-body border">
                        <p>Am Sandberg 7</p>
                        <p>51643 Köln</p>
                        <p>Allemagne</p>
                        <p>Email : goaubled@gmail.com</p>
                        <p>Tel. +49 157 728 042 98</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

export default {
    data: function () {
        return {
            form: {
                name: '',
                email: '',
                content: ''
            }
        }
    },
    methods: {

        onSubmit() {
            axios.post('/api/message-us', this.form).then((res) => {

                this.$message({
                    message: 'Votre message a ete envoyé avec success',
                    type: 'success'
                });

                this.form.name = '';
                this.form.email = '';
                this.form.content = '';

            })
        }
    }
}

</script>

<style lang="scss">
.bg-quigo {
    background-color: #8bc73d;
    color: white;
}
</style>
