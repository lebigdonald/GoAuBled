<template>
    <div>
        <el-form  :model="inputs[0]" status-icon :rules="rules" ref="inputs" label-width="120px" class="demo-form-inline">
            <div class="border m-3 p-3" v-for="(input, index) in inputs" :key="index">
                <div class="d-flex justify-content-center justify-content-between mb-2">
                    <h4>Step {{ index + 1 }}</h4>
                    <el-row>
                        <el-button type="primary" icon="el-icon-circle-plus-outline" circle @click="add()"></el-button>
                        <el-button type="danger" icon="el-icon-delete" circle @click="remove(index)"></el-button>
                    </el-row>
                </div>
                <el-form-item label="title" :prop="title">
                    <el-input type="text" v-model="input.title"></el-input>
                </el-form-item>

                <el-form-item label="body" :prop="text">
                    <el-input type="text" v-model="input.text"></el-input>
                </el-form-item>

                <el-form-item label="Category" :prop="inputs.category">
                    <el-select v-model="input.category" placeholder="Select">
                        <el-option
                            v-for="item in categoriesList"
                            :default-first-option="true"
                            :key="item.id"
                            :label="item.name"
                            :value="item.id">
                        </el-option>
                    </el-select>
                </el-form-item>
            </div>
            <el-form-item>
                <el-button type="success" @click="addHowItWork()">Save</el-button>
                <el-button type="success" class="float-right" v-b-modal.modalPopover>Add Category</el-button>
            </el-form-item>
        </el-form>
        <b-modal id="modalPopover" title="Comment ca marche - Categories" ok-only>
            <el-row>
                <el-col :span="12">
                    <div class="grid-content">
                        <el-form :ref="category" label-width="" class="demo-form-inline">
                            <el-form-item :prop="title">
                                <el-input type="text" class="" v-model="category.name"></el-input>
                            </el-form-item>
                            <el-form-item>
                                <el-button type="success" @click="addCategory()">Save</el-button>
                            </el-form-item>
                        </el-form>
                    </div>
                </el-col>
                <el-col :span="12">
                    <div class="grid-content bg-purple-light p-2">
                        <b-list-group>
                            <b-list-group-item v-for="(i, index) in categories" :key="i.id">
                                {{ (index + 1) + ') ' + i.name }} <button type="button" aria-label="Close" class="close catDelete" @click="deleteCat(i.id, index)">×</button>
                            </b-list-group-item>
                        </b-list-group>
                    </div>
                </el-col>
            </el-row>
        </b-modal>
    </div>
</template>
<script>
export default {
props: ['steps', 'categories'],
data () {
    return {
        categoriesList: [],
        title: '',
        text: '',
        inputs: [{
            id: null,
            title: '',
            text: '',
            category: ''
        }],
        rules: {
            title: [{ required: true, message: 'champs requis!', trigger: 'blur' },],
            text: [{ required: true, message: 'champs requis', trigger: 'blur' },],
            category: [{ required: true, message: 'champs requis', trigger: 'blur' },]
        },
        category: { name: ''}
    }
  },

  methods: {
    add () {
      this.inputs.push({
        id: null,
        title: '',
        text: '',
        category: ''
      })
      console.log(this.inputs)
    },

    remove (index) {

      this.inputs.splice(index, 1);

    },

    addHowItWork ()
    {
        this.$inertia.post('/admin/steps/create', this.inputs).then(() => {})
    },

    addCategory() {

       this.$inertia.post('/admin/howWork/category/store', this.category).then((res) => {
           this.categoriesList.push(res.data);
       })

    },

      deleteCat(id, index) {
          this.categoriesList.splice(index, 1);
          this.$inertia.post('/admin/howWork/category/delete', {id: id}).then(() => {});
      }
  },
  mounted() {
    if (this.steps.length > 0) {
        this.inputs = this.steps;
    }
    this.categoriesList = this.categories;
  }
}
</script>

<style>
.bg-purple-light {
    background: #e5e9f2;
}
.catDelete {
    font-size: 14px;
    color: red;
}
</style>
