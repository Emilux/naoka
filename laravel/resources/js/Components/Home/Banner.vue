<template>
    <section id="puddle" :class="contentColor(color)" class="py-36 md:py-32 px-11 relative overflow-hidden sm:rounded-section container">
        <div id="puddleRight" class="absolute top -top-10 -right-32 md:right-0 md:top-0">
            <svg width="525" height="235" viewBox="0 0 525 235" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect width="509.538" height="279.574" rx="24" transform="matrix(0.952853 -0.303432 0.342012 0.939696 0 -27.7144)" :fill="puddlesColor(color).shadowed"/>
                <rect width="323.482" height="264.108" rx="24" transform="matrix(0.952853 -0.303432 0.342012 0.939696 184.919 -21.4452)" :fill="puddlesColor(color).normal"/>
            </svg>
        </div>
        <div id="puddleLeft" class="absolute bottom -bottom-10 -left-32 md:left-0 md:bottom-0">
            <svg width="536" height="220" viewBox="0 0 536 220" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect width="546.291" height="271.807" rx="24" transform="matrix(-0.962657 0.270724 -0.381039 -0.924559 536 251.302)" :fill="puddlesColor(color).shadowed"/>
                <rect width="346.814" height="256.771" rx="24" transform="matrix(-0.962657 0.270724 -0.381039 -0.924559 335.703 245.305)" :fill="puddlesColor(color).normal"/>
            </svg>
        </div>
        <div class="text-center relative z-10 md:w-2/5 md:mx-auto">
            <h2 class="text-3xl font-red-hat font-bold mb-4"><slot name="title">Lorem ipsum</slot></h2>
            <slot name="content">
                <p class="mb-8">
                    Lorem ipsum dolor ipsumeto la quuenata loca que ota boy ?
                    commen toutou pelle ? random text...
                </p>
            </slot>

            <template v-if="showLink">
                <Button :href="linkHref" :wide="true" :color="invertedColor(color)">
                    <slot name="link">Start now !</slot>
                </Button>
            </template>

        </div>
    </section>
</template>

<script>
import Button from "@/Components/Ui/Button";
import {puddlesColor,contentColor,invertedColor} from "@/Utils/colors";
import {defineComponent} from "vue";


export default defineComponent({
    components: {
        Button,
    },
    methods:{
        puddlesColor,
        contentColor,
        invertedColor
    },
    props:{
        showLink: {
            type:Boolean,
            default:true
        },
        color:{
            type:String,
            default:'blue'
        },
        linkHref:{
            type:String,
        }
    }
})
</script>

