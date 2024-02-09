<template>
    <div class="container">
        <div class="content">
            <div class="row justify-content-center">
                <div class="card">
                    <div class="card-header">Verify Your Email Address</div>
                    <div class="card-body">
                        'Before proceeding, please check your email for a verification link.
                        'If you did not receive the email'
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline"
                                @click="verificationResend"
                        >
                            click here to request another
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

import axios from "axios";

export default {
    name: "VerifySentEmail",
    methods: {
        verificationResend() {
            return axios.post('http://larav.local/api/verificationResend').then((res) => {
                console.log(res);
                console.log("resend");
            }).catch((error) => {
                console.log(error);
            });
        }
    }
}
</script>

<style scoped>

.content {
    position: fixed;
    padding: 2em;
    z-index: 999;
    text-align: center;
    width: auto;
    background: rgba(51, 51, 51, 0.7);
    box-shadow: -1px 4px 28px 0 rgba(0, 0, 0, 0.75);
}

.card {
    margin: 2em;
}
</style>
