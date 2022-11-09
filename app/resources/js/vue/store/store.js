import {createStore} from "vuex";

let cart = window.localStorage.getItem('cart');
// let prod = window.localStorage.getItem('prod');

const store = createStore({
    state: {
        backendURL: "http://larav.local/api",
        cartProducts: cart ? JSON.parse(cart) : [],
        // products: prod ? JSON.parse(prod) : [],
        products: [],
        user: {},
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
        // saveProducts(state) {
        //     window.localStorage.setItem('prod', JSON.stringify(state.products));
        // },
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
                    // this.commit('saveProducts');
                    return products.data.data;
                }).catch((error) => {
                    console.log(error)
                    return error
                });
        },
        GET_USER({commit}) {
            return axios('http://larav.local/api/auth', {method: "GET"})
                .then(user => {
                    commit('SET_USER_STATE', user.data);
                    return user.data;
                }).catch((error) => {
                    console.log(error)
                    return error
                });
        },
        GET_REVIEW({commit}) {
            return axios('http://larav.local/api/review', {method: "GET"})
                .then(review => {
                    commit('SET_REVIEW_STATE', review.data.data);
                    // console.log(review.data.data)
                    return review.data.data;
                }).catch((error) => {
                    console.log(error)
                    return error
                });
        },
    },
    getters: {
        GET_SERVER_URL: state => {
            return state.backendURL
        },
        PRODUCTS(state) {
            return state.products;
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
            )
        ),
        cartIsEmpty: (state) => !state.cartProducts.length,
        getProductById: (state) => (id) => {
            return state.products.find(product => product.id === id)
        },
        getReviewById: (state) => (id) => {
            // console.log(id)
            // console.log(state.review)
            // console.log(state.review.find(review => review.product_id  === id))
            return state.review.filter(review => review.product_id  === id)
        },
    },
});

export default store;

