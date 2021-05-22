<template>
   <section class="home-news-section">
       <div class="container">
           <div class="row profile">
               <div class="col-md-3 mr-2 mt-1 profile-sidebar">
                   <div class="w-100 border">
                       <div class="d-flex justify-content-center align-items-center flex-column">
                           <img :src="'/' + user.avatar" width="100" height="100" alt="avatar">
                           <div class="info m-2 d-flex justify-content-center align-items-center flex-column">
                               <div class="font-weight-bold">
                                   {{ user.name }}
                               </div>
                               <div class="font-weight-bold">
                                   {{ user.email }}
                               </div>
                           </div>
                       </div>
                   </div>
                   <b-list-group>

                       <b-list-group-item class="d-flex justify-content-between align-items-center" :class="path === '/edit' ? 'active' : ''">
                           <router-link :to="{name: 'profile.edit'}">Completez son profile</router-link>
                       </b-list-group-item>

                       <b-list-group-item class="d-flex justify-content-between align-items-center" :class="path === '/travel' ? 'active' : ''">
                           <router-link :to="{name: 'profile.travel'}">Voyages</router-link>
                           <b-badge variant="primary" pill>0</b-badge>
                       </b-list-group-item>

                       <b-list-group-item class="d-flex justify-content-between align-items-center" :class="path === '/packets' ? 'active' : ''">
                           <router-link :to="{name: 'profile.packets'}">Packets</router-link>
                           <b-badge variant="primary" pill>0</b-badge>
                       </b-list-group-item>

                       <b-list-group-item class="d-flex justify-content-between align-items-center" :class="path === '/messages' ? 'active' : ''">
                           <router-link :to="{name: 'profile.messages'}">Messages</router-link>
                           <b-badge variant="primary" pill>1</b-badge>
                       </b-list-group-item>

                   </b-list-group>
               </div>
               <div class="col-md-8 profile-content mt-4 border mb-5">
                   <router-view></router-view>
               </div>
           </div>
       </div>
   </section>
</template>
<script>
export default {
    props: ['user'],
    data() {
        return {

        }
    },
    computed: {
        path() {
            if (this.$route !== undefined) {
                return this.$route.path;
            }
        }
    }
};
</script>

<style lang="scss" scoped>
/* Profile Content */
.profile-content {
    padding: 20px;
    background: #fff;
    min-height: 460px;
}
.active {
    background-color: #8bc73d;
    color: white;
    border: #8bc73d solid 1px;
}
.router-link-active {
    color: white !important;
}
/* Profile container */
.profile {
    margin: 20px 0;
}

/* Profile sidebar */
.profile-sidebar {
    padding: 20px 0 10px 0;
    background: #fff;
}
</style>
