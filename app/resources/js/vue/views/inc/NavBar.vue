<template>
    <div class="d-flex flex-column">

        <div class="top">
            <p><img :src="'/images/leaf_1.jpg'" width="25" alt="leaf"></p>
            <router-link to="/">Mysite</router-link>
        </div>

        <ul id="sticky-menu" class="topnav">

            <li class="menu-nav">
                <router-link class="active" to="/">Главная</router-link>
            </li>

            <li class="menu-nav">
                <router-link to="/">Уведомления</router-link>
            </li>

            <li class="menu-nav">
                <router-link to="/">Отзывы</router-link>
            </li>

            <li class="menu-nav">
                <router-link to="/chat">Chat</router-link>
            </li>
            <li class="menu-nav"><a href="javascript:void(0);">
                <catalog-button
                >
                </catalog-button>
            </a></li>

            <li><a href="javascript:void(0);">
                <cart-button>
                </cart-button>
            </a></li>
            <li><a href="javascript:void(0);">
                <search-button>
                </search-button>
            </a></li>
            <li class="icon" href="javascript:void(0);" @click="burgerMenu">
                <i class="fa fa-bars"></i>
            </li>
            <li style="position: relative;">
                <!--                <a v-if="loggedIn" href="javascript:void(0);">{{ user }}</a>-->
                <a v-if="loggedIn" v-on:click="showUser = !showUser">
                    <img :src="'/images/avatar.png'" width="25" alt="avatar"
                                        style="cursor: pointer;">
                </a>

                <a v-else href="javascript:void(0);">
                    <router-link to="/login">Login</router-link>
                </a>

                <transition name="fade">
                        <ul v-if="showUser" class="p-0 show-user"
                            @mouseleave="showUser = !showUser"
                        >
                            <li class="d-flex justify-content-center show-user-li">
                                <router-link to=""
                                             class="animate__animated"
                                             @mouseover="addAnimate($event)"
                                             @mouseleave="addAnimate($event)"
                                >Profile</router-link>
                            </li>
                            <li class="d-flex justify-content-center show-user-li">
                                <router-link @click="logout" to=""
                                             class="animate__animated"
                                             @mouseover="addAnimate($event)"
                                             @mouseleave="addAnimate($event)"
                                >Logout</router-link>
                            </li>
                        </ul>
                </transition>

            </li>
        </ul>
    </div>
    <div class="row menu top">
        <div class="col-10 d-flex flex-column align-self-center justify-content-center pl-4">
            <div>
                <nav class="menu-list">
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

import 'animate.css';

