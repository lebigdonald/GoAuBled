<template>
    <adminLayout title="Images Create">
        <div class="container text-center">
            <div class="row justify-content-center box-import-photos ml-5">
                <div class="col-md-12 bg-dark text-white rounded py-3 my-2 text-center d-flex justify-content-center align-items-center" ref="imageUpload">
                    dropper les les images ici
                </div>
            </div>
        </div>
    </adminLayout>
</template>

<script>
import adminLayout from '../Layout/master';
import Dropzone from 'dropzone';

    export default {
        components: {
            adminLayout
        },
        data: function () {
           return {
                dropzone: null,
                title: 'Images'
           }
        },
        mounted() {
            this.dropzone = new Dropzone(this.$refs.imageUpload, {
                url: '/api/galerie/store'
            });
        }
    }
</script>
