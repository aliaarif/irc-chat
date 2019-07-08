require('./bootstrap');

// All the Vue component imports will go here
Vue.component('vue-chat', require('./components/VueChat.vue'));
Vue.component('vue-chat-channels', require('./components/VueChatChannels.vue'));
Vue.component('vue-chat-messages', require('./components/VueChatMessages.vue'));
Vue.component('vue-chat-new-message', require('./components/VueChatNewMessage.vue'));



const app = new Vue({
    el: '#app'
});