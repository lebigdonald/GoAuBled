<template>
    <adminLayout>
        <div class="container">
            <el-collapse accordion>
                <el-collapse-item title="Header" name="1">
                    <imageText :images="images" :path="path" block="header" :editheader="editheader"></imageText>
                </el-collapse-item>

                <el-collapse-item title="About" name="2" class="mt-4">
                    <imageText :images="images" :path="path" block="about" :editheader="about"></imageText>
                </el-collapse-item>

                <el-collapse-item title="How It Work" name="3" class="mt-4">
                    <addInput :steps="steps" :categories="categories"></addInput>
                </el-collapse-item>

                <el-collapse-item title="Best Destinations" name="4" class="mt-4">
                        <el-form :inline="true" ref="form" :model="form" :rules="rules" class="demo-form-inline">
                            <div class="row">
                                <div class="col-6">
                                <el-card class="box-card">
                                    <div slot="header" class="clearfix">
                                        <span>Depart</span>
                                    </div>
                                        <el-form-item prop="city_from">
                                            <el-input v-model="form.city_from" placeholder="Pays"></el-input>
                                        </el-form-item>
                                        <el-form-item prop="image_from">
                                            <el-select v-model="image_from" placeholder="Image">
                                                <el-option v-for="img in images" :key="img.id" :label="'image ' + img.id" :value="img.id"></el-option>
                                            </el-select>
                                        </el-form-item>
                                    <div>
                                        <el-form-item prop="text_from">
                                            <el-input type="textarea" placeholder="Tapez le text ici" v-model="form.text_from"></el-input>
                                        </el-form-item>
                                        <el-form-item v-if="form.image_from">
                                            <img :src="form.image_from" :alt="form.image_from">
                                        </el-form-item>
                                    </div>
                                </el-card>
                            </div>
                            <div class="col-6">
                                <el-card class="box-card">
                                    <div slot="header" class="clearfix">
                                        <span>Destination</span>
                                    </div>
                                        <el-form-item prop="city_to">
                                            <el-input v-model="form.city_to" placeholder="Pays"></el-input>
                                        </el-form-item>
                                        <el-form-item prop="image_to">
                                            <el-select v-model="image_to" placeholder="Image">
                                                <el-option v-for="img in images" :key="img.id" :label="'image ' + img.id" :value="img.id"></el-option>
                                            </el-select>
                                        </el-form-item>
                                    <div>
                                        <el-form-item prop="text_to">
                                            <el-input type="textarea" placeholder="Tapez le text ici" v-model="form.text_to"></el-input>
                                        </el-form-item>
                                        <el-form-item v-if="form.image_to">
                                            <img :src="form.image_to" :alt="form.image_to">
                                        </el-form-item>
                                    </div>
                                </el-card>
                            </div>
                            <div class="col-4 pl-5">
                                <el-form-item>
                                    <el-button class="float-left" type="primary" @click="onSubmit('form')">save</el-button>
                                </el-form-item>
                            </div>
                        </div>
                    </el-form>
                </el-collapse-item>

            </el-collapse>
        </div>
    </adminLayout>
</template>

<script>
import adminLayout from '../Layout/master';
import imageText from '../../Shared/ImageText';
import addInput from './HowWork';

    export default {
        props: ['images', 'header','about', 'editheader', 'steps', 'categories'],
        components: {
            adminLayout,
            imageText,
            addInput
        },
        data() {
        return {
            image_from: '',
            image_to: '',
            activeName: '1',
            path: '/admin/home/edit',
            headerHome: {
                title: '',
                image: ''
            },
            form: {
                city_from: '',
                city_to: '',
                text_from: '',
                image_from: '',
                thumb_from: '',
                image_to: '',
                thumb_to: '',
                text_to: '',
            },
            rules: {
                city_from: [{ required: true, message: 'champs requis!', trigger: 'blur' },],
                image_from: [{ required: true, message: 'champs requis', trigger: 'blur' },],
                text_from: [{ required: true, message: 'champs requis', trigger: 'blur' },],
                city_to: [{ required: true, message: 'champs requis', trigger: 'blur' },],
                image_to: [{ required: true, message: 'champs requis', trigger: 'blur' },],
                text_to: [{ required: true, message: 'champs requis', trigger: 'blur' },]
            }
        };
        },
        methods: {
            onSubmit(form) {
                this.$refs[form].validate((valid) => {
                if (valid) {
                    this.$inertia.post('/admin/destinations/create', this.form).then(() => {
                        this.$message({
                            message: 'sauvegarde reussite !',
                            type: 'success'
                        });
                    })
                } else {
                    console.log('error submit!!');
                    return false;
                }
                });
            },
        },
        watch: {

            image_to: function(val) {

                this.form.image_to = this.images[val].original;
                this.form.thumb_to = this.images[val].thumbail;

            },

            image_from: function(val) {

                this.form.image_from = this.images[val].original;
                this.form.thumb_from = this.images[val].thumbail;
            }


        },
        mounted() {
        }
    }
</script>

<style lang="scss">

.el-collapse-item__header {
    font-size: 18px;
    font-weight: 700;
    padding: 10px;
    color: #67c23a;
}
 .text {
    font-size: 14px;
  }

  .item {
    padding: 18px 0;
  }

  .box-card {
    margin: 20px;
    width: 100%;
  }
</style>
