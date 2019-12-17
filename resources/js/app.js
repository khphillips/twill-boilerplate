require('./bootstrap');

import Vue from 'vue'

import vuetify from './plugins/vuetify';
import "../sass/app.scss";
import '@fortawesome/fontawesome-free/scss/fontawesome.scss';
import '@fortawesome/fontawesome-free/scss/solid.scss';
import '@fortawesome/fontawesome-free/scss/regular.scss';

Vue.config.productionTip = false


const app = new Vue({
  el: '#app',
  vuetify,
  data : {
    counter: 0,
  },
  methods : {
  	'add' : function(amt){
  		this.counter = this.counter + amt;
  	}
  }
})//.$mount('#app')
