<template>
    <div id="about" class="p-4">
        <div class="row">
            <div class="col-lg-12 text-center mb-2">
                <h2 class="quigo-title">Que souhaitez-vous envoyer ?</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-8 mx-auto pt-2 bg-poster">
                <ValidationObserver v-slot="{ handleSubmit }">
                    <form @submit.prevent="handleSubmit(onSubmit)">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="font-weight-bold" for="from">Ville de depart:</label>
                                    <validation-provider rules="required" v-slot="{ errors }">
                                        <input type="text" v-model="coli.from" id="from" name="from" class="form-control" :class="{ 'is-invalid': errors[0] !== undefined }" />
                                        <small class="form--error">{{ errors[0] }}</small>
                                    </validation-provider>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="font-weight-bold" for="coli.to">Ville d'arrivee:</label>
                                    <validation-provider rules="required" v-slot="{ errors }">
                                        <input type="text" v-model="coli.to" id="coli.to" name="coli.to" class="form-control" :class="{ 'is-invalid': errors[0] !== undefined }" />
                                        <small class="form--error">{{ errors[0] }}</small>
                                    </validation-provider>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="font-weight-bold">A partir du :</label>
                                        <validation-provider rules="required" v-slot="{ errors }">
                                        <datetime
                                        type="datetime"
                                        v-model="coli.dateFrom"
                                        input-class="form-control"
                                        zone="Europe/Paris"
                                        :format="{ year: 'numeric', month: 'long', day: 'numeric', hour: 'numeric', minute: '2-digit'}"
                                        :phrases="{ok: 'Continue', cancel: 'Exit'}"
                                        :min-datetime="(new Date()).toString()"
                                        use24-hour
                                        auto
                                        ></datetime>
                                        <small class="form--error">{{ errors[0] }}</small>
                                    </validation-provider>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="font-weight-bold">Que voulez-vous envoyer ?</label>
                                    <validation-provider rules="required" v-slot="{ errors }">
                                        <el-select v-model="transportedObjects" filterable placeholder="Nom de l'Objet">
                                            <el-option
                                                v-for="item in options"
                                                :key="item.value"
                                                :label="item.label"
                                                :value="item.value">
                                            </el-option>
                                        </el-select>
                                    </validation-provider>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="row border position-relative" v-for="(item, index) in coli.objects">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-weight-bold" :for="'description' + item.id">Nom</label>
                                            <validation-provider rules="" v-slot="{ errors }">
                                                <input type="text" v-model="item.description" :id="'description' + item.id" :name="'description' + item.id" class="form-control" :class="{ 'is-invalid': errors[0] !== undefined }" />
                                                <small class="form--error">{{ errors[0] }}</small>
                                            </validation-provider>
                                        </div>
                                    </div>
                                    <div class="col-md-6" v-show="item.description !== 'Coli'">
                                        <div class="form-group">
                                            <label class="font-weight-bold" :for="'quantity' + item.id">Quantité</label>
                                            <validation-provider rules="integer" v-slot="{ errors }">
                                                <input type="text" v-model="item.qte" :id="'quantity' + item.id" name="quantity" class="form-control" :class="{ 'is-invalid': errors[0] !== undefined }" />
                                                <small class="form--error">{{ errors[0] }}</small>
                                            </validation-provider>
                                        </div>
                                    </div>
                                    <div class="col-md-6" v-show="item.description === 'Coli'">
                                        <div class="form-group">
                                            <label class="font-weight-bold" :for="'kilo' + item.id">Poids en Kg</label>
                                            <validation-provider rules="integer" v-slot="{ errors }">
                                                <input type="text" v-model="item.kilo" :id="'kilo' + item.id" :name="'kilo' + item.id" class="form-control" :class="{ 'is-invalid': errors[0] !== undefined }" />
                                                <small class="form--error">{{ errors[0] }}</small>
                                            </validation-provider>
                                        </div>
                                    </div>
                                    <a href="#" @click.prevent="removeItem(index)"><span class="text-red deleteItem"><i class="el-icon-delete"></i></span></a>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">Ajoutez des images sur votre post</label>
                            <el-upload
                                action="/coli-form"
                                accept="application/pdf, image/jpeg, image/jpg, image/png"
                                list-type="picture-card"
                                :on-preview="handlePreview"
                                :on-change="updateImageList"
                                :auto-upload="false">
                                <i class="el-icon-plus"></i>
                            </el-upload>
                            <el-dialog :visible.sync="dialogVisible">
                                <img width="100%" :src="imgUrl" alt="">
                            </el-dialog>
                        </div>
                        <div class="form-group my-2">
                            <label class="font-weight-bold" for="form.content">donnez plus d'informations sur les objects à envoyer</label>
                            <validation-provider rules="required" v-slot="{ errors }">
                                <textarea v-model='coli.content' class="form-control" id="form.content" rows="3" :class="{ 'is-invalid': errors[0] !== undefined }"></textarea>
                                <small class="form--error">{{ errors[0] }}</small>
                            </validation-provider>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary my-2 btn-recherche">Poster votre voyage</button>
                        </div>
                    </form>
                </ValidationObserver>
            </div>
        </div>
    </div>
