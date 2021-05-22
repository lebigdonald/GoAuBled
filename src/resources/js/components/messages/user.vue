<template>
    <div id="profile" class="mb-4">
        <div class="wrap" v-show="selectContact">
            <img id="profile-img" :src="selectContact.avatar_original ? selectContact.avatar_original : 'storage/UsersAvatars/'+ selectContact.avatar" class="online" alt="" />
            <p>{{ selectContact.name }}</p>
            <i class="fa fa-chevron-down expand-button" aria-hidden="true"></i>
            <div id="expanded">
                <label for="twitter"><i class="fa fa-facebook fa-fw" aria-hidden="true"></i></label>
                <input name="twitter" type="text" :value="selectContact.name" />
                <label for="twitter"><i class="fa fa-twitter fa-fw" aria-hidden="true"></i></label>
                <input name="twitter" type="text" :value="selectContact.email" />
                <label for="twitter"><i class="fa fa-instagram fa-fw" aria-hidden="true"></i></label>
                <input name="twitter" type="text" :value="selectContact.email_verified_at ? 'verifier' : 'Pas verifier'" />
            </div>
        </div>
    </div>
</template>

<script>
export default {
computed: {
        selectContact: function() {
            return Store.getters.selectContact;
        }
    },
}
</script>

<style>

</style>