export default {
    name: "NavBar",
    data: () => {
        return {
            showUser: false,
        }
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
        burgerMenu() {
            let x = document.getElementById("sticky-menu");
            x.classList.toggle('responsive');
        },
        topNav() {
            let navbar = document.getElementById("sticky-menu");
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
            let items = document.querySelectorAll(".topnav a");
            items.forEach((item) => {
                item.addEventListener('click', () => {
                    items.forEach((itemOther) => {
                        itemOther.classList.remove('active');
                    });
                    item.classList.add('active');
                })
            })
        },
        addAnimate(e) {
            e.target.classList.toggle('animate__headShake');
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
    display: flex;
    justify-content: space-around;
    margin: 0;
    padding: 0;
    background-color: #333;
    box-shadow: 0 2px 16px 11px rgba(229, 235, 240, 0.2);
    font-weight: bold;
    font-size: 14px;
    z-index: 160;
    height: 3.2em;
}

.topnav li {
    display: flex;
    align-items: center;
    min-width: 3em;
    position: relative;
    /*padding: 4px 16px;*/
}

.topnav li a {
    display: flex;
    justify-content: center;
    align-items: center;
    font-family: 'Raleway', sans-serif;
    text-decoration: none;
    color: whitesmoke;
    min-width: 42px;
    min-height: 38px;
}

.topnav li.menu-nav a::after {
    background: #17baaa;
    content: "";
    height: 2px;
    left: 0;
    bottom: 4px;
    position: absolute;
    transform: scaleX(0);
    transition: all .5s ease;
    width: 100%;
}

.topnav li.menu-nav a:hover {
    transition: all .5s ease;
    color: #17baaa;
}

.topnav li.menu-nav a:hover::after {
    transform: scaleX(1.0);
}

/*.topnav li a:hover {*/
/*    background: rgb(121, 120, 120);*/
/*}*/

/*a:hover {*/
/*    color: #00a379;*/
/*    cursor: pointer;*/
/*    !*text-shadow: 2px 2px 4px #00a379;*!*/

/*    -webkit-animation: neon2 1.5s ease-in-out infinite alternate;*/
/*    -moz-animation: neon2 1.5s ease-in-out infinite alternate;*/
/*    animation: neon2 1.5s ease-in-out infinite alternate;*/

/*}*/

/*@keyframes neon2 {*/
/*    from {*/
/*        text-shadow: 0 0 10px #fff,*/
/*        0 0 20px  #fff,*/
/*        0 0 30px  #fff,*/
/*        0 0 40px  #228DFF,*/
/*        0 0 70px  #228DFF,*/
/*        0 0 80px  #228DFF,*/
/*        0 0 100px #228DFF,*/
/*        0 0 150px #228DFF;*/
/*    }*/
/*    to {*/
/*        text-shadow: 0 0 5px #fff,*/
/*        0 0 10px #fff,*/
/*        0 0 15px #fff,*/
/*        0 0 20px #228DFF,*/
/*        0 0 35px #228DFF,*/
/*        0 0 40px #228DFF,*/
/*        0 0 50px #228DFF,*/
/*        0 0 75px #228DFF;*/
/*    }*/
/*}*/

.topnav a.active {
    color: #17baaa;
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

.topnav li.icon {
    display: none;
}

@media screen and (max-width: 768px) {
    .topnav {
        z-index: 160;
        display: flex;
        justify-content: flex-start;
    }

    .topnav li {
        margin: 0;
        padding: 0;
    }

    .topnav li a {
        height: 3.2em;
    }

    .topnav li:not(:first-child) {
        display: none;
    }

    .topnav li.icon {
        color: white;
        display: flex;
        justify-content: center;
        align-items: center;
        height: inherit;
        cursor: pointer;
        margin-left: auto;
        position: absolute;
        right: 0;
    }
}

@media screen and (max-width: 768px) {
    .topnav.responsive {
        display: flex;
        flex-direction: column;
    }

    .topnav.responsive li:not(.icon) {
        display: block;
        background-color: #333;
    }

    .topnav.responsive li:hover {
        background-color: #57595c;
    }

    .topnav.responsive li.icon {
        color: white;
        display: flex;
        justify-content: center;
        align-items: center;
        height: inherit;
        cursor: pointer;
        margin-left: auto;
        position: absolute;
        right: 0;
    }
}

/*-------------------menu user---------------------*/
/*.fade-enter-active, .fade-leave-active {*/
/*    transition: opacity .5s;*/
/*}*/
/*.fade-enter, .fade-leave-to !* .fade-leave-active до версии 2.1.8 *! {*/
/*    opacity: 0;*/
/*}*/


.fade-enter-from,
.fade-leave-to
{
    transform: scaleY(0);
    transform-origin: top;
    opacity: 0;
}

.fade-enter-to,
.fade-leave-from {
    transform: scaleY(1);
    transform-origin: top;
    opacity: 1;
}

.fade-enter-active,
.fade-leave-active {
    transition: all 0.4s ease-out;
    transform-origin: top;
    /*color: rgb(51, 51, 51);*/
}



.show-user {
    position: absolute;
    background-color: rgb(121, 120, 120);
    width: 8.2em;
    height: inherit;
    top: 3.2em;
    left: -3em;
}
/*-------------------------------------------------*/

</style>
