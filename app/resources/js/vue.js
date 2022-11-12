import {createApp} from "vue";

import axios from "axios";
import store from './vue/store/store';
import router from "./vue/router/router";
import App from "./vue/App";
import BootstrapVue from 'bootstrap-vue-next';
import 'material-design-icons-iconfont/dist/material-design-icons.css';

const app = createApp({App});

import CartButton from "./vue/components/Cart/CartButton";
import CartModal from "./vue/components/Cart/CartModal";
import RangeSlider from "./vue/components/RangeSlider";
import OrderModal from "./vue/components/Cart/OrderModal";

app.component("cart-button", CartButton);
app.component("cart-modal", CartModal);
app.component("range-slider", RangeSlider);

app.use(BootstrapVue)
app.use(store)
app.use(router)
app.config.globalProperties.axios = axios
app.mount('#app')
