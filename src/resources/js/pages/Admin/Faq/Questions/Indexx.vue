<template>
    <adminLayout title="Add new Admin">
        <h3 class="text-success">FAQS</h3>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12">
                    <el-collapse v-for="el in questions" :key="el.id" v-model="activeNames" @change="handleChange">
                        <el-card class="box-card">
                            <div slot="header" class="clearfix">
                                <h4 class="font-weight-bold" v-html="el.name"></h4>
                            </div>
                            <el-collapse-item v-for="item in el.questions" :key="item.id" :title="item.name" :name="item.id">
                                <div v-html="item.answer"></div>
                            </el-collapse-item>
                        </el-card>
                    </el-collapse>
                </div>
            </div>
        </div>
    </adminLayout>
</template>

<script>
import adminLayout from '../../Layout/master';

export default {
    props:['questions'],
    components: {
        adminLayout
    },
    data() {
        return {
            activeNames: ['1']
        };
    },
    methods: {
        handleChange(val) {
            console.log(val);
        }
    }
}
</script>
