<template>
  <div>
    <notifications group="Chat" classes="notifsuccess" />
  </div>
</template>

<script>
  export default {
    computed: {
        message: function() {
            return 'Vous avez recue un nouveau message';
        }
    },
    mounted(){
    Echo.channel(`messages`)
        .listen("NewMessage", e => {
            this.$notify({
                group: 'Chat',
                title: 'Goaubled Chat',
                text: this.message
            });
        });
    }
  }
</script>