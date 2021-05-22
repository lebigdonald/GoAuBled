<template>
    <adminLayout title="About" class="bg-light">
        <div class="mb-2">
            <div class="row">
                <div class="col-12">
                    <div class="offset-2">
                        <div class="form-group">
                            <input type="text" id="title" v-model="title" class="form-control" placeholder="Meta Title">
                        </div>
                        <div class="form-group">
                            <input type="text" id="description" v-model="metaDescription" class="form-control" placeholder="Meta Description">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <editor :title="title" :name="name" :meta-description="metaDescription"/>
    </adminLayout>
</template>

<script>
import adminLayout from './Layout/master';
import editor from "../Shared/editor";

export default {
    props: ['page'],
    components: {
        adminLayout,
        editor
    },
    data() {
        return {
            name: 'about',
            title: '',
            metaDescription : '',
        };
    },
};
</script>

