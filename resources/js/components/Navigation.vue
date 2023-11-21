<template>
    <!-- <div class="d-md-block" style="min-height: 5px;background-color: #232;"></div> -->
    <nav class="navbar custom navbar-expand-md">

        <div class="container-fluid" style="background-color: #FFFFFF;">
            <div class="d-none d-md-block m-2" style="width:50px;"></div>
            <a class="navbar-brand text-success fw-bold ml-5" style="font-size: 20px;" href="#">
                <img style="width: 60px;" src="/TeachHub resources/logo.png" alt="">
            </a>
            <font-awesome-icon class="navbar-toggler border-0 fw-bold" style="font-size: 29px;" icon="fas fa-bars"
                data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll">
            </font-awesome-icon>
            <div class="collapse navbar-collapse" id="navbarScroll">
                <ul class="m-auto"> </ul>
                <ul class="navbar-nav ml-auto my-2 my-md-0" style="--bs-scroll-height: 100px;">
                    <router-link v-for="(route, i) in router" :key="i" class="nav-link p-4 pt-3 pb-3 pt-md-0 pb-md-0" tag="li"
                        active-class="active" aria-current="page" :to="route.path">
                        {{ route.name }}
                    </router-link>
                </ul>
                <!-- <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
                <ul class="navbar-nav my-2 my-md-0 pt-3 pb-3 pt-md-0 pb-md-0" style="--bs-scroll-height: 100px;">
                    <button  v-if="auth" @click="logout" class="btn border-0 p-4 pt-2 pb-2 fw-bold nav-link"  active-class="active" aria-current="page">Logout</button>
                    <router-link v-else class="nav-link p-4 pt-2 pb-2 fw-bold"  active-class="active" aria-current="page" to="/login">Login</router-link>
                </ul> -->
            </div>
        </div>
    </nav>

    <div class="offcanvas offcanvas-top h-100 bg-light" style="z-index: 19999;top: 49px;" tabindex="-1"
        id="nav-small-device" aria-labelledby="offcanvasWithBackdropLabel">
        <div class="offcanvas-body">
            <div class="row pt-5 justify-content-center">
                <div class="col-12 text-center pt-2">
                    <li class="list-unstyled border-bottom pb-4">
                        <a class="fw-bold text-dark text-decoration-none" aria-current="page" href="index.php">
                            <h4>Home</h4>
                        </a>
                    </li>
                    <li class="list-unstyled border-bottom pt-4 pb-4">
                        <a class="fw-bold text-dark text-decoration-none" href="about.php">
                            <h4>About Us</h4>
                        </a>
                    </li>
                    <li class="list-unstyled border-bottom pt-4 pb-4">
                        <a class="fw-bold text-dark text-decoration-none" href="contact.php">
                            <h4>Contact Us</h4>
                        </a>
                    </li>
                </div>
                <div class="col-12 text-center position-fixed" style="bottom: 0;">
                    <img class="pt-4" src="image/logoT.png" width="100 " alt=" ">
                    <p class="fw-bold">THIDA AUTO CENTER </p>
                    <p>Prestige Car Sourcing Specialist and Export Worldwide</p>
                    <div class="col-12 small">
                        <hr>
                        <p>Read Our <a class="text-decoration-none" href="privacy.php">Privacy Policy</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            title: "<Zakerxa/>",
            navIcon: 'navbar-toggler-icon',
            navTran: 'transform: rotateZ(0deg);',
            navCheck: false,
            bsOffcanvas: '',
            router: [{
                name: "Home",
                path: "/"
            },
            {
                name: "About",
                path: "/about"
            },
            {
                name: "Contact",
                path: "/contact"
            }
            ]
        }
    },
    methods: {
        logout() {
            this.$store.dispatch('logout')
                .then(() => console.log("Log Out"))
                .catch(() => console.log("Unauthorize User"));
        }
    },
    computed: {
        auth() {
            return this.$store.state.auth
        }
    }
}
</script>


<style lang="scss" scoped>
.navigation {
    position: fixed;
    background: #fff;
    top: 0;
    padding: 0;
    z-index: 9999;
    width: 100%;
}


.custom {
    height: 75px
}

@media screen and (max-width:576px) {}

@media screen and (min-width:768px) {

    .nav-link {
        font-weight: bold;
        font-size: 18px;
        // &:hover {
        //     transition: transform 0.2s;
        //     transform: rotate(10deg);
        // }

        &:active {
            transition: border-bottom .2s;
            color: #d6f0ff;
        }
    }

    .exact-active {
        font-weight: bold;
        cursor: pointer;
        color: #7fb4ff !important;
    }
}</style>
