<template>
    <div>
        <b-modal
            v-model="display"
            id="modal-center"
            :footer-bg-variant="footerBgVariant"
            :footer-text-variant="footerTextVariant"
            centered
        >
            <template #modal-header="{ close }">
                <h5>{{ user.name }}</h5>
                <a class="btn btn-social-icon btn-facebook">
                    <span class="fa fa-facebook"></span>
                </a>
                <a class="btn btn-social-icon btn-twitter">
                    <span class="fa fa-twitter"></span>
                </a>
                <a class="btn btn-social-icon btn-instagram">
                    <span class="fa fa-instagram"></span>
                </a>
            </template>
            <b-container fluid>
                <b-row class="mb-2">
                    <b-col cols="5">Email</b-col>
                    <b-col>
                        {{ user.email !== undefined ? user.email.toUpperCase() : '' }}
                    </b-col>
                </b-row>

                <b-row  class="mb-2">
                    <b-col cols="5">RUE</b-col>
                        <b-col>
                            AM SANDBERG 7
                        </b-col>
                </b-row>

                <b-row  class="mb-2">
                    <b-col cols="5">VILLE</b-col>
                    <b-col>
                        GUMMERSBACH
                    </b-col>
                </b-row>

                <b-row  class="mb-2">
                    <b-col cols="5">PLZ</b-col>
                    <b-col>
                        51643
                    </b-col>
                </b-row>
                <b-row  class="mb-2">
                    <b-col cols="5">MEMBRE DEPUIS</b-col>
                    <b-col>
                       FEVRIER 2020
                    </b-col>
                </b-row>
            </b-container>

            <template #modal-footer>
                <div class="w-100">
                    <b-button
                        variant="danger"
                        size="sm"
                        class="float-right"
                        @click="hide()"
                    >
                        Close
                    </b-button>
                </div>
            </template>
        </b-modal>
    </div>
</template>

<script>
import Store from '../../../store/index'
    export default {
        data() {
            return {
                show: false,
                variants: ['primary', 'secondary', 'success', 'warning', 'danger', 'info', 'light', 'dark'],
                headerBgVariant: 'dark',
                headerTextVariant: 'light',
                bodyBgVariant: 'light',
                bodyTextVariant: 'dark',
                footerBgVariant: 'success',
                footerTextVariant: 'light'
            }
        },
        computed: {
            display() {
                return Store.getters.modalShow;
            },
            user() {
                return Store.getters.profileUser;
            }
        },
        methods: {
            hide() {
                Store.dispatch('modalShow', false);
            }
        }
    }
</script>
