import {createApp} from "vue";
import App from "./vue/App";
import VueChatScroll from 'vue-chat-scroll';
import axios from "axios";

import store from './vue/store/store';
import router from "./vue/router/router";
import BootstrapVue from 'bootstrap-vue-next';
import 'bootstrap/dist/css/bootstrap.css';
import 'bootstrap-vue-next/dist/bootstrap-vue-next.css';
import Paginate from "vuejs-paginate-next";
import lodash from 'lodash';
import VueAxios from 'vue-axios';

import NavBar from "./vue/views/inc/NavBar";
import Footer from "./vue/views/inc/Footer";
import CartButton from "./vue/components/Cart/CartButton";
import CartModal from "./vue/components/Cart/CartModal";
import ModalShow from "./vue/components/UI/ModalShow";
import RangeSlider from "./vue/components/RangeSlider";
import SearchButton from "./vue/components/SearchButton";
import CatalogButton from "./vue/components/CatalogButton";
import InputButton from "./vue/components/UI/InputButton";
import directive from './vue/directives';


const app = createApp(App);

directive.forEach(directive => {
    app.directive(directive.name, directive)
});
app.component("nav-bar", NavBar);
app.component("footer-site", Footer);
app.component("cart-button", CartButton);
app.component("cart-modal", CartModal);
app.component("modal-show", ModalShow);
app.component("catalog-button", CatalogButton);
app.component("search-button", SearchButton);
app.component("input-button", InputButton);
app.component("range-slider", RangeSlider);

app.directive('click-outside');

app.use(BootstrapVue);
app.use(store);
app.use(router);
app.use(VueChatScroll);
app.use(Paginate);
app.config.globalProperties.axios = axios;

app.mount('#app');

