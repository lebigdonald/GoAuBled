<template>
    <div class="border p-4">
        <el-form :inline="false"  :model="form" status-icon :rules="rules" ref="form" label-width="120px" class="demo-form-inline">
            <div class="row">
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-12">
                            <el-form-item label="Title" prop="title">
                                <el-input type="text" v-model="form.title"></el-input>
                            </el-form-item>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-12">
                            <el-form-item label="Body" prop="content">
                                <el-input type="textarea" :autosize="{ minRows: 8}" v-model="form.content"></el-input>
                            </el-form-item>
                            <el-form-item>
                                <el-button type="primary" @click="submitForm('form')">valider</el-button>
                            </el-form-item>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <el-form-item label="Image" prop="image">
                        <el-select v-model="image" placeholder="selectionner une image">
                            <el-option v-for="img in images" :key="img.id" :label="'Image N°' + img.id" :value="img"></el-option>
                        </el-select>
                    </el-form-item>
                    <div class="border rounded" style="width:250px;height:250px; float:right">
                        <img v-if="thumb" :src="thumb" :alt="thumb">
                    </div>
                </div>
            </div>

        </el-form>
    </div>
</template>

<script>
    export default {
        props: ['images', 'editheader', 'path', 'block'],
        data() {
        return {
            thumb: '',
            image: null,
            form: {
                title: '',
                image: '',
                thumb: '',
                content: '',
                section: '',
                id: null
            },
            rules: {
                content: [{ required: true, message: 'champs requis!', trigger: 'blur' },],
                image: [{ required: true, message: 'champs requis', trigger: 'blur' },]
            }
        };
        },
        methods: {
        submitForm(formName) {
            this.$refs[formName].validate((valid) => {
                this.form.thumb = this.thumb;
            if (valid) {
                this.$inertia.post(this.path, this.form).then(() => {
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
        }
        },
        watch: {
            image: function(val) {
                this.form.image = val.original;
                this.thumb = val.thumbail;
            }
        },
        mounted() {
            if (this.editheader !== null) {
                this.form.title = this.editheader.title;
                this.thumb = this.editheader.thumb;
                this.form.content = this.editheader.content;
                this.form.id = this.editheader.id;
            }
            if (this.block) {
                this.form.section = this.block;
            }
        }
    }
</script>

<style lang="scss">

.el-collapse-item__header {
    font-size: 18px;
    font-weight: 700;
    padding: 10px;
    background-color: #e4e7ed;
    color: #67c23a;
}

</style>
