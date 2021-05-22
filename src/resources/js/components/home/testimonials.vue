<template>
    <section class="pb-5 testimonials">
        <div class="container">
                <div class="section-header">
                    <h2 class="text-center">
                        Que disent nos utilisateurs
                    </h2>
                </div>
                <div class="col-lg-10 offset-lg-1 pt-5 pb-5 quigo-background-color text-light mt-4">
                    <div id="client-testimonial-carousel" class="carousel slide" data-ride="carousel" style="height:200px;">
                    <div class="carousel-inner" role="listbox">
                    <div class="carousel-item active text-center p-4">
                        <div class="d-flex justify-content-center align-items-center">
                            <img v-if="users[0] !== undefined" :src="users[0].avatar_original ? users[0].avatar_original : asset +'/UsersAvatars/'+ users[0].avatar" :alt="users[0].name" class="avatar">
                        </div>
                        <blockquote class="blockquote text-center mb-4">
                            <p class="mb-0"><i class="fa fa-quote-left">
                                </i> ce site est vraiment top. j apprecie vraiment le travail accomplit par les admins.</p>
                            <footer class="blockquote-footer text-uppercase">{{ users[0].name }}</footer>
                        </blockquote>
                    </div>
                    <div class="carousel-item text-center p-4">
                        <div class="d-flex justify-content-center align-items-center">
                            <img v-if="users[0]" :src="users[1].avatar_original ? users[1].avatar_original : asset +'/UsersAvatars/'+ users[1].avatar" :alt="users[1].name" class="avatar">
                        </div>
                        <blockquote class="blockquote text-center mb-4">
                            <p class="mb-0"><i class="fa fa-quote-left"></i> Ma premiere experience utilisateur etait vraiment top.</p>
                            <footer class="blockquote-footer text-uppercase">{{ users[1].name }}</footer>
                        </blockquote>
                    </div>
                    <div class="carousel-item text-center p-4 position-relative">
                        <div class="d-flex justify-content-center align-items-center">
                            <img v-if="users[0]" :src="users[2].avatar_original ? users[2].avatar_original : asset +'/UsersAvatars/'+ users[2].avatar" :alt="users[2].name" class="avatar">
                        </div>
                        <blockquote class="blockquote text-center mb-4">
                            <p class="mb-0"><i class="fa fa-quote-left"></i> le system de chat est vraiment top. on dirait un mini Whatsapp.
                            </p>
                            <footer class="blockquote-footer text-uppercase">{{ users[2].name }}</footer>
                        </blockquote>
                    </div>
                </div>
                <ol class="carousel-indicators">
                    <li data-target="#client-testimonial-carousel" data-slide-to="0" class="active"></li>
                    <li data-target="#client-testimonial-carousel" data-slide-to="1"></li>
                    <li data-target="#client-testimonial-carousel" data-slide-to="2"></li>
                </ol>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
    import user from '../utilities/cards/user';
    export default {
        components: {user},
        props: ['users', 'asset'],
        computed: {
            sortUsers: function() {
                return this.users.sort((a) => a.isAdmin !== 1 );
            }
        }
    }
</script>

<style lang="scss">
    .testimonials {
        min-height: 100vh;
        display: flex;
        align-items: center;
        background: #e9ecef;
    }
    #client-testimonial-carousel
    {
        min-height: 200px;
    }
    .quigo-background-color {
        background-color: #8bc73d;
    }
    .blockquote-footer {
        color: #0c2e8a;
    }
    .carousel-indicators {
       bottom: -60px;
    }
    .blockquote {
        font-size: 1.05rem !important;
    }
    .avatar {
        vertical-align: middle;
        width: 100px;
        height: 100px;
        border-radius: 50%;
    }
</style>
