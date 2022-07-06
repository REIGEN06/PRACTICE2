require('./bootstrap');
import MultipaneComponent from './components/MultipaneComponent';

// import PerfectScrollbar from 'vue3-perfect-scrollbar';
// import 'vue3-perfect-scrollbar/dist/vue3-perfect-scrollbar.css';

window.Vue = require('vue').default;

Vue.component('import-component', require('./components/ImportComponent.vue').default);
Vue.component('multipane-component', MultipaneComponent);
// Vue.component('perfect-scrollbar', PerfectScrollbar);

const app = new Vue({
    el: '#app',
    
});
