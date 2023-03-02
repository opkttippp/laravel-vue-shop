<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div v-if="this.errors.length" class="alert alert-danger">
                    <ul>
                        <li v-for="error of this.errors">{{ error }}</li>
                    </ul>
                </div>

                <div class="card">
                    <div class="card-header">Login</div>
                    <div class="card-body">
                        <form method="POST" @submit.prevent="loginUser">
                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">Login or Email</label>
                                <div class="col-md-6">
                                    <input id="login" v-model="user.login" type="text" class="form-control" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-end">Password</label>
                                <div class="col-md-6">
                                    <input id="password" v-model="user.password" type="password" class="form-control"
                                           required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember">

                                        <label class="form-check-label" for="remember">
                                            Remember Me
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Login
                                    </button>

                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        <routre-link to="/"></routre-link>
                                        'Forgot Your Password?'
                                    </a>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

export default {
    name: "Login",
    data() {
        return {
            user: {
                login: '',
                password: '',
            },
            errors: [],
        };
    },
    methods: {
        loginValidator() {
            this.errors = [];
            if (!this.user.login || this.user.login.length < 5) {
                this.errors.push('The login field is incorrect...');
            }
            if (!this.user.password || this.user.password.length < 5) {
                this.errors.push('The password field is incorrect...');
            }
            if (!this.errors.length)
                return true;
        },
        loginUser() {
            if (this.loginValidator()) {
                this.errors = [];
                this.$store.dispatch("auth/login", this.user)
                    .then(() => {
                        if (this.$store.state.auth.errors)
                            this.errors.push(this.$store.state.auth.errors);
                        this.$store.dispatch('auth/zeroError');
                    }).then( () => {
                        if (this.$store.state.auth.status.loggedIn) {
                            this.$router.push('/');
                        }
                    }
                ).catch((error) => {
                        console.log(error);
                    });
            }
        }
    }
}
</script>
