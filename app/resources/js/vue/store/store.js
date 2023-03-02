import {createStore} from "vuex";
import {auth} from "./modules/auth.modules";
import {product} from "./modules/product.modules";

const store = createStore({
    modules: {
        auth,
        product
    }
});

export default store;

