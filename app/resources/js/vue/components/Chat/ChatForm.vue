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
    <div class="formMessage d-flex flex-row m-4">
        <div class="col-12 d-flex justify-content-center">
            <b-form-input class="inputMessage" @keyup.enter="sendMessage" v-model="message" type="text"
                          placeholder="Enter your message... "></b-form-input>

            <b-button class="sendMessage" @click="sendMessage" variant="success"></b-button>
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

button {
    border-radius: 50%;
    color: #fff;
    height: 3rem;
    width: 3rem;
    margin-left: 2rem;
    cursor: pointer;
}

button::after {
    content: '';
    position: absolute;
    right: -1px;
    top: 11px;
    border: 10px solid transparent;
    border-left: 20px solid #FFFFFF;
}

input{
    outline: none;
    display: inline-block;
    height: 100%;
    vertical-align: middle;
    border-radius: 22px;
    width: 220px;
    box-sizing: border-box;
    padding: 0 18px;
}

</style>
