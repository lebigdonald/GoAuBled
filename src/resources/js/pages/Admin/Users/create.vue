<template>
    <adminLayout title="Add new Admin">
        <div class="container">
            <div v-show="success">
                <el-alert
                    title="Super !"
                    type="success">
                </el-alert>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <el-form :model="form" status-icon :rules="rules" ref="form" label-width="120px">

                        <el-form-item label="Name" prop="name">
                            <el-input type="text" v-model="form.name"></el-input>
                        </el-form-item>

                        <el-form-item label="Email" prop="email">
                            <el-input type="email" v-model="form.email"></el-input>
                        </el-form-item>

                        <el-form-item label="Password" prop="password">
                            <el-input type="password" v-model="form.password" autocomplete="off"></el-input>
                        </el-form-item>

                        <el-form-item label="Confirm" prop="password_confirmation">
                            <el-input type="password" v-model="form.password_confirmation" autocomplete="off"></el-input>
                        </el-form-item>

                        <el-form-item>
                            <el-button type="primary" @click="submitForm('form')">Submit</el-button>
                        </el-form-item>

                        </el-form>
                </div>
            </div>
        </div>
    </adminLayout>
</template>

<script>
import adminLayout from '../Layout/master';

    export default {
        components: {
            adminLayout
        },
        data() {
        var validatePass = (rule, value, callback) => {
            if (value === '') {
            callback(new Error('Please input the password'));
            } else {
            if (this.form.password_confirmation !== '') {
                this.$refs.form.validateField('password_confirmation');
            }
            callback();
            }
        };
        var validatePass2 = (rule, value, callback) => {
            if (value === '') {
            callback(new Error('Please input the password again'));
            } else if (value !== this.form.password) {
            callback(new Error('Two inputs don\'t match!'));
            } else {
            callback();
            }
        };
        return {
            success: false,
            form: {
            password: '',
            password_confirmation: '',
            name: '',
            email: ''
            },
            rules: {
                password: [{ validator: validatePass, trigger: 'blur' }],
                password_confirmation: [{ validator: validatePass2, trigger: 'blur' }],
                name: [{ required: true, message: 'le nom est obligatoire', trigger: 'blur' },],
                email: [{ required: true, message: 'entrez un email valid svp', trigger: 'blur' },]
            }
        };
        },
        methods: {
        submitForm(formName) {
            this.$refs[formName].validate((valid) => {
            if (valid) {
                this.$inertia.post('/admin/users/create', this.form).then(() => {
                    this.success = true;
                })
            } else {
                console.log('error submit!!');
                return false;
            }
            });
        }
        }
    }
</script>
