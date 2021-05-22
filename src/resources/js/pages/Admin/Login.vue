




 j <template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="card shadow-lg border-0 rounded-lg mt-5 w-100">
                    <div class="card-header"><h3 class="text-center font-weight-light text-black-50 my-4">Admin Login</h3></div>
                    <div class="card-body">
                        <ValidationObserver v-slot="{ handleSubmit }">
                            <form @submit.prevent="handleSubmit(onSubmit)">
                                <validation-provider v-slot="{ errors }" rules="required">
                                    <div class="form-group">
                                        <label class="small mb-1" for="inputEmailAddress">Email</label>
                                        <input class="form-control py-4" id="inputEmailAddress" v-model="form.email" :class="{ 'is-invalid': errors[0] !== undefined }" type="email" placeholder="Enter email address" />
                                    </div>
                                </validation-provider>
                                <validation-provider v-slot="{ errors }" rules="required">
                                    <div class="form-group">
                                        <label class="small mb-1" for="inputPassword">Password</label>
                                        <input class="form-control py-4" id="inputPassword" v-model="form.password" :class="{ 'is-invalid': errors[0] !== undefined }" type="password" placeholder="Enter password" />
                                        <small class="form--error">{{ errors[0] }}</small>
                                    </div>
                                </validation-provider>
                                <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                    <button class="btn btn-primary" type="submit">Login</button>
                                </div>
                            </form>
                        </ValidationObserver>
                    </div>
                    <div class="card-footer text-center">
                    </div>
                </div>
            </div>
        </div>
    </div>
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
    data: function () {
        return {
            form: {
                email: '',
                password: '',
            },
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

            formData.append('email', this.form.email);
            formData.append('password', this.form.password);

            axios.post('/admin/login', formData, config)
                .then(function (response) {
                    window.location = response.data;
                })
                .catch(function (error) {
                    if (error.response.data) {
                        el.errors = error.response.data.errors;
                    }
                });
            }
        },
    }
</script>
