<template>
    <div class="d-flex flex-column">

        <div class="top">
            <p><img :src="'/images/leaf_1.jpg'" width="25" alt="leaf"></p>
            <router-link to="/">Mysite</router-link>
        </div>

        <div id="myTopnav" class="topnav">

            <router-link class="active" to="/">Главная</router-link>

            <router-link to="/">Уведомления</router-link>

            <router-link to="/">Отзывы</router-link>

            <router-link to="/chat">Chat</router-link>

            <a href="javascript:void(0);">
                <catalog-button>
                </catalog-button>
            </a>

            <a href="javascript:void(0);">
                <cart-button>
                </cart-button>
            </a>
            <a href="javascript:void(0);">
                <search-button>
                </search-button>
            </a>
            <a href="javascript:void(0);" class="icon" @click="myFunction">
                <i class="fa fa-bars"></i>
            </a>

            <div v-if="loggedIn" class="d-flex">
                <a href="javascript:void(0);">{{ user }}</a>

                <a href="javascript:void(0);">
                    <router-link @click="logout" to="">Logout</router-link>
                </a>
            </div>

            <div v-else class="d-flex">
                <a href="javascript:void(0);">
                    <router-link to="/login">Login</router-link>
                </a>
                <a href="javascript:void(0);">
                    <router-link to="/register">Register</router-link>
                </a>

            </div>

        </div>
    </div>
    <div class="row menu top">
        <div class="col-10 d-flex flex-column align-self-center justify-content-center pl-4">
            <div>
                <nav class="menu-list">
                    <a href="#">Главная</a>
                    <a href="#">Новости</a>
                    <a href="#">Контакты</a>
                    <a href="#">Портфолио</a>
                </nav>
            </div>
            <range-slider
                @filter="filter"
            >
            </range-slider>
        </div>
        <div class="col-2 d-flex align-items-center justify-content-center cursor">
            <img class="cursorLeft" :src="'/images/cursorRight.png'" width="25" height="25" alt="cursorLeft">
        </div>
    </div>


</template>

<script>

export default {
    name: "NavBar",
    data: () => {
    },
    computed: {
        loggedIn() {
            return this.$store.state.auth.status.loggedIn;
        },
        user() {
            return this.$store.state.auth.user.name;
        },
    },
    mounted() {
        this.topNav();
        this.activeNav();
        this.asideMenu();
    },
    methods: {
        asideMenu() {
            let isShow = false;
            let cursor = document.querySelector('.cursor');
            let menu = document.querySelector('.menu');
            cursor.addEventListener('click', function () {
                if (isShow === false) {
                    isShow = true;
                    menu.style.left = '0';
                    cursor.style.transform = ' rotate(180deg)';
                    cursor.style.transition = 'all .6s';
                } else {
                    isShow = false;
                    menu.style.left = '-280px';
                    cursor.style.transform = ' rotate(360deg)';
                    cursor.style.transition = 'all .6s';
                }
            })
        },
        myFunction() {
            let x = document.getElementById("myTopnav");
            if (x.className === "topnav") {
                x.className += " responsive";
            } else {
                x.className = "topnav";
            }
        },
        topNav() {
            let navbar = document.getElementById("myTopnav");
            let sticky = navbar.offsetTop;

            window.addEventListener('scroll', function () {
                if (window.pageYOffset >= sticky) {
                    navbar.classList.add("sticky");
                } else {
                    navbar.classList.remove("sticky");
                }
            })
        },
        activeNav() {
            let container = document.querySelector(".topnav");
            let a = container.getElementsByTagName("a");
            let current = document.getElementsByClassName("active");
            if (current) {
                for (let i = 0; i < a.length; i++) {
                    a[i].addEventListener("click", function () {
                        current[0].classList.remove('active');
                        a[i].classList.add('active');
                    });
                }
            }
        },
        logout() {
            this.$store.dispatch("auth/logout").then(
                () => {
                    this.$router.push("/login")
                })
                .catch((error) => {
                    console.log(error);
                });
        },
        filter(data) {
            return this.$store.dispatch('product/SET_FILTER', data).then(() => this.$store.dispatch('product/GET_FILTER')).then(() => this.$router.push('/product/filter'));
        }
    }
}
</script>

<style scoped>

.menu {
    display: flex;
    position: fixed;
    top: 0;
    left: -280px;
    z-index: 20;
    background-color: whitesmoke;
    color: #000;
    width: 330px;
    cursor: pointer;
    height: 100%;

    /* анимация всех свойств */
    -webkit-transition: all .6s;
    -o-transition: all .6s;
    -moz-transition: all .6s;
    transition: all .6s;
}

.active {
    z-index: 20;
    left: 0;
    color: #FFFFFF;
    background-color: ghostwhite;
}


.menu-list {
    margin-top: 100px;
    height: 100%;
    display: flex;
    font-size: 14px;
    flex-direction: column;
}

.sticky {
    position: fixed;
    top: 0;
    width: 100%;
}

.topnav {
    overflow: hidden;
    background-color: #333;
    z-index: 160;
    display: flex;
    justify-content: space-around;
    box-shadow: 0 2px 16px 11px rgba(229, 235, 240, 0.2);

}

.topnav a {
    display: flex;
    align-items: center;
    height: 50px;
    color: #f2f2f2;
    text-align: center;
    padding: 4px 16px;
    text-decoration: none;
    font-size: 14px;
}

a:hover {
    transition: .5s;
    color: #00a379;
    cursor: pointer;
}

.topnav a.active {
    /*background-color: #333;*/

    background-color: #00a379;
    opacity: 1;
    animation: flash 1s;
}

@keyframes flash {
    0% {
        opacity: .1;
    }
    100% {
        opacity: 1;
    }
}

.topnav .icon {
    display: none;
}

@media screen and (max-width: 768px) {
    .topnav {
        overflow: hidden;
        background-color: #333;
        z-index: 160;
        display: flex;
        justify-content: flex-start;
    }

    .topnav a:not(:first-child) {
        display: none;
    }

    .topnav a.icon {
        display: flex;
        position: absolute;
        right: 0;
    }
}

@media screen and (max-width: 768px) {
    .topnav.responsive {
        display: flex;
        flex-direction: column;
    }

    .topnav.responsive .icon {
        position: absolute;
        text-align: center;
        vertical-align: center;
        top: 29px;
        right: 0;
    }

    .topnav.responsive a {
        display: flex;
    }
}
</style>
