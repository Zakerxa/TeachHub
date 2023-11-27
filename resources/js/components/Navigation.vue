<template>
    <!-- <div class="d-md-block" style="min-height: 5px;background-color: #232;"></div> -->
    <nav class="navbar custom navbar-expand-md" style="background-color: #FFFFFF;">

        <div class="container-fluid">
            <div class="d-none d-md-block m-2" style="width:50px;"></div>
            <a class="navbar-brand text-success fw-bold ml-5" style="font-size: 20px;" href="#">
                <img style="width: 60px;" src="/TeachHub resources/logo.png" alt="">
            </a>

            <font-awesome-icon @click="toggleCollapse" class="navbar-toggler border-0 fw-bold" style="font-size: 29px;"
                :icon="navIcon" aria-controls="navbarScroll">
            </font-awesome-icon>


            <!-- Desktop -->
            <div class="d-none d-lg-block navbar-collapse" :style="{ zIndex: 1 }">
                <ul class="m-auto"> </ul>
                <ul class="navbar-nav ml-auto my-2 my-md-0" style="--bs-scroll-height: 100px;">
                    <router-link v-for="(route, i) in router" :key="i" class="nav-link p-4 pt-3 pb-3 pt-md-2 pb-md-0"
                        tag="li" active-class="active" aria-current="page" :to="route.path">
                        {{ route.name }}
                    </router-link>

                    <Language class="p-4 pt-3 pb-3 pt-md-1 pb-md-0" />
                </ul>
            </div>

           <!-- Mobile -->
            <transition name="custom-collapse" @enter="enter" @before-enter="beforeEnter" @after-enter="afterEnter"
                @after-leave="afterLeave">
                <div v-if="isCollapseOpen" key="collapse" class="collapse navbar-collapse" :style="{ zIndex: 1 }"
                    id="navbarScroll" :class="{ show: isCollapseOpen }">
                    <ul class="m-auto"> </ul>
                    <ul class="navbar-nav ml-auto my-2 my-md-0" style="--bs-scroll-height: 150px;">
                        <router-link @click="closeCollapse" v-for="(route, i) in router" :key="i"
                            class="nav-link p-2 pt-3 pb-3 pt-md-1 pb-md-0" style="font-size: 18px;" tag="li" active-class="active"
                            aria-current="page" :to="route.path">
                            {{ route.name }}
                        </router-link>

                        <Language class="p-2 pt-3 pb-3 pt-md-1 pb-md-0" />
                    </ul>

                    <ul class="d-block d-lg-none p-0">
                      <div class="row mt-3 p-2 pb-0">
                         <div class="brands-container">
                            <font-awesome-icon class="brands-color" icon="fa-brands fa-facebook" />
                         </div>
                         <div class="brands-container">
                            <font-awesome-icon class="brands-color" icon="fa-brands fa-twitter" />
                         </div>
                         <div class="brands-container">
                            <font-awesome-icon class="brands-color" icon="fa-brands fa-instagram" />
                         </div>
                         <div class="brands-container">
                            <font-awesome-icon class="brands-color" icon="fa-brands fa-youtube" />
                         </div>
                      </div>

                      <div class="row p-3 pt-2">
                          <div class="" style="font-size: 12px;">
                            All Rights Reserved. Copyright @ 2023 TeachHub
                          </div>
                      </div>
                    </ul>

                    <!--  <ul class="navbar-nav my-2 my-md-0 pt-3 pb-3 pt-md-0 pb-md-0" style="--bs-scroll-height: 100px;">
                    <button  v-if="auth" @click="logout" class="btn border-0 p-4 pt-2 pb-2 fw-bold nav-link"  active-class="active" aria-current="page">Logout</button>
                    <router-link v-else class="nav-link p-4 pt-2 pb-2 fw-bold"  active-class="active" aria-current="page" to="/login">Login</router-link>
                </ul> -->
                </div>
            </transition>
        </div>
    </nav>
</template>

<script>
// import 'bootstrap/dist/css/bootstrap.min.css';
// import 'bootstrap/js/dist/collapse';
import Language from '../settings/Language.vue'
export default {
    data() {
        return {
            isCollapseOpen: false,
            title: "<Zakerxa/>",
            navIcon: 'fas fa-bars',
            navTran: 'transform: rotateZ(0deg);',
            navCheck: false,
            bsOffcanvas: '',
            router: [{
                name: "Home",
                path: "/"
            },
            {
                name: "Explore",
                path: "/explore"
            },
            {
                name: "Contact Us",
                path: "/contact"
            }
            ]
        }
    },
    methods: {
        toggleCollapse() {
            // Toggle the collapse manually
            $('#navbarScroll').collapse('toggle');

            this.isCollapseOpen = !this.isCollapseOpen;
            if (this.isCollapseOpen) this.navIcon = 'fas fa-xmark';
            else this.navIcon = 'fas fa-bars';
        },
        closeCollapse() {
            $('#navbarScroll').collapse('hide');
            this.navIcon = 'fas fa-bars';
            this.isCollapseOpen = false;
        },
        beforeEnter(el) {
            el.style.transition = 'height 0.3s ease-in';
            el.style.height = (el.scrollHeight) + 'px';
        },
        enter(el) {
            el.style.height = el.scrollHeight + 'px'; // Set height dynamically based on content height
        },
        afterEnter(el) {
            console.log("afterEnter", el.scrollHeight)
            el.style.transition = 'height 0.3s ease-out';
            el.style.height = el.scrollHeight + 'px';
        },
        afterLeave(el) {
            el.style.transition = '';
            el.style.height = '0';
        }
    },
    computed: {

    },
    components: {
        Language
    },
}
</script>


<style lang="scss" scoped>

.brands-container{
  width: 45px;
}
.brands-color{
    color: #8642DE;
    border: 1px solid #8642DE;
    font-size: 17px;
    border-radius: 50%;
    padding: 5px;
}

.custom-collapse-enter-active,
.custom-collapse-leave-active {
    transition: height 0.5s ease;
    overflow: hidden;
}

.custom-collapse-enter,
.custom-collapse-leave-to {
    height: 0;
    overflow: hidden;
}

.custom {

    position: sticky;
    z-index: 9999;
    width: 100%;
    top: 0px;
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
        color: #8642DE !important;
    }
}
</style>
