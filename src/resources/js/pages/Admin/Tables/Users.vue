<template>
    <adminLayout title="Posts">
        <div class="row">
            <h4 class="text-info border-bottom">Utilisateurs</h4>

            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">N°</th>
                    <th scope="col">name</th>
                    <th scope="col">email</th>
                    <th scope="col">members from</th>
                    <th scope="col">Verify</th>
                    <th scope="col">posts</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="(user, index) in laravelData.data" :key="index">
                    <th scope="row" v-html="user.id"></th>
                    <td v-html="user.name"></td>
                    <td v-html="user.email"></td>
                    <td v-html="user.created_at"></td>
                    <td v-html="user.email_verified_at ? 'OUI' : 'NON'"></td>
                    <td v-html="user.posts.length"></td>
                    <td>
                        <div class="d-flex justify-content-between">
                            <el-link class="text-danger" icon="el-icon-delete p-1" @click="remove(index, user.id)">Supprimer</el-link>
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
            toSee: null
        };
    },
    methods: {
        selectPost(index) {
            this.toSee = this.laravelData.data[index];
        },
        async remove(index ,id) {

            await this.laravelData.data.splice(index, 1);

            this.$inertia.post('/api/user/destroy/' + id, {}).then(() => {})
        },

        getResults(page = 1) {
            axios.get('/api/admin/users?page=' + page)
                .then(response => {
                    this.laravelData = response.data;
                });
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
