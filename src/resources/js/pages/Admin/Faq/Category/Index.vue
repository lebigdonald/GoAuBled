<template>
    <adminLayout title="Add new Admin">
        <h3 class="text-success">Categories</h3>
        <div class="container">
            <div v-show="success">
                <el-alert
                    title="Super !"
                    type="success">
                </el-alert>
            </div>
            <div class="row justify-content-center">

                <div class="col-md-12 border p-4">

                    <el-form  :model="form" status-icon :rules="rules" ref="form" label-width="120px">

                        <el-form-item label="Name" prop="name">
                            <el-input type="text" v-model="form.name"></el-input>
                        </el-form-item>

                        <el-form-item type="flex">
                            <el-button type="success" @click="submitForm('form')" v-html="isCreate ? 'Create': 'Update'"></el-button>
                            <el-button type="warning" @click="reset">Cancel</el-button>
                        </el-form-item>

                    </el-form>


                </div>



            </div>
            <div class="row m-5" v-show="categories.length > 0">
                <div class="col-md-12 border p-2">
                    <table class="table table-bordered">
                        <thead>
                        <tr class="text-center">
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Delete</th>
                            <th scope="col">Edit / voir</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr  v-for="item in pagedTableData" :key="item.id">
                            <th scope="row">{{ item.id }}</th>
                            <td>{{ item.name }}</td>
                            <td class="text-center">
                                <button @click="deleteItem(item.id)" class="btn btn-outline-danger">
                                   Delete
                                </button>                            </td>
                            <td class="text-center">
                                <button @click="editItem(item)" class="btn btn-outline-success">
                                    Edit / voir
                                </button>
                            </td>
                        </tr>
                        </tbody>
                    </table>





                    <el-pagination
                        layout="prev, pager, next"
                        :total="this.categories.length"
                        @current-change="setPage">
                    </el-pagination>

                </div>
            </div>
        </div>

 </adminLayout>
</template>

<script>
import adminLayout from '../../Layout/master';

    export default {
        props:['categories'],
        components: {
            adminLayout
        },
        data() {
        return {
            success: false,
            editElement: '',
            isCreate: true,
            page:1,
            pageSize: 5,
            form: {
                name: '',
                id: ''
            },
            rules: {
                name: [{ required: true, message: 'le nom est obligatoire', trigger: 'blur' },]
            }
        };
        },
        methods: {
            submitForm(formName) {
                this.$refs[formName].validate((valid) => {
                if (valid) {
                    this.$inertia.post('/admin/faq/category', this.form).then(() => {
                        this.success = true;
                        this.reset();
                    })
                } else {
                    console.log('error submit!!');
                    return false;
                }
                });
            },
            deleteItem(id) {

                this.$inertia.delete('/admin/faq/category/' + id).then(() => {
                    this.success = true;
                   this.reset();
                })

            },
            editItem(item){

                this.form.name = item.name;

                if (item.id !== undefined) {
                    this.form.id = item.id;
                }

                this.isCreate = false;
            },

            reset(){
                this.form.name = '';
                this.form.id = '';
                this.isCreate = true;

            },
            setPage (val) {
                this.page = val
            }
        },
        mounted() {
            this.isCreate = true;
        },
        computed: {
            pagedTableData() {
              return this.categories.slice(this.pageSize * this.page - this.pageSize, this.pageSize * this.page)
            }
        },
    }
</script>
