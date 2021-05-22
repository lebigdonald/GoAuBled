<template>
    <ValidationObserver v-slot="{ handleSubmit }">
        <form @submit.prevent="handleSubmit(onSubmit)">
            <div class="ml-3 p-0">Avatar</div>

            <el-upload
                v-model="form.avatar"
                class="avatar-uploader"
                action="/register"
                :on-change="updateImageList"
                :show-file-list="false"
                :on-success="handleAvatarSuccess"
                :before-upload="beforeAvatarUpload">
                <img v-if="imageUrl" :src="imageUrl" class="uploaded-avatar">
                <i v-else class="el-icon-plus avatar-uploader-icon"></i>
            </el-upload>

            <validation-provider v-slot="{ errors }" rules="required">
                <div class="form-group">
                    <input id="username" v-model="form.name" :class="{ 'is-invalid': errors[0] !== undefined }" class="form-control" name="name"
                           placeholder="Nom" type="text">
                    <small class="form--error">{{ errors[0] }}</small>
                </div>
            </validation-provider>

            <validation-provider v-slot="{ errors }" rules="required">
                <div class="form-group">
                    <input id="email" v-model="form.email" :class="{ 'is-invalid': errors[0] !== undefined }" class="form-control" name="email"
                           placeholder="Email" type="email">
                    <small class="form--error">{{ errors[0] }}</small>
                </div>
            </validation-provider>

            <validation-provider v-slot="{ errors }" name="confirm" rules="required">
                <div class="form-group mb-4">
                    <input id="password" v-model="form.password" :class="{ 'is-invalid': errors[0] !== undefined }" class="form-control" name="password"
                           placeholder="Mot de passe" type="password">
                    <small class="form--error">{{ errors[0] }}</small>
                </div>
            </validation-provider>

            <validation-provider v-slot="{ errors }" rules="required|password:@confirm">
                <div class="form-group mb-4">
                    <input id="password_confirmation" v-model="form.password_confirmation" :class="{ 'is-invalid': errors[0] !== undefined }"
                           class="form-control" name="password_confirmation"
                           placeholder="Confirmation du mot de passe"
                           type="password">
                    <small class="form--error">{{ errors[0] }}</small>
                </div>
            </validation-provider>

            <div class="form-group">
                <button class="btn btn-block mb-4 bg-dark text-white" type="submit">S'inscrire</button>
            </div>
        </form>
    </ValidationObserver>
</template>

<script>
import {extend} from 'vee-validate';

extend('password', {
    params: ['target'],
    validate(value, {target}) {
        return value === target;
    },
    message: 'Password confirmation does not match'
});

export default {
    props: ['target'],
    data: function () {
        return {
            form: {
                name: '',
                email: '',
                password: '',
                password_confirmation: '',
                avatar: ''
            },
            imagesList: [],
            imageUrl: '',
            dialogVisible: false,
            image_error: ''
        }
    },
    methods: {
        onSubmit(evt) {
            /**
             * if (this.image_error) {
                this.$message.error(this.image_error);
                return
            }
             */
            let config = {
                headers: {
                    'Content-Type': 'application/json;charset=UTF-8',
                    "Access-Control-Allow-Origin": "*",
                    "enctype": "multipart/form-data"
                }
            };

            const el = this;

            let formData = new FormData();

            formData.append('name', this.form.name);
            formData.append('email', this.form.email);
            formData.append('password', this.form.password);
            formData.append('password_confirmation', this.form.password_confirmation);
            formData.append('avatar', this.form.avatar);

            axios.post('/register', formData, config)
                .then(function (response) {
                    window.location = response.data;
                })
                .catch(function (error) {
                    if (error.response.data) {
                        el.errors = error.response.data.errors;
                    }
                });
        },
        updateImageList(file) {
            this.form.avatar = file.raw;
            this.imageUrl = URL.createObjectURL(file.raw);
        },
        handleAvatarSuccess(file) {
            this.imageUrl = URL.createObjectURL(file.raw);
            this.dialogVisible = true;
        },
        beforeAvatarUpload(file) {
            /**
             * const isJPG = file.type === 'image/jpeg';
             const isLt2M = file.size / 1024 / 1024 < 2;

             if (!isJPG) {
                this.image_error = '\'votre avatar ne doit etre sous un format JPG!';
                return ;
            }
             if (!isLt2M) {
                this.image_error = 'votre avatar ne doit pas exceder 2MB!';
                return ;
            }

             this.image_error = '';

             return isJPG && isLt2M;
             */
        }
    },
}
</script>

<style>
.avatar-uploader .el-upload {
    border: 1px dashed #d9d9d9;
    border-radius: 6px;
    cursor: pointer;
    position: relative;
    overflow: hidden;
}

.avatar-uploader .el-upload:hover {
    border-color: #409EFF;
}

.avatar-uploader-icon {
    font-size: 28px;
    color: #8c939d;
    width: 100px;
    height: 100px;
    line-height: 100px;
    text-align: center;
    padding: 0 0;
}

.uploaded-avatar {
    vertical-align: middle;
    width: 100px;
    height: 100px;
    display: block;
    padding: 0 0 !important;
    border-radius: 50%;
    margin-left: 0;
}

.form--error {
    color: red;
}
</style>
