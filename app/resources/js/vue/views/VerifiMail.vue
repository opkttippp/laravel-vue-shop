<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Verify Your Email Address</div>

                    <div class="card-body">

                        'Before proceeding, please check your email for a verification link.
                        'If you did not receive the email'
                        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                            <button type="submit" class="btn btn-link p-0 m-0 align-baseline">click here to request another</button>.
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

export default {
    name: "VerifiMail"
}
</script>

<style scoped>

</style>
