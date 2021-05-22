<template>
    <div>
        <section id="intro" :style="{ backgroundImage: `url('${backgroundImage}')`,  'height':  '300px' }">
            <div class="intro-content mt-0">
                <h2 class="text-center font-weight-bold">{{ category.name }}</h2>
            </div>
        </section><!-- #intro -->
        <section id="services" class="how-it-work">
            <div class="container">
                <div class="row border">
                    <div class="col-md-3">
                        <b-list-group class="">
                            <b-list-group-item v-for="item in categories" v-bind:class="{ active:  false}" href="#" @click="setCategory(item)" :key="item.id">{{ item.name }}</b-list-group-item>
                        </b-list-group>
                    </div>
                    <div class="col-md-9">
                        <div class="block">
                            <el-timeline>
                                <el-timeline-item v-for="(step, index) in category.steps" :key="step.id" :timestamp="'Etape ' + (index +1)" placement="top">
                                    <el-card>
                                        <h4 class="quigo-animate-class-css-element" v-html="step.title"></h4>
                                        <p class="quigo-animate-class-css-element" v-html="step.text"></p>
                                    </el-card>
                                </el-timeline-item>
                            </el-timeline>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>

<script>
export default {
    props: ['categories'],

    data() {
        return {
            'backgroundImage': '/assets/img/intro-carousel/5.jpg',
            'active': false,
            'category': {}
        }
    },
    methods: {
        setCategory(key) {
            this.category = key
        }
    },
    computed: {
        steps(category) {
            return category.steps;
        }
    },
    mounted() {
        this.setCategory(this.categories[0]);
    }

}
</script>

<style lang="scss">

.how-it-work {
    background-color: #e9ecef;
    margin-top: 30px;
    margin-bottom: 30px;

    .container {
        padding-top:20px;
        padding-bottom: 20px;
    }
}

.el-timeline-item__tail {
    border-left: 2px solid #0c2e8a;
}
.el-timeline-item__node {
    background-color: #8bc73d;
}

</style>
