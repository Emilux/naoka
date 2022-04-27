<template>
    <section class="container mx-auto md:flex md:items-center relative mb-28">
        <div class="text-center md:text-left px-8 mb-32 md:mb-0 md:pr-16">
            <span class="font-semibold text-xs bg-naoka-yellow py-1 px-2.5 mb-4 inline-block">
                <slot name="subtitle">Lorem Ipsum dolor ipsumeto</slot>
            </span>
            <h1 class="text-3xl lg:text-6xl font-red-hat font-bold mb-4"><slot name="title">Lorem Ipsum dolor ipsumeto</slot></h1>
            <p class="text-black lg:text-lg mb-8">
                <slot name="content">
                    Lorem ipsum dolor ipsumeto la quuenata loca que ota boy ?
                    commen toutou pelle ? random text...
                </slot>
            </p>

            <template v-if="showLink">
                <Button :color="linkColor" :href="linkHref">
                    <slot name="link">
                        Lorem ipsum
                    </slot>
                </Button>
            </template>

        </div>
        <div class="md:pl-16 relative some-section">
            <img class="z-10 relative" :src="imgSrc" alt="">
            <div id="bubble1" class="z-0 absolute w-8 sm:w-12 h-8 sm:h-12 bg-naoka-purple -top-16 left-36 rounded-full"></div>
            <div id="bubble2" class="z-0 absolute w-10 sm:w-16 h-10 sm:h-16 bg-naoka-blue top-0 -right-4 rounded-full"></div>
            <div id="bubble3" class="z-0 absolute w-16 sm:w-28 h-16 sm:h-28 bg-naoka-yellow left-8 -bottom-8 rounded-full"></div>
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
