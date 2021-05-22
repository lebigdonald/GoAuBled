<template>
    <section class="right">
        <div class="chat-head">
            <img v-if="selectContact.avatar_original !== undefined" :src="selectContact.avatar_original ? selectContact.avatar_original : asset +'/UsersAvatars/'+ selectContact.avatar" :alt="selectContact.name">
            <div v-else class="alert alert-info text-nowrap my-2 mx-2">Selectioner un contact pour debuter la conversation !</div>
            <div class="chat-name">
                <h1 class="font-name">{{ selectContact.name }}</h1>
                <p class="font-online">{{ selectContact.email }}</p>
            </div>
            <i
                class="fa fa-bars fa-lg"
                aria-hidden="true"
                @click="togglen('flex')"
            ></i>
            <i
                class="fa fa-times fa-lg"
                aria-hidden="true"
                @click="togglen('none')"
            ></i>
        </div>
        <div class="wrap-chat">
            <div class="chat" ref="feed">
                <div v-for="message in messages" :class="`chat-bubble ${message.to == contact.id ? ' me' : ' you'}`" :key="message.id">
                    <div class="my-mouth"></div>
                    <div class="content">{{ message.text }}</div>
                    <div class="time">{{ message.createdAt }}</div>
                </div>
            </div>
            <div class="information" v-bind:style="{ display: show }">
                <img :src="selectContact.avatar_original ? selectContact.avatar_original : asset +'/UsersAvatars/'+ selectContact.avatar" :alt="selectContact.name">
                <div>
                    <h1>Name:</h1>
                    <p>{{ selectContact.name }}</p>

                    <h1>Email:</h1>
                    <p>{{ selectContact.email }}</p>

                    <h1>Menbre depuis le :</h1>
                    <p>{{ selectContact.createdAt }}</p>
                </div>
            </div>
        </div>
        <div class="wrap-message">
            <i :class="{ 'triggered': showEmojiPicker }" @mousedown.prevent="toggleEmojiPicker"  class="fa fa-smile-o fa-lg" aria-hidden="true"></i>
            <div class="message position-relative">
                <input v-model="message"
                    @keydown.enter="send"
                    @keydown="typingEvent"
                    class="input-message"
                    placeholder='Tapez votre message ici'
                />
                <picker
                    set="emojione"
                    v-show="showEmojiPicker"
                    :style="{ position: 'absolute', bottom: '50px', right: '350px' }"
                    :i18n="{ search: 'Recherche', categories: { search: 'Résultats de recherche', recent: 'Récents' } }"
                    title="choisissez un emoji..."
                    emoji="point_up"
                    @select="addEmoji($event)"
                />
            </div>
            <i class="fa fa-microphone fa-lg" aria-hidden="true"></i>
        </div>
        <div class="clearfix"></div>
    </section>
</template>

<script>
    import MessagesFeed from './MessagesFeed';
    import MessageComposer from './MessageComposer';
    import { Picker } from 'emoji-mart-vue'

    export default {
        props: {
            data: {
                type: Object,
                default: null
            },
            contact: {
                type: Object,
                default: null
            },
            contacts: {
                type: Array,
                default: null
            },
            messages: {
                type: Array,
                default: []
            },
            asset: {
                type: String,
                default: ''
            }
        },
        data: function() {
            return {
                selectedContact: null,
                show: 'none',
                showEmojiPicker: false,
                message: '',
                type: true
            };
        },
        methods: {
            sendMessage(text) {
                if (!this.contact) {
                    return;
                }
                axios.post('/conversation/send', {
                    contact_id: this.contact.id,
                    text: text
                }).then((response) => {
                    this.$emit('new', response.data);
                    Store.dispatch('newMessageShow',response.data)
                })
            },
            scrollToBottom() {
                setTimeout(() => {
                    this.$refs.feed.scrollTop = this.$refs.feed.scrollHeight - this.$refs.feed.clientHeight;
                }, 50);
            },
            togglen(val) {
                this.show = val;
            },
            toggleEmoj(val) {
                this.showEmojiPicker = val;
            },
            toggleEmojiPicker () {
                this.showEmojiPicker = !this.showEmojiPicker
            },
            addEmoji ($event) {
                this.message = String(this.message + $event.native);
            },
            send(e) {
                e.preventDefault();

                if (this.message == '') {
                    return;
                }
                this.sendMessage(this.message);
                this.showEmojiPicker = false;
                this.message = '';
            },
            typingEvent(event) {
                this.$emit('typingEvent',event);
            }
        },
        computed: {
            newMessage: function() {
            return this.message;
        },
        getTyping: function() {
            return Store.getters.typing
        },
        selectContact: function() {
            return Store.getters.selectContact;
        }
    },
        watch: {
            contact(contact) {
                this.scrollToBottom();
            },
            messages(messages) {
                this.scrollToBottom();
            }
        },
        components: {MessagesFeed, MessageComposer, Picker}
    }
