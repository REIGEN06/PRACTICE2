require('./bootstrap');
import MultipaneComponent from './components/MultipaneComponent';

window.Vue = require('vue').default;

Vue.component('import-component', require('./components/ImportComponent.vue').default);
Vue.component('multipane-component', MultipaneComponent);

const app = new Vue({
    el: '#app',
    
});
