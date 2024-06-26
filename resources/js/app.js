import './bootstrap';
import {createApp} from 'vue'
import store from "./store";
import router from "./router";
import "./assets/css/nucleo-icons.css";
import "./assets/css/nucleo-svg.css";
import {faAddressCard, faBriefcase,faPowerOff,faBook,faCity} from '@fortawesome/free-solid-svg-icons'
import ArgonDashboard from "./argon-dashboard";
/* import the fontawesome core */
import { library } from '@fortawesome/fontawesome-svg-core'

/* import font awesome icon component */
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';
/* add icons to the library */
library.add(faAddressCard,faBriefcase,faPowerOff,faBook,faCity)
import App from './App.vue'

const app = createApp(App)
app.use(router);
app.use(store);
app.use(ArgonDashboard);
app.use(VueSweetalert2);
app.component('font-awesome-icon', FontAwesomeIcon)
app.config.globalProperties.API_URL='http://127.0.0.1:8000/api'
app.mount("#app")