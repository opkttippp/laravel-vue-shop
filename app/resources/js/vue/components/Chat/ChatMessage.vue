<template>
    <ul class="messages" style="position: relative; height: 400px; overflow-y: auto;">
        <li class="message pl-4 pr-4 m-2" v-for="message in this.messages" :key="message.id">
            <span class="m-3 date badge badge-info">
                  {{ setDate(message.created_at) }}
            </span>
            <div v-if="!message.delete_message"
                 class="d-flex justify-content-start p-2"
                 :class="[ this.user.id !== message.user_id ? 'flex-row' : 'flex-row-reverse' ]"
                 style="background-color: #e4ede6; border-radius: 12px;"
            >
                <div class="d-flex flex-column align-items-center justify-content-center" style="width: 10%;">
                    <img class="img-fluid rounded-5" :src="'http://larav.local/storage/' + message.user.avatar"
                         style="width: 45px;" alt="photo">
                    <p class="d-flex justify-content-center small rounded-3 text-muted">
                        {{ this.user.id !== message.user_id ? message.user.name : 'you' }}</p>
                </div>
                <div style="display: flex; width: 80%; flex-direction: column; justify-content: space-between;">
                    <div class="d-flex" style="flex-basis: content; justify-content: start;"
                         :style="[ this.user.id === message.user_id ? 'justify-content: end;' : '' ]"
                    >
                        <p class="d-flex mt-2 small mb-0 ml-2 mr-2 pr-2 pl-2 rounded-3"
                           :style="[ this.user.id === message.user_id ? 'background-color: #4af0d1; justify-content: end;' : 'background-color: #f5f6f7;' ]"
                        >{{ message.message }}</p>
                    </div>

                    <div class="small mt-2 ml-2 mr-2 rounded-3"
                         style="display: flex; flex-basis: content; font-size: 0.8rem; justify-content:center; align-items: flex-end;"
                    >
                        <p>
                            {{ setTime(message.created_at) }}
                        </p>
                    </div>
                </div>
                <div v-if="this.user.id === message.user_id"
                     class="edit d-flex flex-column align-items-center justify-content-between">
                    <div class="badg" @click="editMessage(message)"><i class="fa fa-sharp fa-solid fa-pen-nib"></i></div>
                    <div class="badg" @click="this.$emit('deleteMessage', user.name, ( message.id))"><i class="fa fa-solid fa-trash"></i></div>
                </div>
            </div>
            <div v-else
                 class="d-flex justify-content-between p-2"
                 :class="[ this.user.id !== message.user_id ? 'flex-row' : 'flex-row-reverse' ]"
            >
                <div style="width: 80%; display: flex; flex-direction: column; justify-content:space-between;">
                    <div class="d-flex" style="flex-basis: content;"
                         :style="[ this.user.id === message.user_id ? 'justify-content: end;' : '' ]"
                    >
                        <p class="small ml-2 mr-2  pl-2 pr-2 rounded-3"
                           style="background-color: #f5f6f7;"
                           :style="[ this.user.id === message.user_id ? 'justify-content: end; justify-self: end;' : '' ]"
                        >{{ message.message }}</p>
                    </div>
                </div>
            </div>
        </li>
    </ul>
    <modal-show
        v-if="isModal"
    >
        <template v-slot:header>
            Edit message
            <button
                type="button"
                class="btn-close"
                @click="close"
                aria-label="Close modal"
            >
            </button>
        </template>
        <template v-slot:body>
            <div class="col-12 d-flex flex-column">
                <div class="col-12">
                                <textarea v-model="editMessages.message" class="form-control"
                                          @keyup.enter="this.$emit('editMessage', (editMessages))"
                                ></textarea>
                </div>
                <div>
                    <button class="m-3 btn btn-success"
                            @click="this.$emit('editMessage', (editMessages))"
                    >
                        Save
                    </button>
                </div>
            </div>
        </template>
    </modal-show>

</template>

<script>

import axios from "axios";

export default {
    name: 'chat-message',
    props: {
        user: {
            type: Object,
            chat: Object,
        }
    },
    data() {
        return {
            messages: {},
            editMessages: {},
            dateNow: '',
            date: '',
            isModal: false,
        }
    },
    mounted() {
        this.listenEvent();
        this.getMessages();
    },
    computed: {
        toDay() {
            return this.setDateNow();
        }
    },
    methods: {
        listenEvent() {
            Echo.private('chat')
                .listen('MessageSent', (e) => {
                    this.chat = e.message
                    this.chat.user = e.user;
                    this.messages.push(this.chat);

                    setTimeout(() => {
                        let element = document.querySelector('.messages')
                        element.scrollTop = element.scrollHeight;
                    }, 1)
                })
                .listen('MessageDelete', (e) => {
                    this.getMessages();
                    setTimeout(() => {
                        let element = document.querySelector('.messages')
                        element.scrollTop = element.scrollHeight;
                    }, 1)
                }).listen('MessageUpdate', (e) => {
                this.getMessages();
                this.close();
            });
        },
        setTime(data) {
            const current = new Date(data);
            return `${current.getHours()}:${current.getMinutes()}`;
        },
        setDateNow() {
            const current = new Date();
            return `${current.getDate()}.${current.getMonth() + 1}.${current.getFullYear()}`;
        },
        setDate(data) {
            const current = new Date(data);
            let date = `${current.getDate()}.${current.getMonth() + 1}.${current.getFullYear()}`;

            if (date === this.date) {
                return '';
            }
            if (date === this.toDay) {
                this.date = this.toDay;
                return 'Today';
            }
            this.date = date;
            return this.date;
        },
        getMessages() {
            return axios.get('/api/chat/messages').then((res) => {
                this.messages = res.data;
            })
        },
        editMessage(e) {
            this.isModal = true;
            this.editMessages = e;
        },
        close() {
            this.isModal = false;
        }
    }
};
</script>

<style scoped>
.message {
    list-style-type: none;
    border-radius: 15%;
}

.edit {
    width: 10%;
    cursor: pointer;
}

.badg {
    display: flex;
    align-items: center;
    justify-content: center;
    height: 35px;
    width: 35px;
    color: #4287f5;
    background-color: white;
    border-radius: 50%;
}

.badg:hover {
    background-color: #4287f5;
    color: white;
    /*transform: scale(1.2);*/
    /*transition: all 0.3s;*/
}

</style>
