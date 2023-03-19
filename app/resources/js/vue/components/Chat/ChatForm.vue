<template>
    <div v-if="errors">
        <div v-for="(message, key) in errors.message" :key="key">
            {{ message }}
        </div>
    </div>
    <div class="blink">
        <span>
            {{ this.typing }}
        </span>
    </div>
    <div class="d-flex flex-row m-4">
        <div class="col-9 d-flex justify-content-center">
            <b-form-input @keyup.enter="sendMessage" v-model="message" type="text"
                          placeholder="Enter in chat... "></b-form-input>
        </div>

        <div class="col-3 d-flex justify-content-center">
            <b-button @click="sendMessage" variant="success">Send</b-button>
        </div>
    </div>
</template>

<script>

export default {
    name: 'chat-form',
    props: {
        user: Object
    },
    data() {
        return {
            message: '',
            typing: ''
        }
    },
    mounted() {
        this.listenMessage();
    },
    watch: {
        message() {
            Echo.private(`chat`)
                .whisper('typing', {
                    user: this.user.name,
                    message: this.message
                });
        }
    },
    methods: {
        sendMessage() {
            console.log( this.message);
            this.$emit('sendMessage', {message: this.message});
            this.message = '';
            this.typing = '';
        },
        listenMessage() {
            Echo.private(`chat`)
                .listenForWhisper('typing', (e) => {
                    if (e.message) {
                        this.typing = `${e.user} is typing ... `
                    } else this.typing = ''
                });
        }
    }
};
</script>

<style scoped>
.blink {
    width: 200px;
    height: 50px;
    padding: 15px;
    text-align: center;
    line-height: 50px;
}

span {
    font-size: 0.8rem;
    font-style: italic;
    color: #41464b;
    animation: blink 1s linear infinite;
}

@keyframes blink {
    0% {
        opacity: 0;
    }
    50% {
        opacity: .5;
    }
    100% {
        opacity: 1;
    }
}
</style>
