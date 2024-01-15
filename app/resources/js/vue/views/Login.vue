<template>
    <div class="container">
        <!--        <div class="row justify-content-center">-->
        <!--            <div class="col-md-8">-->

        <div v-if="this.errors.length" class="alert alert-danger">
            <ul>
                <li v-for="error of this.errors">{{ error }}</li>
            </ul>
        </div>


        <!--    <transition name="card" mode="out-in">-->
        <!--        <div class="card" v-if="front === true" key="front">-->
        <!--            <div class="card-header">Login</div>-->
        <!--            <div class="card-body">-->
        <!--                <form method="POST" @submit.prevent="loginUser">-->
        <!--                    <div class="row mb-3">-->
        <!--                        <label for="email" class="col-md-4 col-form-label text-md-end">Login or-->
        <!--                            Email</label>-->
        <!--                        <div class="col-md-6">-->
        <!--                            <input id="login" v-model="user.login" type="text" class="form-control"-->
        <!--                                   required>-->
        <!--                        </div>-->
        <!--                    </div>-->
        <!--                    <div class="row mb-3">-->
        <!--                        <label for="password" class="col-md-4 col-form-label text-md-end">Password</label>-->
        <!--                        <div class="col-md-6">-->
        <!--                            <input id="password" v-model="user.password" type="password"-->
        <!--                                   class="form-control"-->
        <!--                                   required>-->
        <!--                        </div>-->
        <!--                    </div>-->
        <!--                    <div class="row mb-3">-->
        <!--                        <div class="col-md-6 offset-md-4">-->
        <!--                            <div class="form-check">-->
        <!--                                <input class="form-check-input" type="checkbox" name="remember"-->
        <!--                                       id="remember">-->

        <!--                                <label class="form-check-label" for="remember">-->
        <!--                                    Remember Me-->
        <!--                                </label>-->
        <!--                            </div>-->
        <!--                        </div>-->
        <!--                    </div>-->
        <!--                    <div class="row mb-0">-->
        <!--                        <div class="col-md-8 offset-md-4 d-flex">-->
        <!--                            <button type="submit" class="btn btn-primary">-->
        <!--                                Login-->
        <!--                            </button>-->

        <!--                            <a class="btn btn-link" href="{{ route('password.request') }}">-->
        <!--                                                                        <routre-link to="/"></routre-link>-->
        <!--                                'Forgot Your Password?'-->
        <!--                            </a>-->
        <!--                                                                <router-link to="/register"-->
        <!--                                                                             class="ml-auto"-->
        <!--                                                                             style="font-weight: bold;-->
        <!--                                                                             align-self: center;"-->
        <!--                                                                >-->
        <!--                                                                Register-->
        <!--                                                                </router-link>-->
        <!--                            <p @click="front = false">-->
        <!--                                Register-->
        <!--                            </p>-->
        <!--                        </div>-->
        <!--                    </div>-->
        <!--                </form>-->
        <!--            </div>-->
        <!--        </div>-->


        <!--    <div class="card" v-else key="back">-->
        <!--        <div class="card-header">Register</div>-->
        <!--        <div class="card-body">-->
        <!--            <form method="POST" @submit.prevent="register">-->
        <!--                <div class="row mb-3">-->
        <!--                    <label for="name" class="col-md-4 col-form-label text-md-end">Name</label>-->
        <!--                    <div class="col-md-6">-->
        <!--                        <input id="name" v-model="userReg.name" type="text" class="form-control"-->
        <!--                               required>-->
        <!--                    </div>-->
        <!--                </div>-->
        <!--                <div class="row mb-3">-->
        <!--                    <label for="email" class="col-md-4 col-form-label text-md-end">Email Address</label>-->
        <!--                    <div class="col-md-6">-->
        <!--                        <input id="email" v-model="userReg.email" type="email" class="form-control"-->
        <!--                               required>-->
        <!--                    </div>-->
        <!--                </div>-->
        <!--                <div class="row mb-3">-->
        <!--                    <label for="pass" class="col-md-4 col-form-label text-md-end">Password</label>-->
        <!--                    <div class="col-md-6">-->
        <!--                        <input id="pass" v-model="userReg.password" type="password" class="form-control"-->
        <!--                               required>-->
        <!--                    </div>-->
        <!--                </div>-->
        <!--                <div class="row mb-3">-->
        <!--                    <label for="password-confirm" class="col-md-4 col-form-label text-md-end">Confirm-->
        <!--                        Password</label>-->

        <!--                    <div class="col-md-6">-->
        <!--                        <input id="password-confirm" v-model="userReg.password_confirmation"-->
        <!--                               type="password" class="form-control" required>-->
        <!--                    </div>-->
        <!--                </div>-->
        <!--                <div class="row mb-0">-->
        <!--                    <div class="col-md-6 offset-md-4">-->
        <!--                        <button type="submit" class="btn btn-primary">-->
        <!--                            Register-->
        <!--                        </button>-->
        <!--                        <p @click="front = true">-->
        <!--                            Back-->
        <!--                        </p>-->
        <!--                    </div>-->
        <!--                </div>-->
        <!--            </form>-->
        <!--        </div>-->
        <!--    </div>-->
        <!--    </transition>-->
        <!--        </div>-->
        <!--    </div>-->
        <!--</div>-->

        <transition name="card" mode="out-in">
            <div class="content" v-if="front === true" key="front"
                 v-click-outside="() => {this.$emit('close', false)}"
            >
                <header>Login Form</header>
                <form method="POST" @submit.prevent="loginUser">
                    <div class="field">
                        <span class="fa fa-user"></span>
                        <input type="text" v-model="user.login" required placeholder="Email or Login">
                    </div>
                    <div class="field space">
                        <span class="fa fa-lock"></span>
                        <input type="password" v-model="user.password" class="pass-key" required placeholder="Password">
                        <span class="show">SHOW</span>
                    </div>
                    <div class="pass">
                        <a class="btn btn-link" href="{{ route('password.request') }}">Forgot Password?</a>
                    </div>
                    <div class="field">
                        <input type="submit" value="LOGIN">
                    </div>
                </form>
                <div class="login">
                    Or login with
                </div>
                <div class="links">
                    <div class="facebook">
                        <i class="fab fa-facebook-f"><span>Facebook</span></i>
                    </div>
                    <div class="instagram">
                        <i class="fab fa-instagram"><span>Instagram</span></i>
                    </div>
                </div>
                <div class="signup">
                    Don't have account?
                    <a href="#" @click="front = false">Signup Now</a>
                </div>
            </div>

            <div class="content" v-else key="back">
                <header>Register Form</header>
                <form method="POST" @submit.prevent="registerUser">
                    <div class="field">
                        <span class="fa fa-user"></span>
                        <input id="name" type="text" v-model="userReg.name" required placeholder="Login">
                    </div>
                    <div class="field">
                        <span class="fa fa-user"></span>
                        <input id="email" type="email" v-model="userReg.email" required placeholder="Email">
                    </div>
                    <div class="field space">
                        <span class="fa fa-lock"></span>
                        <input id="pass" type="password" v-model="userReg.password" class="pass-key" required
                               placeholder="Password">
                    </div>
                    <div class="field space">
                        <span class="fa fa-lock"></span>
                        <input id="password-confirm" type="password" v-model="userReg.password_confirmation"
                               class="pass-key" required placeholder="Confirm password">
                    </div>
                    <div class="field">
                        <input type="submit" value="REGISTER">
                    </div>
                </form>

                <div class="signup">
                    You have account?
                    <a href="#" @click="front = true">Login</a>
                </div>
            </div>
        </transition>
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
            front: true,
            userReg: {
                name: '',
                email: '',
                password: '',
                password_confirmation: ''
            }
        };
    },
    mounted() {
        this.formfunction();
    },
    methods: {
        loginValidator() {
            this.errors = [];
            if (!this.userReg.name || this.userReg.name.length < 5) {
                this.errors.push('The login field less than 5 characters...');
            }
            if (!this.userReg.password || this.userReg.password.length < 5) {
                this.errors.push('The password field less than 5 characters...');
            }
            if (this.userReg.password !== this.userReg.password_confirmation ) {
                this.errors.push('Passwords mismatch...');
            }
            if (!this.errors.length)
                return true;
        },
        formfunction() {
            const pass_field = document.querySelector('.pass-key');
            const showBtn = document.querySelector('.show');
            showBtn.addEventListener('click', function () {
                if (pass_field.type === "password") {
                    pass_field.type = "text";
                    showBtn.textContent = "HIDE";
                    showBtn.style.color = "#3498db";
                } else {
                    pass_field.type = "password";
                    showBtn.textContent = "SHOW";
                    showBtn.style.color = "#222";
                }
            });
        },
        loginUser() {
                this.errors = [];
                this.$store.dispatch("auth/login", this.user)
                    .then(() => {
                        if (this.$store.state.auth.errors)
                            this.errors.push(this.$store.state.auth.errors);
                        this.$store.dispatch('auth/zeroError');
                    }).then(() => {
                        if (this.$store.state.auth.status.loggedIn) {
                            this.$router.push('/');
                            this.$emit('close', false);
                        }
                    }
                ).catch((error) => {
                    console.log(error);
                });
        },
        registerUser() {
            if (this.loginValidator()) {
                this.$store.dispatch("auth/register", this.userReg).then(
                    () => {
                        window.location.href = 'http://larav.local/email/verify';
                        // this.$router.push("/verificationMail");
                        this.$emit('close', false);
                    })
                    .catch((error) => {
                        console.log(error);
                    });
            }
            return 'error sign up';
        }
    }
}
</script>
<style scoped>

