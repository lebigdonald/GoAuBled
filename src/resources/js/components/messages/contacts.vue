<template>
    <div>
        <div v-for="contact in sortedContacts" class="contact" :id="contact.id" :key="contact.id" @click="selectContact(contact)" :class="{ 'active-contact': contact == selected }">
            <img :src="contact.avatar_original ? contact.avatar_original : asset +'/UsersAvatars/'+ contact.avatar" :alt="contact.name">
            <div class="contact-preview">
                <div class="contact-text">
                    <h1 class="font-name">{{ contact.name }}</h1>
                    <p class="font-preview text-black-50">
                        Mmh, lecker :) Freu mich!
                    </p>
                </div>
            </div>
            <div class="contact-time"><span class="badge badge-secondary p-1 mt-2 rounded font-weight-bold count-unred-messages" v-html="contact.unread > 0 ? contact.unread : ''"></span></div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        contacts: {
            type: Array,
            default: []
        },
        asset: {
            type: String,
            default: ''
        }
    },
    data() {
        return {
            selected: this.contacts.length ? this.contacts[0] : null
        };
    },
    methods: {
        selectContact(contact) {
            this.selected = contact;
            Store.dispatch('selectContact', contact);
            this.$emit('selected', contact);
        }
    },
    computed: {
        sortedContacts() {
            return _.sortBy(this.contacts, [(contact) => {
                if (contact == this.selected) {
                    return Infinity;
                }
                return contact.unread;
            }]).reverse();
        }
    }
}
</script>

<style scoped>
.font-name {
    color: #000000;
    font-size: 1em;
    font-weight: inherit;
    padding-bottom: 3px;
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

.count-unred-messages {
    font-size: 16px;
}

.new-message p {
    margin: auto;
}

/* ------ RIGHT SIDE ------ */
.right {
    min-width: calc(100% - 400px);
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