import Vuex from 'vuex'

export const store = new Vuex.Store({
    state: {
        backendURL: "http://larav.local/api",
        products: []
    },
    mutations: {
        SET_PRODUCTS_STATE: (state, products) => {
            state.products = products
        }
    },
    actions: {
        GET_PRODUCTS({commit}) {
            return axios('http://larav.local/api/products', {method: "GET"})
                .then(products => {
                    commit('SET_PRODUCTS_STATE', products.data.data);
                    return products.data.data;
                }).catch((error) => {
                    console.log(error)
                    return error});
        }
    },
    getters: {
        GET_SERVER_URL: state => {
            return state.backendURL
        },
        PRODUCTS(state) {
            return state.products;
        },
    }
});


