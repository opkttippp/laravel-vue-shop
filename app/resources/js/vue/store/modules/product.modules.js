let cart = window.localStorage.getItem('cart');
let query = window.localStorage.getItem('query');

export const product = {
    namespaced: true,
    state: {
        cartProducts: cart ? JSON.parse(cart) : [],
        products: [],
        manufactur: [],
        review: [],
        queryFilter: query ? JSON.parse(query) : [],
    },
    mutations: {
        SET_PRODUCTS_STATE: (state, products) => {
            state.products = products;
        },

        SET_MANUFACTUR_STATE: (state, manufactur) => {
            state.manufactur = manufactur;
        },

        SET_FILTER_STATE: (state, data) => {
            state.queryFilter = data;
        },

        SET_REVIEW_STATE: (state, review) => {
            state.review = review
        },

        saveCart: (state) => {
            window.localStorage.setItem('cart', JSON.stringify(state.cartProducts));
        },

        saveQuery: (state) => {
            window.localStorage.setItem('query', JSON.stringify(state.queryFilter));
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
                this.commit('product/saveCart');
            } else {
                state.cartProducts.push({
                    ...product,
                    amount: 1,
                });
                this.commit('product/saveCart');
            }
        },
        incrementProductAmount(state, index) {
            const product = state.cartProducts[index];
            state.cartProducts.splice(index, 1, {
                ...product,
                amount: product.amount + 1,
            });
            this.commit('product/saveCart');
        },
        decrementProductAmount(state, index) {
            const product = state.cartProducts[index];
            state.cartProducts.splice(index, 1, {
                ...product,
                amount: product.amount - 1,
            });
            this.commit('product/saveCart');
        },
        removeProductFromCart(state, index) {
            state.cartProducts.splice(index, 1);
            this.commit('product/saveCart');
        },
        removeOrder(state) {
            state.cartProducts = [];
            this.commit('product/saveCart');
        }
    },
    actions: {
        GET_PRODUCTS({state, commit}, page) {
            return axios.get('http://larav.local/api/products', {
                params: {
                    page: page
                }
            })
                .then(products => {
                    commit('SET_PRODUCTS_STATE', products.data);
                    return products.data;
                }).catch((error) => {
                    console.log(error)
                });
        },
        GET_PRODUCTS_ID({state, commit}, id) {
            return axios.get('http://larav.local/api/products/' + id)
                .then(products => {
                    commit('SET_PRODUCTS_STATE', products.data);
                    return products.data;
                }).catch((error) => {
                    return error
                });
        },
        GET_REVIEW({commit}) {
            return axios.get('http://larav.local/api/review')
                .then(review => {
                    commit('SET_REVIEW_STATE', review.data.data);
                    return review.data.data;
                }).catch((error) => {
                    return error
                });
        },
        GET_MANUFACTUR({commit}) {
            return axios.get('http://larav.local/api/manufactur')
                .then(manufactur => {
                    commit('SET_MANUFACTUR_STATE', manufactur.data);
                    // console.log(manufactur);
                    return manufactur.data;
                }).catch((error) => {
                    return error
                });
        },
        GET_FILTER({state, commit}, page = 1) {
            return axios.post('http://larav.local/api/filter', {
                page: page,
                data: state.queryFilter,
            })
                .then(filter => {
                    console.log(filter.data);
                    commit('SET_PRODUCTS_STATE', filter.data);
                    return filter.data;
                })
                .catch((error) => {
                    return error
                });
        },
        SET_FILTER({commit}, data) {
            commit('SET_FILTER_STATE', data);
            commit('saveQuery', data);
            return data;
        }
    },
    getters: {
        PRODUCTS(state) {
            return state.products;
        },
        MANUFACTUR(state) {
            return state.manufactur;
        },
        REVIEW(state) {
            return state.review;
        },
        USER(state) {
            return state.users;
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
            if (state.products.data)
                return state.products.data.find(product => product.id === id)
        },

        getReviewById: (state) => (id) => {
            return state.review.filter(review => review.product_id === id)
        },
        getUser: (state) => {
            return state.users
        },
    }
};

