<template>
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

                <template v-if="showLink">
                    <Button :wide="true" color="yellow">
                        Create your team
                    </Button>
                </template>

            </div>
        </div>

    </section>
</template>

<script>
import Button from "@/Components/Ui/Button";
import {defineComponent} from "vue";

export default defineComponent({
    components: {
        Button,
    },
    props:{
        showLink: {
            type:Boolean,
            default:true
        },
        linkColor:{
            type:String,
            default:'blue'
        },
        linkHref:{
            type:String,
        },
        imgSrc: {
            type:String,
            default:'/images/kanban_illustration.png'
        }
    }
})
</script>

<style scoped>

</style>
