<template>
<input v-model="message" 
    @keydown.enter="send" 
    type="text" class="input-message" 
    placeholder="tapez votre message ici"
/>
</template>

<script>
export default {
        data() {
            return {
                message: ''
            };
        },
        methods: {
            send(e) {
                e.preventDefault();
                
                if (this.message == '') {
                    return;
                }
                this.$emit('send', this.message);
                this.message = '';
            }
        },
        selectContact: function() {
            return Store.getters.selectContact;
        }
    }
</script>

<style scoped>
.input-message {
    width: 100%;
    margin: 0px 10px;
    border: none;
}

.input-message:focus {
    outline: none;
}
</style>
