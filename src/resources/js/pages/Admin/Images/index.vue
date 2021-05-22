<template>
    <adminLayout title="Galerie Photos">
        <div class="container">
            <div class="row justify-content-center">
                <div class="row">
                    <div v-for="img in images" :key="img.id" class="col-md-3 border">
                        <img :src="img.thumbail" alt="img.thumbail">
                        <div class="text-success font-weight-bold border-top">Image N° : {{ img.id }}</div>
                    </div>
                </div>
            </div>
        </div>
    </adminLayout>
</template>

<script>
import adminLayout from '../Layout/master';
    export default {
        props: ['images'],
        components: {
            adminLayout
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