</script>

<style scoped>
.chat-test {
    font-size: 14px;
    line-height: 1.428571429;
    color: #333;
}
i {
    width: 60px;
    margin: auto;
}

/* ------ FONTS ------ */
.font-name {
    color: #000000;
    font-size: 1em;
    font-weight: inherit;
    padding-bottom: 3px;
}

.font-preview {
    color: #444444;
    font-size: 0.9em;
    font-weight: inherit;
}

.font-online {
    color: #777777;
    font-size: 0.8em;
    font-weight: inherit;
}

.green-background {
    background: #009688;
    height: 130px;
    width: 100%;
    position: fixed;
    top: 0;
    z-index: -100;
}

.wrap {
    display: flex;
    height: 100vh;
    margin: auto;
    box-shadow: 0 2px 2px #aaaaaa;
}

.left {
    width: 400px;
}

.profile {
    width: 100%;
    height: 60px;
    background: #eeeeee;
    border-right: 1px solid #dbdbdb;
    display: flex;
    justify-content: space-between;
}

.profile img {
    width: 40px;
    height: 40px;
    margin: 10px;
    border-radius: 50%;
}

.icons {
    color: #777777;
    display: flex;
}

.wrap-search {
    width: 100%;
    height: 45px;
    background: #fbfbfb;
    display: flex;
}

.search {
    width: calc(100% - 20px);
    height: 30px;
    background: #ffffff;
    margin: auto;
    border: 1px solid #eeeeee;
    border-radius: 5px;
    display: flex;
}

.search i {
    widht: 60px;
}

.search i,
.wrap-message i {
    color: #aaaaaa;
    text-align: center;
}

.input-search {
    width: 100%;
    border: none;
}

.input-search:focus {
    outline: none;
}

.contact-list {
    background-color: #ffffff;
    width: 100%;
    height: calc(100% - 105px);
    overflow-y: auto;
}

.contact,
.active-contact,
.new-message-contact {
    height: 70px;
    background-color: #ffffff;
    display: flex;
}

.contact img,
.active-contact img,
.new-message-contact img {
    width: 50px;
    height: 50px;
    margin: 10px;
    border-radius: 50%;
}

.active-contact {
    background-color: #ebebeb;
}

.contact:hover,
.new-message-contact:hover {
    background-color: #f5f5f5;
}

.new-message-contact {
    font-weight: bold;
}

.contact-preview {
    width: 100%;
    height: 70px;
    border-bottom: 1px solid #eeeeee;
    display: flex;
    overflow: hidden;
}

.contact-text {
    height: 40px;
    margin: auto 0;
    overflow: hidden;
}

.contact-time {
    width: 55px;
    color: rgba(0, 0, 0, 0.4);
    font-size: 0.8em;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    padding: 10px;
    border-bottom: 1px solid #eeeeee;
}

.new-message {
    background: #09d261;
    border-radius: 50%;
    width: 20px;
    height: 20px;
    display: flex;
    margin: auto;
    flex-direction: column;
    color: white;
}

.new-message p {
    margin: auto;
}

/* ------ RIGHT SIDE ------ */
.right {
    min-width: calc(100% - 400px);
}

