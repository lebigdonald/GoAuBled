<template>
    <section id="services" class="how-it-work">
        <div class="container">
            <div class="section-header pl-5">
                <h2 class="text-center text-center">Comment ca marche</h2>
            </div>
            <div class="block">
                <el-timeline>
                    <el-timeline-item v-for="step in steps" :key="step.id" :timestamp="'Etape ' + step.id" placement="top">
                        <el-card>
                            <h4 class="quigo-animate-class-css-element" v-html="step.title"></h4>
                            <p class="quigo-animate-class-css-element" v-html="step.text"></p>
                        </el-card>
                    </el-timeline-item>
                    <el-timeline-item>
                        <el-card v-if="moreLink">
                            <b-link :href="moreLink" class="btn btn-secondary btn-lg btn-block mt-4 quigo-animate-class-css-element">lire la suite</b-link>
                        </el-card>
                    </el-timeline-item>
                </el-timeline>
            </div>
        </div>
    </section>
</template>

<script>
export default {
    props: ['steps', 'moreLink']

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
