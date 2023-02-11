<template>
    <modal-show
        @close="closeModal"
    >
        <template v-slot:header>
            <input-button class="form-control" type="search"
                          placeholder="Search"
                          aria-label="Search" id="search" name='search'
                          ref="inputSearch"
                          autocomplete="off"
                          style="background: none; border: none;"
                          @input="checkEvent"
                          v-model="search"
                          v-focus
            >
            </input-button>
            <button
                type="button"
                class="btn-close"
                @click="closeModal"
                aria-label="Close modal"
            >
            </button>
        </template>
        <template v-slot:body>
            <div class="d-flex flex-column row">
                <router-link
                    v-for="list in lists"
                    :key="list.id"
                    @click="getProduct(list.id)"
                    :to="{name: 'Show', params: {id: list.id}}"
                >
                    {{ list.title }}
                </router-link>
            </div>
        </template>
    </modal-show>
</template>
<script>

export default {
    name: "search-modal",
    components: {
    },
    props: {
        isModal: Boolean
    },
    data() {
        return {
            lists: [],
            search: '',
            isModalVisible: false
        }
    },
    // watch: {
    //     isModal: function() {
    //         this.isModalVisible = true;
    //     }
    // },
    // mounted() {
    // },
    // updated() {
    //     this.focus();
    // },
    methods: {
    //     focus() {
    //         this.$refs.inputSearch.$el.focus();
    //     },
        // showModal() {
        //     this.isModalVisible = true;
        // },
        closeModal() {
            this.search = '';
            this.lists = '';
            this.isModalVisible = false;
            this.$emit('close');
        },
        checkEvent() {
            if (this.search.length >= 3) {

                return axios.post('/api/search/',
                    {
                        val: this.search
                    }).then((res) => {
                    this.lists = res.data;
                })
            }
            this.lists = '';
        },
        getProduct(id) {
            this.$store.dispatch('GET_PRODUCTS_ID', id);
            this.closeModal();
        },
    }
}
</script>
