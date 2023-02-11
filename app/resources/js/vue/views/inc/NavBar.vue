<template>
    <div class="d-flex flex-column">

        <div class="top">
            <p><img :src="'/images/leaf_1.jpg'" width="25" alt="leaf"></p>
            <router-link class="nav-link router-link" to="/">Mysite</router-link>
        </div>

        <div id="myTopnav" class="topnav">

            <router-link class="active" to="/">Главная</router-link>

            <router-link to="/">Уведомления</router-link>

            <router-link to="/">Отзывы</router-link>

            <router-link to="/">Добавить</router-link>

            <a href="javascript:void(0);">
                <catalog-button>
                </catalog-button>
            </a>
            <!--<a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#myModal">Catalog</a>-->
            <a href="javascript:void(0);">
                <cart-button>
                </cart-button>
            </a>
            <a href="javascript:void(0);">
                <search-button>
                </search-button>
            </a>
            <!--                @role('admin|manager')-->
            <!--                <img src="{{asset('storage/'.Auth::user()->avatar)}}" alt="image" height="20" width="20"-->
            <!--                     class="mr-2">-->

            <!--                <div class="drop dropdown-menu" aria-labelledby="dropdownMenuLink">-->
            <!--                    <a class="dropdown-item" href="#">Profile</a>-->
            <!--                    <a class="dropdown-item" href="#">Orders</a>-->
            <!--                    <a class="dropdown-item" href="{{ route('logout') }}">Выход</a>-->
            <!--                </div>-->
            <!--                @endrole-->
            <!--                @role('user')-->
            <!--                <div class="dropdown" style="display: flex; align-items: center;">-->
            <!--                    <p class="dropdown-toggle" type="button" id="dropdownMenuButton1"-->
            <!--                       data-bs-toggle="dropdown" aria-expanded="false">-->
            <!--                        <img src="{{asset('storage/'.Auth::user()->avatar)}}" alt="image" height="20" width="20"-->
            <!--                             class="mr-2">-->

            <!--                        {{ Auth::user()->name }}-->
            <!--                    </p>-->
            <!--                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">-->
            <!--                        <li><a class="dropdown-item" href="#">Profile</a></li>-->
            <!--                        <li><a class="dropdown-item" href="#">Orders</a></li>-->
            <!--                        <li><a class="dropdown-item" href="{{ route('logout') }}">Выход</a></li>-->
            <!--                    </ul>-->
            <!--                </div>-->
            <!--                @endrole-->
            <!--                @guest-->

            <!--                <a href="{{ route('login') }}" class="">-->
            <!--                    Войти-->
            <!--                </a>-->

            <!--                @endguest-->

            <!--            <a href="#" class="dropdown showdropdown-toggle" id="dropdownMenuLink" data-toggle="dropdown"-->
            <!--               aria-haspopup="true" aria-expanded="false"-->
            <!--            >-->
            <!--            </a>-->
            <a href="javascript:void(0);" class="icon" @click="myFunction">
                <i class="fa fa-bars"></i>
            </a>
            <a href="javascript:void(0);">

<!--                        <div class="navbar-nav" v-if="loggedUser">-->
<!--                            <h5>Dashboard</h5>-->
<!--                            <a href="javascript:void(0)" @click="logout()" class="nav-item nav-link ml-3">Logout</a>-->
<!--                        </div>-->
<!--                        <div v-else>-->
                            <router-link to="/login">Login</router-link>
            </a>
                <a href="javascript:void(0);">
                            <router-link to="/register">Register</router-link>
<!--                        </div>-->

            </a>
        </div>
    </div>

    <div class="menu top">
        <nav class="menu-list">
            <a href="#">Главная</a>
            <a href="#">Новости</a>
            <a href="#">Контакты</a>
            <a href="#">Портфолио</a>
        </nav>
    </div>


</template>

<script>


export default {
    name: "NavBar"
    ,
    data() {
        return {
            currentLink: "installation",
        }
    },
    mounted() {
        this.topNav();
        this.activeNav();
    },
    methods: {
        goToInstallation() {
            this.currentLink = "installation";
        },
        goToCommunication() {
            this.currentLink = "communication";
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
            // const top = document.querySelector('.top');
            // const header = document.querySelector('#myTopnav');
            //
            // window.addEventListener('scroll', function () {
            //
            //     if (pageYOffset > 0) {
            //         // top.style = 'margin-top: -2rem; transition: all 1s;';
            //         header.classList.add('fixed-top');
            //     } else {
            //         top.style = 'margin-top: 0px; transition: all 0.3s;';
            //         header.classList.remove('fixed-top');
            //     }
            // });
            // window.onscroll = function() {myFunction()};

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
            // let container = document.querySelector(".topnav");
            // let a = container.getElementsByTagName("a");
            // for (let i = 0; i < a.length; i++) {
            //     a[i].addEventListener("click", function () {
            //         console.log(a);
            //         let current = document.getElementsByClassName("active");
            //         current[0].className = '';
            //         this.className = "active";
            //     });
            // }
        }
        // ,
        // sidebar() {
        //     let menu = document.querySelector('.menu');
        //     menu.className = "menu_active";
        // }
    }
}
</script>

<style scoped>

.menu {
    display: flex;
    position: fixed;
    flex-direction: column;
    top: 0;
    left: -250px;
    z-index: 20;
    background-color: #b0d4f1;
    color: #000;
    width: 280px;
    cursor: pointer;
    height: 100%;
    padding: 10px;
    font-size: 1.5em;

    /* анимация всех свойств */
    -webkit-transition: all .6s;
    -o-transition: all .6s;
    -moz-transition: all .6s;
    transition: all .6s;
}

.menu:hover {
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

/*#myTopnav {*/
/*    overflow: hidden;*/
/*    z-index: 160;*/
/*    background-color: #333;*/
/*}*/


.topnav {
    overflow: hidden;
    background-color: #333;
    z-index: 160;
    display: flex;
    justify-content: space-around;
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

.topnav a:hover {
    background-color: #ddd;
    color: black;
}

.topnav a.active {
    background-color: #04AA6D;
    color: white;
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