/*.card {*/
/*    height: 24em;*/
/*    width: 32em;*/
/*}*/

/*-----------------new Form-------------------*/

/*.bg-img{*/
/*  !*background: url('bg.jpg');*!*/
/*  height: 100vh;*/
/*  background-size: cover;*/
/*  background-position: center;*/
/*}*/
/*.bg-img:after{*/
/*  position: absolute;*/
/*  content: '';*/
/*  top: 0;*/
/*  left: 0;*/
/*  height: 100%;*/
/*  width: 100%;*/
/*  background: rgba(0,0,0,0.7);*/
/*}*/
.content {
    position: fixed;
    top: 17%;
    left: 34%;
    z-index: 999;
    text-align: center;
    padding: 1em;
    width: 25em;
    height: 31em;
    /*transform: translate(-50%, -50%);*/
    /*background: rgba(0, 0, 0, 0.7);*/
    background: rgba(51, 51, 51, 0.7);
    box-shadow: -1px 4px 28px 0 rgba(0, 0, 0, 0.75);
}

.content header {
    color: white;
    font-size: 2em;
    margin: 0 0 1em 0;
    font-family: 'Montserrat', sans-serif;
}

.field {
    position: relative;
    height: 3em;
    margin: 1em 0;
    width: 100%;
    display: flex;
    background: rgba(255, 255, 255, 0.94);
}