</template>

<script>

  import moment from "moment";

  export default {
    data() {
      return {
        coli:
            {
                from: '',
                to: '',
                dateFrom: null,
                dateTo: null,
                quantity: '',
                coliName: '',
                colisPhoto: null,
                objects: [],
                kilo: '',
                prix: '',
                photo: '',
                content: ''
            },
        transportedObjects: null,
        aktDate: '',
          options: [{
              value: 'Telephone',
              label: 'Telephone'
          }, {
              value: 'Laptop',
              label: 'Laptop'
              }, {
              value: 'Envelope',
              label: 'Envelope'
          },{
              value: 'Tablet',
              label: 'Tablet'
          }, {
              value: 'Coli',
              label: 'Coli'
          }],
        minDate: '',
        file:  '',
        dialogVisible: false,
        imgUrl: '',
        imagesList: [],
      }
    },
    watch: {
        'form.dateFrom': function(val) {
            this.minDate = val;
        },

        transportedObjects(val) {
           this.coli.objects.push({description: val, qte: 1, kilo: 1});
        }

    },
    computed: {
        getMinDate: function() {
            return this.minDate;
        }
    },
    methods: {
      onSubmit(evt) {
          let config = {
                headers: {
                    'Content-Type': 'application/json;charset=UTF-8',
                    "Access-Control-Allow-Origin": "*",
                    "enctype": "multipart/form-data"
                    }
                };

            const el = this;

             let formData = new FormData();

              formData.append('from',  this.coli.from);
              formData.append('to',  this.coli.to);
              formData.append('dateFrom',  this.coli.dateFrom);
              formData.append('content',  this.coli.content);
              formData.append('objects',  JSON.stringify(this.coli.objects));

              $.each(this.imagesList, function(key, image){
                  formData.append(`images[${key}]`, image);
              });

            axios.post('/post/coli/create', formData , config)
            .then(function (response) {
                window.location = response.data;
            })
            .catch(function (error) {
                if(error.response.data){
                    el.errors = error.response.data.errors;
                }
            });
        },
        updateImageList(file) {
            this.imagesList.push(file.raw)
        },
        handlePreview(file) {
            this.imageUrl = file.url;
            this.dialogVisible = true;
        },
        removeItem(index) {
          this.coli.objects.splice(index, 1);
        }

    },
    mounted() {
        this.aktDate = moment(new Date).format('DD.MM.YYYY' + ' à ' +  'HH:mm:ss');
        this.minDate = new Date();
    }
  }
</script>
<style lang="scss" scoped>
    .form--error {
        color: red;
    }
    .deleteItem {
        position: absolute;
        top: 0;
        right: 8px;
        color: red;
    }
</style>
