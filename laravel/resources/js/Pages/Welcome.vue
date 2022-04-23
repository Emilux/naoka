<template>


    <Head title="Home" />
    <Navbar>
        <template v-if="canLogin && !$page.props.user">
            <NavLink class="mx-8" :href="route('register')" >Register</NavLink>
            <NavButton :href="route('login')">Sign In</NavButton>
        </template>
    </Navbar>
    <main>
        <section class="container mx-auto mt-44 md:mt-56 mb-28 md:flex md:items-center relative">
            <div class="text-center md:text-left px-8 mb-32 md:mb-0 md:pr-16">
                <span class="font-semibold text-xs bg-naoka-yellow py-1 px-2.5 mb-4 inline-block">Lorem Ipsum dolor ipsumeto</span>
                <h1 class="text-3xl lg:text-6xl font-red-hat font-bold mb-4">Work with kanban board</h1>
                <p class="text-black lg:text-lg mb-8">
                    Lorem ipsum dolor ipsumeto la quuenata loca que ota boy ?
                    commen toutou pelle ? random text...
                </p>
                <Link color="blue">
                    Learn more
                    <i class="naoka-icon SolidChevronRight ml-2"></i>
                </Link>
            </div>
            <div class="md:pl-16 relative some-section">
                <img class="z-10 relative" src="/images/kanban_illustration.png" alt="">
                <div id="bubble1" class="z-0 absolute w-8 sm:w-12 h-8 sm:h-12 bg-naoka-purple -top-16 left-36 rounded-full"></div>
                <div id="bubble2" class="z-0 absolute w-10 sm:w-16 h-10 sm:h-16 bg-naoka-blue top-0 -right-4 rounded-full"></div>
                <div id="bubble3" class="z-0 absolute w-16 sm:w-28 h-16 sm:h-28 bg-naoka-yellow left-8 -bottom-8 rounded-full"></div>
            </div>
        </section>
        <section id="puddle" class="bg-naoka-blue py-36 md:py-32 px-11 relative overflow-hidden sm:rounded-section container">
            <div id="puddleRight" class="absolute top -top-10 -right-32 md:right-0 md:top-0">
                <svg width="525" height="235" viewBox="0 0 525 235" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect width="509.538" height="279.574" rx="24" transform="matrix(0.952853 -0.303432 0.342012 0.939696 0 -27.7144)" fill="#00949B"/>
                    <rect width="323.482" height="264.108" rx="24" transform="matrix(0.952853 -0.303432 0.342012 0.939696 184.919 -21.4452)" fill="#00A0A8"/>
                </svg>
            </div>
            <div id="puddleLeft" class="absolute bottom -bottom-10 -left-32 md:left-0 md:bottom-0">
                <svg width="536" height="220" viewBox="0 0 536 220" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect width="546.291" height="271.807" rx="24" transform="matrix(-0.962657 0.270724 -0.381039 -0.924559 536 251.302)" fill="#00949B"/>
                    <rect width="346.814" height="256.771" rx="24" transform="matrix(-0.962657 0.270724 -0.381039 -0.924559 335.703 245.305)" fill="#00A0A8"/>
                </svg>
            </div>
            <div class="text-white text-center relative z-10 md:w-2/5 md:mx-auto">
                <h2 class="text-3xl font-red-hat font-bold mb-4">Lorem ipsum</h2>
                <p class="mb-8">
                    Lorem ipsum dolor ipsumeto la quuenata loca que ota boy ?
                    commen toutou pelle ? random text...
                </p>
                <Link :wide="true" color="white-blue">
                    Start now !
                </Link>
            </div>
        </section>
        <section class="py-16 relative flex flex-col-reverse items-center">
            <div class="lg:px-32 xl:px-64 lg:mx-auto -mt-24 md:mt-0 relative z-10 md:z-0 container">
                <img id="teams-image" class="relative z-10" src="/images/teams_illustration.png" alt="">
                <div id="bubble4" data-to="100" class="z-0 absolute w-4 sm:w-12 h-4 sm:h-12 bg-naoka-purple -top-4 sm:-top-8 sm:left-56 rounded-full"></div>
                <div id="bubble5" data-to="200" class="z-0 absolute w-8 sm:w-12 h-8 sm:h-12 bg-naoka-purple top-16 right-4 sm:top-28 sm:right-24 rounded-full"></div>
                <div id="bubble6" data-to="250" class="z-0 absolute w-8 sm:w-20 h-8 sm:h-20 bg-naoka-blue top-24 sm:left-24 sm:top-64 rounded-full"></div>
                <div id="bubble7" data-to="100" class="z-0 absolute w-12 sm:w-28 h-12 sm:h-28 bg-naoka-yellow bottom-2 sm:right-56 sm:bottom-56 rounded-full"></div>
                <div id="bubble8" data-to="50" class="z-0 absolute w-12 sm:w-28 h-12 sm:h-28 bg-naoka-yellow right-8 bottom-8 sm:left-56 sm:bottom-16 rounded-full"></div>
            </div>
            <div class="md:absolute bottom-8 overflow-hidden py-8 sm:pt-0 container">
                <div id="section" class="px-8 pt-8 shadow-base rounded-xl pb-28 md:pb-8 text-center md:w-2/5 md:mx-auto bg-white">
                    <h2 class="font-semibold mb-8 ">Lorem ipsum dolor ipsumeto</h2>
                    <div class="text-left mb-8">
                        <p class="mb-4">
                            Lorem ipsum dolor ipsumeto la quuenata loca que ota boy ? commen toutou pelle ? random text...
                        </p>
                        <p>
                            Lorem ipsum dolor ipsumeto la quuenata loca que ota boy ? commen toutou pelle ? random text... Poco uno pocito de lespanola
                            de qunatidado de langaga
                        </p>
                    </div>

                    <Link :wide="true" color="yellow">
                        Create your team
                    </Link>
                </div>
            </div>

        </section>
    </main>
    <Footer/>

