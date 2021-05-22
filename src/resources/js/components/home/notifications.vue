<template>
    <li class="nav-item dropdown" @click="updateNotification">
        <a class="nav-link" href="#">
            <i class="fa fa-bell icon-notif"></i>
            <span class="dot" v-html="Object.keys(notifications).length"></span>
        </a>
        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            <span class="caret"></span>
        </a>
        <div class="dropdown-menu notification-content" aria-labelledby="navbarDropdown">
            <div class="text-wrap border px-1" v-if="notifications.length > 0"v-for="item in notifications" :key="item.id" v-html="item.data.message"></div>
        </div>
    </li>
</template>

<script>

export default {

props: ['unreadnotifications'],

data: function() {
    return {
        datas: [],
    }
},
    mounted() {

        Store.dispatch('setNotifications',this.unreadnotifications);
    },
    computed: {
        notifications: function() {

           return Store.getters.getNotifications
        }
    },
    methods: {
        updateNotification: function() {
            axios.post('/resetAllunreadNotifications', {})
                .then(function (response) {
                    // faut faire quelquechose a ce niveau
                })
                .catch(function (error) {
                    console.log(error);
                });
        }
    }
}
</script>

<style lang="scss" scoped>
.dot {
    height: 20px;
    width: 20px;
    text-align: center;
    background-color: #8bc73d;
    color: white;
    border-radius: 50%;
    display: inline-block;
}
a {
    .icon-notif {
     font-size: 1.3em;
    }
}
.notification-content {
    width: 200px;
    max-height: 200px;
    overflow: scroll;
}
</style>
