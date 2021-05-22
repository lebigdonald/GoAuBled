<template>
    <div class="text-center">
        <div class="">
            <el-link @click="modalShow = !modalShow" class="mb-2 text-primary">Voir les images de l objet a envoyer
                <i class="el-icon-picture el-icon--right"></i>
            </el-link>
        </div>

        <b-modal id="modal-multi-1"  size="lg" v-model="modalShow"  :title="colisName" ok-only no-stacking>
            <el-carousel indicator-position="outside" height="800">
                <el-carousel-item v-for="item in images" :key="item.id">
                    <img :src="item.original" width="100%" height="100%" :alt="item.original" style="object-fit: cover;">
                </el-carousel-item>
            </el-carousel>
        </b-modal>
    </div>
</template>
<script>
    export default {
        props: ['colisName', 'images'],
        data() {
            return {
                modalShow: false
            }
        }
    }
</script>
<style>
    .el-carousel__item h3 {
        color: #475669;
        font-size: 18px;
        opacity: 0.75;
        line-height: 300px;
        margin: 0;
    }
</style>
