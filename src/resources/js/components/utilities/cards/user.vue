<template>
    <a href="#">
        <div class="border my-3 px-2 rounded">
            <div class="profile-block">
                <div class="d-flex flex-column justify-content-center align-items-center p-2 my-2">
                    <img class="rounded-circle z-depth-2 mt-1 ml-1 user__bild_post" width="96" alt="100x100" :src="'/' + user.avatar"
                         data-holder-rendered="true">
                    <div class="text-start mt-2 font-weight-bold" v-html="user.name"></div>
                </div>
                <div class="notice justify-center text-center notice-success stars">
                    <div class="d-flex justify-content-between">
                        <div class="strong">Votes :</div>
                        <div>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <div class="d-flex justify-content-between flex-column">
                    <span class="text-success">Membre verifié</span>
                    <span v-if="user.email_verified_at"><i class="fa fa-user-check mr-2 text-success"></i></span>
                    <span v-else><i class="fa fa-user-check mr-2 text-danger"></i></span>
                </div>
                <span class="vorHumanns">{{ postDate }}</span>
            </div>
        </div>
    </a>
</template>

<script>
export default {
    props: ['user','postDate', 'asset'],

    data: function () {
        return {
            display_id: ''
        }
    },
    methods: {
        displayProfile() {
            console.log('yesssssss');
        }
    },
    mounted() {

    }

}
</script>
