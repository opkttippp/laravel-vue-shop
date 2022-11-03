import {createApp} from "vue";

import axios from "axios";
import store from './vue/store/store';
import router from "./vue/router/router";
import App from "./vue/App";

const app = createApp({App});

import CartButton from "./vue/components/Cart/CartButton";
import CartModal from "./vue/components/Cart/CartModal";

app.component("cart-button", CartButton);
app.component("cart-modal", CartModal);

    app.use(store)
    app.use(router)
    app.config.globalProperties.axios = axios
    app.mount('#app')
