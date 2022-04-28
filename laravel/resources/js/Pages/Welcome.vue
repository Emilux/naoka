<template>


    <Head title="Home" />
    <Navbar>
        <template v-if="canLogin && !$page.props.user">
            <NavLink class="mx-8 hidden sm:block" :href="route('register')" >Register</NavLink>
            <NavButton :href="route('login')">Sign In</NavButton>
        </template>
    </Navbar>
    <main class="mt-44 md:mt-56 mb-6">
        <Hero linkColor="blue" linkHref="#puddle" :showLink="canLogin">
            <template v-slot:subtitle>
                Welcome to Naoka
            </template>
            <template v-slot:title>
                Work with kanban board
            </template>
            <template v-slot:content>
                Use naoka to create simple kanban boards.
            </template>
            <template v-slot:link>
                Learn more
                <i class="naoka-icon SolidChevronRight ml-2"></i>
            </template>
        </Hero>
        <Banner :linkHref="route('register')">
            <template v-slot:title>
                You need a kanban solution for your project ?
            </template>
            <template v-slot:content>
                <span class="mb-4 block">Naoka let you create simple kanban boards for your projects.</span>
            </template>
        </Banner>
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
                    <h2 class="font-semibold mb-8 ">Team system</h2>
                    <div class="text-left mb-8">
                        <p class="mb-4">
                            With naoka you can create multiple differents teams and invite new member, that will have access to the boards you created inside the team.
                        </p>
                    </div>

                    <Button :href="route('register')" :wide="true" color="yellow">
                        Create your team
                    </Button>
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
import Button from "@/Components/Ui/Button";
import Footer from "@/Components/Navigation/Footer";
import Hero from "@/Components/Home/Hero";
import Banner from "@/Components/Home/Banner";

gsap.registerPlugin(ScrollTrigger);

export default defineComponent({
    components: {
        NavLink,
        NavButton,
        Head,
        Button,
        Navbar,
        Footer,
        Hero,
        Banner
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
        message(){
            console.log('zaezaezaeaz')
        },
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