.field span {
    color: #222;
    width: 40px;
    line-height: 45px;
}

.field input {
    height: 100%;
    width: 100%;
    background: transparent;
    border: none;
    outline: none;
    color: #222;
    font-size: 16px;
    font-family: 'Poppins', sans-serif;
}

/*.space {*/
/*    margin-top: 16px;*/
/*}*/

.show {
    position: absolute;
    right: 13px;
    font-size: 13px;
    font-weight: 700;
    color: #222;
    display: none;
    cursor: pointer;
    font-family: 'Montserrat', sans-serif;
}

.pass-key:valid ~ .show {
    display: block;
}

.pass {
    text-align: left;
    margin: 1em 0;
}

.pass a {
    color: white;
    text-decoration: none;
    font-family: 'Poppins', sans-serif;
}

.pass:hover a {
    text-decoration: underline;
}

.field input[type="submit"] {
    background: #3498db;
    border: 1px solid #2691d9;
    color: white;
    font-size: 18px;
    letter-spacing: 1px;
    font-weight: 600;
    cursor: pointer;
    font-family: 'Montserrat', sans-serif;
}

.field input[type="submit"]:hover {
    background: #2691d9;
}

.login {
    color: white;
    margin: 0.5em 0;
    font-family: 'Poppins', sans-serif;
}

.links {
    display: flex;
    cursor: pointer;
    color: white;
    margin: 0 0 20px 0;
}

.facebook, .instagram {
    width: 100%;
    height: 45px;
    line-height: 45px;
    margin-left: 10px;
}

.facebook {
    margin-left: 0;
    background: #4267B2;
    border: 1px solid #3e61a8;
}

.instagram {
    background: #E1306C;
    border: 1px solid #df2060;
}

.facebook:hover {
    background: #3e61a8;
}

.instagram:hover {
    background: #df2060;
}

.links i {
    font-size: 17px;
}

i span {
    margin-left: 8px;
    font-weight: 500;
    letter-spacing: 1px;
    font-size: 16px;
    font-family: 'Poppins', sans-serif;
}

.signup {
    font-size: 15px;
    color: white;
    font-family: 'Poppins', sans-serif;
}

.signup a {
    color: #3498db;
    text-decoration: none;
}

.signup a:hover {
    text-decoration: underline;
}

.card-enter-from, .card-leave-to {
    /*opacity: 0;*/
    transform: rotateY(90deg);
}

.card-enter-active, .card-leave-active {
    transition: all 0.6s;
}

</style>
