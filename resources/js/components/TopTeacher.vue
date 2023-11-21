<template>
    <div>
        <div class="container-fluid" id="secondSection">
            <div class="row m-0 p-0 pt-5 content-header justify-content-center text-center">
                <div class="col-1 col-sm-1">
                    <img class="left-effect" src="/images/effect.png" alt="">
                </div>
                <div class="col-10 col-sm-10 col-md-10">
                    <h3 class="content-title">Top Teacher On Teach<span>Hub</span>
                        <img class="content-title-image" src="/images/Particle.png" alt="">
                    </h3>
                </div>
                <div class="col-1 col-sm-1">
                    <img class="right-effect" src="/images/effect.png" alt="">
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row pt-5">
                <div class="col-3 mt-2 mb-2" v-for="p in 6">
                    <div class="card border-0">
                        <img src="/images/hero.png" class="card-img-top teacher-image" alt="...">
                        <div class="card-body">
                            <div class="specialist mb-2">
                                <span class="badge">Mathematics</span>
                            </div>
                            <p class="teacher-name">Kay Thi Kyine Myint</p>
                            <div class="teacher-time">
                              <li>Mon-Tue <span>( 8:00 - 9:00 PM)</span></li>
                              <li>Sat-Sun <span>( 8:00 - 9:00 PM)</span></li>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {

}
</script>
<style lang="scss">
.left-effect,
.right-effect {
    width: 30px;
    position: relative;
}

.right-effect {
    top: -20%;
    left: -10px;
}

.content-title {
    font-size: 4vw;
    font-weight: bold;
    position: relative;

    >span {
        color: #8642DE;
    }

    &:before {
        content: url('/images/effect.png');
        display: inline;
        top: 20px;
        width: 10%;
        /* Adjust the width of the image as a percentage */
        max-height: 10%;
        /* Set a maximum height if needed */
        opacity: 0.2;
        height: auto;
        position: absolute;
        vertical-align: top;
    }
}

.content-title-image {
    width: 80px;
    position: relative;
    top: -30px;
    left: -20px;
    transform: rotate(-10deg);
}

.specialist{
    >span{
        background-color: #FFEDAA;
        color: #1B0D2C;
        font-size: 12px;
        font-weight: 600;
    }
}

.teacher-name{
    font-size: 18px;
    font-weight: 700;
    color: #141414;
    margin-bottom: 5px;
}

.teacher-image{
   border: none;
   box-shadow: 1px 1px 3px #e3e0e6;
   border-left: 1.5px solid #8642DE;
   border-bottom: 1.5px solid #8642DE;
   border-radius: 8px;
}

.teacher-time{
    >li{
        list-style: none;
        font-size: 14px;
        font-weight: 600;
        padding-top: 3px;
        >span{
            font-weight: 400;
        }
    }
}

@media screen and (min-width:300px) and (max-width : 375px) {
    .content-title {
        font-size: 8vw;
        line-height: 12vw;
    }

    .content-title-image {
        width: 40px;
        top: -10px;
        left: -10px;
    }
}

@media screen and (min-width:376px) and (max-width : 576px) {
    .content-title {
        font-size: 7vw;
        line-height: 11vw;
    }

    .content-title-image {
        width: 50px;
        top: -10px;
        left: -8px;
    }
}

@media screen and (min-width:577px) and (max-width : 992px) {
    .content-title {
        font-size: 5vw;
        line-height: 11vw;
    }

    .content-title-image {
        width: 50px;
        top: -10px;
        left: -8px;
    }
}
</style>
