import Vue from 'vue';

// Global register

Vue.component('news', require('./components/newsComponent.vue').default);
Vue.component('home-news-component', require('./components/homeNewsComponent.vue').default);
Vue.component('coli-component', require('./components/posts/coli.vue').default);
Vue.component('travel-component', require('./components/posts/travel.vue').default);
Vue.component('booking-travel-component', require('./components/booking/travel.vue').default);
Vue.component('booking-coli-component', require('./components/booking/coli.vue').default);
Vue.component('destinations', require('./components/home/bestDestinations').default);
Vue.component('register-form', require('./components/auth/register').default);
Vue.component('faq-component', require('./components/pages/faq.vue').default);
Vue.component('search-component', require('./components/search/search.vue').default);
Vue.component('how-work-page', require('./components/pages/howWork').default);
Vue.component('how-work', require('./components/home/howWork').default);
Vue.component('home-header-component', require('./components/utilities/Homeheader').default);
Vue.component('alert-chat', require('./components/messages/alertChat.vue').default);
Vue.component('card-user', require('./components/utilities/cards/profile.vue').default);
Vue.component('user-profile', require('./components/profile/profile').default);
Vue.component('cookie-component', require('./components/utilities/cookie.vue').default);
Vue.component('contact-component', require('./components/contact').default);
