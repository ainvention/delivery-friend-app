require('./bootstrap');

require('alpinejs');

// require('leaflet-geosearch');

require('leaflet-routing-machine');

// index.js 파일이 하위 폴더에 없을경우 import를 사용할 것.
import flatpickr from 'flatpickr';
window.flatpickr = flatpickr;

window.Moment = require('moment');

window.axios = require('axios');
