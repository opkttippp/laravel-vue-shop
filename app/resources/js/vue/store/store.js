import {createStore} from "vuex";

let cart = window.localStorage.getItem('cart');
const store = createStore({
    state: {
        backendURL: "http://larav.local/api",
        cartProducts: cart ? JSON.parse(cart) : [],
        products: []
    },
    mutations: {
        SET_PRODUCTS_STATE: (state, products) => {
            state.products = products
        },
        saveCart(state) {
            window.localStorage.setItem('cart', JSON.stringify(state.cartProducts));
        },
        addProductToCart(state, product) {
            if (state.cartProducts.length) {
                let IsProductExist = false;
                state.cartProducts.map(function (item) {
                    if (item.id === product.id) {
                        IsProductExist = true;
                        item.amount++;
                    }
                })
                if (!IsProductExist) {
                    state.cartProducts.push({
                        ...product,
                        amount: 1,
                    });
                }
                this.commit('saveCart');
            } else {
                state.cartProducts.push({
                    ...product,
                    amount: 1,
                });
                this.commit('saveCart');
            }
        },
        incrementProductAmount(state, index) {
            const product = state.cartProducts[index];
            state.cartProducts.splice(index, 1, {
                ...product,
                amount: product.amount + 1,
            });
            this.commit('saveCart');
        },
        decrementProductAmount(state, index) {
            const product = state.cartProducts[index];
            state.cartProducts.splice(index, 1, {
                ...product,
                amount: product.amount - 1,
            });
            this.commit('saveCart');
        },
        removeProductFromCart(state, index) {
            state.cartProducts.splice(index, 1);
            this.commit('saveCart');
        },
        removeOrder() {
            this.cartProducts = '';
            this.commit('saveCart');
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
                    return error
                });
        }
    },
    getters: {
        GET_SERVER_URL: state => {
            return state.backendURL
        },
        PRODUCTS(state) {
            return state.products;
        },
        totalAmount: (state) => (
            state.cartProducts.reduce((total, {amount}) => total + amount, 0)
        ),
        totalPrice: (state) => (
            state.cartProducts.reduce(
                (total, {price, amount}) =>
                    total + (amount * price),
                0
            )
        ),
        cartIsEmpty: (state) => !state.cartProducts.length,
        getProductById: (state) => (productId) => (
            state.cartProducts.find(({id}) => productId === id)
        ),
    }
});

export default store;

