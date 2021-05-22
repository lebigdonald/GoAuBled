<template>
    <div>
        <h2 class="border-bottom">Modifier votre profile</h2>
        <div class="mb-4">
            <el-steps :active="step" align-center>
                <el-step v-for="step in titles" :title="step" :key="step" description=""></el-step>
            </el-steps>
        </div>

        <div class="">
            <el-form :label-position="labelPosition" label-width="100px" :model="form">
                <div class="step 1" v-if="step === 1">
                    <el-form-item label="Nom">
                        <el-input v-model="form.name"></el-input>
                    </el-form-item>
                    <el-form-item label="Prenom">
                        <el-input v-model="form.region"></el-input>
                    </el-form-item>
                    <el-form-item label="Email">
                        <el-input v-model="form.type"></el-input>
                    </el-form-item>
                </div>

                <div class="step 1" v-if="step === 2">
                    <el-form-item label="ville">
                        <el-input v-model="form.name"></el-input>
                    </el-form-item>
                    <el-form-item label="Code Postal">
                        <el-input v-model="form.region"></el-input>
                    </el-form-item>
                    <el-form-item label="Pays">
                        <el-input v-model="form.type"></el-input>
                    </el-form-item>
                </div>

                <el-form-item>
                    <el-button type="primary" @click="next()">suivant</el-button>
                    <el-button @click="prev()">retour</el-button>
                </el-form-item>
            </el-form>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            titles: ['Step 1', 'Step 2', 'Envoyer'],
            title: 'Step 1',
            step: 1,
            labelPosition: 'right',
            form: {
                name: '',
                prenom: '',
                email: ''
            }
        };
    },
    methods: {
        prev() {
            if (this.step <= 1) {
                return;
            }
            this.title = this.titles[this.step];
            this.step--;
        },
        next() {
            if (this.step >= 2) {
                return;
            }
            this.title = this.titles[this.step];
            this.step++;
        }
    }
}
</script>