</template>

<script>
import {defineComponent} from 'vue'
import { isMobile } from 'detect-touch-device';
import { Head } from '@inertiajs/inertia-vue3';
import {gsap} from "gsap";
import Navbar from "@/Components/Navigation/Navbar";
import { ScrollTrigger } from 'gsap/ScrollTrigger';
import NavLink from "@/Components/Navigation/NavLink";
import NavButton from "@/Components/Navigation/NavButton";
import Link from "@/Components/Ui/Link";
import Footer from "@/Components/Navigation/Footer";

gsap.registerPlugin(ScrollTrigger);

export default defineComponent({
    components: {
        NavLink,
        NavButton,
        Head,
        Link,
        Navbar,
        Footer
    },
    props: {
        canLogin: Boolean,
        canRegister: Boolean,
        laravelVersion: String,
        phpVersion: String,
    },
    mounted: function() {
        this.scrollAnimation();
        if(!isMobile){
            this.bubbleAnimation();
            //new this.SmoothScroll(document,40,20)
        }
    },
    methods: {
        bubbleAnimation() {
            gsap.from('[data-to]',
                {
                    scrollTrigger : {
                        trigger:'#teams-image',
                        start:'top center',
                        end:'bottom center',
                        scrub: 0,
                    },
                    scale:0.8,
                    y: (i, el) => (parseFloat(el.getAttribute("data-to"))),
                }
            )
            gsap.to('#bubble1', {
                scrollTrigger : {
                    end:"700",
                    scrub: 0,
                },
                y: 150,
                scale: 0.9
            })

            gsap.to('#bubble2', {
                scrollTrigger : {
                    scrub: 0,
                    end:"300",
                },
                y: 150,
                scale: 0.9
            })
            gsap.to('#bubble3', {
                scrollTrigger : {
                    scrub: 0,
                    end:"400",
                },
                y: -50,
                scale: 0.8
            })
        },
        scrollAnimation() {
            gsap.fromTo('#teams-image',
                {
                    y:-200,
                    opacity:0,
                },
                {
                    scrollTrigger : {
                        trigger:'#teams-image',
                        end:'center center',
                        scrub: 0,
                    },
                    y:0,
                    opacity:1
                }
            )

            gsap.fromTo('#puddleLeft',
                {
                    x:-300,
                },
                {
                    scrollTrigger : {
                        trigger:'#puddle',
                        end:'center center',
                        scrub: 0
                    },
                    x:0,
                }
            )

            gsap.fromTo('#puddleRight',
                {
                    x:300,
                },
                {
                    scrollTrigger : {
                        trigger:'#puddle',
                        end:'center center',
                        scrub: 0
                    },
                    x:0,
                }
            )

            gsap.fromTo('#section',
                {
                    scale : 0.9,
                    skewX:10,
                    opacity:0,
                    x:150,
                },
                {
                    scrollTrigger : {
                        trigger:'#section',
                        end:'bottom bottom',
                        scrub: 0,
                    },
                    skewX:0,
                    scale: 1,
                    opacity: 1,
                    x:0,
                    y:0
                }
            )
        },
        SmoothScroll(target, speed, smooth) {
                if (target === document)
                    target = (document.scrollingElement
                        || document.documentElement
                        || document.body.parentNode
                        || document.body) // cross browser support for document scrolling

                var moving = false
                var pos = target.scrollTop
                var frame = target === document.body
                && document.documentElement
                    ? document.documentElement
                    : target // safari is the new IE

                target.addEventListener('mousewheel', scrolled, { passive: false })
                target.addEventListener('DOMMouseScroll', scrolled, { passive: false })

                function scrolled(e) {
                    e.preventDefault(); // disable default scrolling

                    var delta = normalizeWheelDelta(e)

                    pos += -delta * speed
                    pos = Math.max(0, Math.min(pos, target.scrollHeight - frame.clientHeight)) // limit scrolling

                    if (!moving) update()
                }

                function normalizeWheelDelta(e){
                    if(e.detail){
                        if(e.wheelDelta)
                            return e.wheelDelta/e.detail/40 * (e.detail>0 ? 1 : -1) // Opera
                        else
                            return -e.detail/3 // Firefox
                    }else
                        return e.wheelDelta/120 // IE,Safari,Chrome
                }

                function update() {
                    moving = true

                    var delta = (pos - target.scrollTop) / smooth

                    target.scrollTop += delta

                    if (Math.abs(delta) > 0.5)
                        requestFrame(update)
                    else
                        moving = false
                }

                var requestFrame = function() { // requestAnimationFrame cross browser
                    return (
                        window.requestAnimationFrame ||
                        window.webkitRequestAnimationFrame ||
                        window.mozRequestAnimationFrame ||
                        window.oRequestAnimationFrame ||
                        window.msRequestAnimationFrame ||
                        function(func) {
                            window.setTimeout(func, 1000 / 50);
                        }
                    );
                }()
            }
    }
})
</script>
