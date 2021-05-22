<template>
    <adminLayout title="About">
        <div class="p-4">
            <el-form :inline="false"  :model="form" status-icon :rules="rules" ref="form" label-width="120px" class="demo-form-inline">
                <app-editor :language="language" ref="editor" @save="on_save_method" @onChange="on_change_method" />
            </el-form>
        </div>
    </adminLayout>
</template>

<script>
import adminLayout from './Layout/master';

export default
{
    components:
        {
            adminLayout,
        },
    data() {
        return {
            images: null,
            language: 'fr_FR',
            image: null,
            form: {
                title: '',
                subtitle: '',
                image: '',
                thumb: '',
                content: '',
                section: '',
                id: null
            },
            rules: {

            }
        };
    },
    methods: {
        submitForm(formName) {
            this.$refs[formName].validate((valid) => {
                this.blocks.push();
                if (valid) {
                    this.$inertia.post('/admin/blocks/create', {blocks: this.blocks,page: this.page}).then(() => {
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
        getImages() {
            axios.get('/api/images').then((response) => {
                this.images = response.data;
            })
        },

        on_save_method(value) {
            console.log(value);
        },

        on_change_method(value) {
            console.log(value);
        }

    },
    computed: {

        blocks: () => {
            return store.getters.getBlocks;
        }

    },
    mounted() {
        this.getImages();
        this.$refs.editor.save();
    },
}
</script>

<style lang="scss">

.time {
    font-size: 13px;
    color: #999;
}

.bottom {
    margin-top: 13px;
    line-height: 12px;
}

.button {
    padding: 0;
    float: right;
}

.image {
    width: 250px;
    display: block;
}

.clearfix:before,
.clearfix:after {
    display: table;
    content: "";
}

.clearfix:after {
    clear: both
}
.contents {
    display: flex;

    & > div {
        flex: 1;
        box-sizing: border-box;
    }
    #source {
        padding: 0 0 0 1rem;
        pre {
            white-space: pre-wrap;
            font-size: 1.2rem;
        }
    }
}

@media screen and (max-width:600px) {
    .contents {
        display: block;

        & > div {
            width: 100%;
        }
    }
}
// inline text style
.ve-red {
    color: #f44;
}
.ve-bold {
    font-weight: bold;
}

</style>
