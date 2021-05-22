<template>
    <section class="bg-page-header mb-4">
        <el-collapse v-for="el in faqs" :key="el.id" v-model="activeNames" @change="handleChange">
            <el-card class="box-card">
                <div slot="header" class="clearfix">
                    <h4 class="font-weight-bold" v-html="el.name"></h4>
                </div>
                <el-collapse-item v-for="item in el.questions" :key="item.id" :title="item.name" :name="item.id">
                    <div v-html="item.answer"></div>
                </el-collapse-item>
            </el-card>
        </el-collapse>
    </section>
</template>
<script>
    export default {
        props: ['faqs'],
        data: function () {
            return {
                activeNames: ['1']
            }
        },
        methods: {
            handleChange(val) {
                console.log(val);
            }
        }
    }
</script>
<style lang="scss">
    h4 {
        color: #0c2e8a;
        padding: 0;
        margin: 0;
    }
    .bg-page-header {
        background-color: rgb(233, 236, 239);
    }
    .el-collapse-item__header {
        font-size: 16px !important;
        font-weight: bold;
    }
</style>
