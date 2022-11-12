import {createStore} from "vuex";

let cart = window.localStorage.getItem('cart');

const store = createStore({
    state: {
        backendURL: "http://larav.local/api",
        cartProducts: cart ? JSON.parse(cart) : [],
        products: [],
        user: {
            type: Object
        },
        review: []
    },
    mutations: {
        SET_PRODUCTS_STATE: (state, products) => {
            state.products = products
        },
        SET_USER_STATE: (state, user) => {
            state.user = user
        },
        SET_REVIEW_STATE: (state, review) => {
            state.review = review
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
        removeOrder(state) {
            state.cartProducts = [];
            this.commit('saveCart');
        }
    },
    actions: {
        GET_PRODUCTS({state, commit}, page) {
            return axios.get('http://larav.local/api/products', {
                params: {
                    page: page
                }})
                .then(products => {
                    commit('SET_PRODUCTS_STATE', products.data);
                    return products.data;
                }).catch((error) => {
                    console.log(error)
                });
        },
        GET_PRODUCTS_ID({state, commit}, id) {
            this.GET_PRODUCTS;
            return axios.get('http://larav.local/api/products/' + id)
                .then(products => {
                    commit('SET_PRODUCTS_STATE', products.data);
                    return products.data;
                }).catch((error) => {
                    console.log(error)
                });
        },
        GET_USER({commit}) {
            return  axios('http://larav.local/api/auth', {method: "GET"})
                .then(user => {
                    commit('SET_USER_STATE', user.data);
                    return user.data;
                }).catch((error) => {
                    console.log(error)
                    // return error
                });
        },
        GET_REVIEW({commit}) {
            return axios('http://larav.local/api/review', {method: "GET"})
                .then(review => {
                    commit('SET_REVIEW_STATE', review.data.data);
                    return review.data.data;
                }).catch((error) => {
                    console.log(error)
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
        REVIEW(state) {
            return state.review;
        },
        USER(state) {
            return state.user;
        },
        totalAmount: (state) => (
            state.cartProducts.reduce((total, {amount}) => total + amount, 0)
        ),
    totalPrice: (state) => (
            state.cartProducts.reduce(
                (total, {price, amount}) =>
                total + (amount * price),
                0
            ).toFixed(2)
        ),
    cartIsEmpty: (state) => !state.cartProducts.length,

    getProductById: (state) => (id) => {
        if(state.products.data)
        return state.products.data.find(product => product.id === id)
        },

        getReviewById: (state) => (id) => {
            return state.review.filter(review => review.product_id === id)
        },

        getUser: (state) => {
            return state.user
        },
    },
});

export default store;