.chat-head {
    background-color: #eeeeee;
    width: 100%;
    height: 60px;
    display: flex;
}

.chat-head img {
    width: 40px;
    height: 40px;
    margin: 10px;
    border-radius: 50%;
}

.chat-head i {
    color: #aaaaaa;
    width: 60px;
    margin: auto;
    text-align: center;
}

#close-contact-information {
    display: none;
}

.chat-name {
    width: 100%;
    margin: auto;
}

.wrap-chat {
    height: calc(100% - 120px);
    display: flex;
}

.chat {
    background-color: #e5ddd5;
    background-image: url(https://s3-us-west-2.amazonaws.com/s.cdpn.io/1089577/background.png);
    width: 100%;
    padding: 0px 10%;
    padding-top: 7px;
    overflow-y: auto;
}

.information {
    width: 100%;
    position: relative;
    background: #f7f7f7;
    display: none;
    flex-direction: column;
    overflow: auto;
}

.information div {
    background: #ffffff;
    padding: 10px;
    margin-bottom: 20px;
}

.information img {
    width: 200px;
    height: 200px;
    margin: 20px auto;
    border-radius: 50%;
    float: left;
}

.information h1 {
    color: #009688;
    font-size: 14px;
    margin-bottom: 5px;
}

.listGroups {
    display: flex;
    margin: 0px !important;
}

.listGroups img {
    width: 40px;
    height: 40px;
    margin: 0px 10px 0px 0px;
}

.listGroups p {
    margin: auto 0px;
}

/* ------ CHAT ------ */
.chat-bubble {
    border-radius: 7px;
    box-shadow: 0 2px 2px rgba(0, 0, 0, 0.05);
    padding: 5px 7px;
    width: 350px;
    max-width: 100%;
    position: relative;
}

.you {
    background: #ffffff;
    margin: 0px auto 10px 0px;
}

.me {
    background: #dcf8c6;
    margin: 0px 0px 10px auto;
}

.your-mouth {
    width: 0;
    height: 0;
    border-bottom: 10px solid white;
    border-left: 10px solid transparent;
    position: absolute;
    bottom: 10px;
    left: -10px;
}

.my-mouth {
    width: 0;
    height: 0;
    border-bottom: 10px solid #dcf8c6;
    border-right: 10px solid transparent;
    position: absolute;
    bottom: 10px;
    left: 100%;
}

.content {
    margin: 0.5em 0;
    line-height: 120%;
    font-size: 0.9em;
}

.content img {
    width: 100%;
}

.time {
    color: rgba(0, 0, 0, 0.4);
    font-size: 0.6em;
    text-align: right;
    margin-top: -10px;
}

.pink {
    color: #ee33aa;
}

.green {
    color: #44ff66;
}

.orange {
    color: #ff8811;
}

.wrap-message {
    width: 100%;
    height: 60px;
    background: #f1f1f1;
    display: flex;
}

.message {
    width: 100%;
    height: 45px;
    background: #ffffff;
    margin: auto;
    border: 1px solid #eeeeee;
    border-radius: 5px;
    display: flex;
}

.input-message {
    width: 100%;
    margin: 0px 10px;
    border: none;
}

.input-message:focus {
    outline: none;
}

/* ------ SCROLLBAR ------ */

body::-webkit-scrollbar,
.contact-list::-webkit-scrollbar,
.chat::-webkit-scrollbar,
.information::-webkit-scrollbar {
    width: 0.4em;
    height: 0.4em;
}

body::-webkit-scrollbar-thumb,
.contact-list::-webkit-scrollbar-thumb,
.chat::-webkit-scrollbar-thumb,
.information::-webkit-scrollbar-thumb {
    background-color: rgba(0, 0, 0, 0.2);
}

/* ------ MEDIA QUERIES ------ */
@media (min-width: 1200px) {
    .wrap {
        margin-bottom: 2vh;
        margin-top: 25px;
        height: calc(98vh - 25px);
    }
}

@media (max-width: 600px) {
    .wrap {
        height: calc(100vh - 0.4em);
    }
}
</style>
