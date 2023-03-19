import {ref} from 'vue';
import axios from 'axios';

window.Echo.private('chat')
    .listen('MessageSent', (e) => {
        console.log(e);
        this.messages.push({
            message: e.message,
        })
    });

export default function useChat() {
    const messages = ref([])
    const errors = ref([])

    const getMessages = async () => {
        await axios.get('/api/chat/messages').then((response) => {
            messages.value = response.data
        })
    }

    const addMessage = async (form) => {
        errors.value = [];

        try {
            await axios.post('/api/chat/send', form).then((res) => {
                messages.value.push(res.data)
            })
        } catch (e) {
            if(e.response.status === 422) {
                errors.value = e.response.data.errors
            }
        }
    }

    return {
        messages,
        errors,
        getMessages,
        addMessage
    }
}
