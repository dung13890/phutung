var Vue = require('vue');
Vue.use(require('vue-resource'));
import UploadImage from './components/upload-image.vue';
Vue.http.headers.common['X-CSRF-TOKEN'] = $('meta[name="csrf-token"]').attr('content');
var router = window.router || laroute || window.laroute;
require('es6-promise').polyfill()
new Vue({
	el : '#dropzone-form',
	components : {
		'upload-image': UploadImage,
	},
	data:{
		item :window.item || {}
	}
});