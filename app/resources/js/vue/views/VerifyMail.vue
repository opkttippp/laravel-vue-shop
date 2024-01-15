<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
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
    name: "VerifyMail",
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

</style>
