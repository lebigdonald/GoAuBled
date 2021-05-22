<template>
    <adminLayout title="Home">
        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body">Voyages</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="#">Voir plus</a>
                        <div class="small text-white">50<i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-warning text-white mb-4">
                    <div class="card-body">Packets</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="#">Voir plus</a>
                        <div class="small text-white">60<i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-success text-white mb-4">
                    <div class="card-body">Users</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="#">Voir plus</a>
                        <div class="small text-white">100<i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-danger text-white mb-4">
                    <div class="card-body">Messages</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="#">Voir plus</a>
                        <div class="small text-white">80<i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="p-4 border">
            <div>
                <strong class="font-weight-bold"><h3>Best Destinations</h3></strong>
            </div>
            <el-row :gutter="12" v-for="(item, index) in trajets" :key="item.id" class="m-2">
                <el-col :span="8">
                    <el-card shadow="allways">
                        <h4>{{ item.city_from }}</h4>
                        <div class="border" style="width:250px;heigth:250px">
                            <img :src="item.thumb_from" :alt="item.thumb_from">
                        </div>
                    </el-card>
                </el-col>
                <el-col :span="8">
                    <el-card shadow="allways">
                        <h4>{{ item.city_to }}</h4>
                        <div class="border" style="width:250px;heigth:250px">
                            <img :src="item.thumb_to" :alt="item.thumb_to">
                        </div>
                    </el-card>
                </el-col>
                <p><el-button class="float-left" type="danger" @click="remove(item.id, index)">delete</el-button></p>
            </el-row>
        </div>
    </adminLayout>
</template>

<script>
import adminLayout from './Layout/master';

    export default
    {
        props: ['destinations'],

        components:
        {
            adminLayout,
        },
        data() {
            return {
                trajets: []
            };
        },
        methods: {
            async remove(id, index) {

               await this.trajets.splice(index, 1);

               this.$inertia.post('/admin/destinations/destroy/' + id, {}).then(() => {})
            }
        },
        mounted() {
            this.trajets = this.destinations;
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

</style>
