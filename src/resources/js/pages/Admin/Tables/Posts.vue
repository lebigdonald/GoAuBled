<template>
    <adminLayout title="Posts">
        <div class="row">
            <h4 class="text-info border-bottom">Posts</h4>

            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">N°</th>
                    <th scope="col">From</th>
                    <th scope="col">To</th>
                    <th scope="col">Date From</th>
                    <th scope="col">Date To</th>
                    <th scope="col">Type</th>
                    <th scope="col">Validate(bool)</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="(post, index) in laravelData.data" :key="index">
                    <th scope="row" v-html="post.id"></th>
                    <td v-html="post.from"></td>
                    <td v-html="post.to"></td>
                    <td v-html="post.dateFrom"></td>
                    <td v-html="post.dateTo"></td>
                    <td v-html="post.categorie_id === 1 ? 'Packet' : 'Voyage'"></td>
                    <td v-html="post.publish ? 'Oui' : 'Pas encore'"></td>
                    <td>
                        <div class="d-flex justify-content-between">
                            <el-link class="text-danger" icon="el-icon-delete p-1" @click="remove(index, post.id)">Supprimer</el-link>
                            <el-link class="text-success" @click="selectPost(index)">voir plus<i class="el-icon-view el-icon--right"></i> </el-link>
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>

            <div class="col-12 my-4">
                <pagination :data="laravelData" align="right" @pagination-change-page="getResults">
                    <span slot="prev-nav">&lt; Previous</span>
                    <span slot="next-nav">Next &gt;</span>
                </pagination>
            </div>

            <div class="col-12 border" v-if="postToSee">
                <div class="card w-100">
                    <div class="card-header">
                        Details
                    </div>
                    <div class="card-body" v-if="postToSee.categorie_id === '2'">
                        <h5 class="card-title" v-html="postToSee.from + ' => ' + postToSee.to"></h5>
                        <div class="row">
                            <div class="col-4 border">Kilos Disponibles: </div>
                            <div class="col-8 border">20</div>
                        </div>
                        <div class="row p-2">
                            <div class="col-4 border">Enveloppe: {{ transformer(postToSee.objects).available ? 'OUI ACCEPTE LES ENVELOPPES' : 'NON' }}</div>
                            <div class="col-4 border" v-if="transformer(postToSee.objects).available" v-html="transformer(postToSee.objects).number"></div>
                            <div class="col-4 border" v-if="transformer(postToSee.objects).available" v-html="transformer(postToSee.objects).price + 'Euro/Envelope'"></div>
                        </div>
                        <div class="row p-2">
                            <div class="col-12">
                                <h6 class="font-weight-bold">Billet d'avion</h6>
                                <div class="list-group">
                                    <button v-for="url in urls" :key="url.id" type="button" class="list-group-item list-group-item-action">
                                        <a :href="url.original" target="_blank" rel="noopener noreferrer" class="font-weight-bold text-danger" v-html="url.original"></a>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="">
                            <button class="btn btn-success m-1" @click="validate(postToSee.id)">valider le post</button>
                        </div>
                    </div>
                    <div class="card-body" v-else>
                        <h5 class="card-title" v-html="postToSee.from + ' => ' + postToSee.to"></h5>
                        <div class="row">
                            <div class="col-4 border">Kilos Disponibles: </div>
                            <div class="col-8 border">20</div>
                        </div>
                        <div class="row p-2">
                            <div class="col-12">
                                <h6 class="font-weight-bold">Billet d'avion</h6>
                                <div class="list-group">
                                    <button v-for="item2 in transformer(postToSee.objects)" :key="item2.id" type="button" class="list-group-item list-group-item-action">
                                        <span class="badge-success" v-html="item2.description + '(' + item2.qte + ')'"></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col-12">
                                <h6 class="font-weight-bold">Billet d'avion</h6>
                                <div class="list-group">
                                    <button v-for="url in urls" :key="url.id" type="button" class="list-group-item list-group-item-action">
                                        <a :href="url.original" target="_blank" rel="noopener noreferrer" class="font-weight-bold text-danger" v-html="url.original"></a>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="">
                            <button class="btn btn-success m-1" @click="validate(postToSee.id)">valider le post</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </adminLayout>
</template>

<script>
import adminLayout from './../Layout/master';
Vue.component('pagination', require('laravel-vue-pagination'));

export default
{
    components:{adminLayout},

    data() {
        return {
            laravelData: {},
            toSee: null,
            urls: []
        };
    },
    methods: {
        selectPost(index) {
          this.toSee = this.laravelData.data[index];
        },
        async remove(index ,id) {

            await this.laravelData.data.splice(index, 1);

            this.$inertia.post('/api/post/destroy/' + id, {}).then(() => {})
        },

        async validate(id) {
            this.$inertia.post('/api/post/validate/' + id, {
                id: id
            }).then(() => {})
        },

        getResults(page = 1) {
            axios.get('/api/admin/posts?page=' + page)
                .then(response => {
                    this.laravelData = response.data;
                });
        },
        transformer(element) {

            let data = JSON.parse(element);

            return data;
        },
    },
    watch: {
      toSee(val) {
          this.urls = val.images
      }
    },
    computed: {
        postToSee() {
            return this.toSee;
        }
    },
    mounted() {
        this.getResults();
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

.table{
    font-size: 12px;

    td {
        font-size: 12px;
    }

    th {
        font-size: 12px;
    }
}

</style>
