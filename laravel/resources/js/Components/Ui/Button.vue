<template>
    <template v-if="href">
        <template v-if="href.indexOf('#') === 0 || target">
            <a :href="href" :title="title" :target="target" v-bind:class="[{'px-8 sm:px-16':wide},contentColor(color),hoverColor(color)]" class="items-center transition-colors inline-flex py-3 px-4 rounded-xl text-xs sm:text-base font-raleway font-semibold">
                <slot/>
            </a>
        </template>
        <template v-else>
            <Link :title="title" :href="href" v-bind:class="[{'px-8 sm:px-16':wide},contentColor(color),hoverColor(color)]" class="items-center transition-colors inline-flex py-3 px-4 rounded-xl text-xs sm:text-base font-raleway font-semibold">
                <slot/>
            </Link>
        </template>
    </template>
    <template v-else>
        <button @click="onclick" :type="type" v-bind:class="[{'px-8 sm:px-16':wide},contentColor(color),hoverColor(color)]" class="items-center transition-colors inline-flex py-3 px-4 rounded-xl text-xs sm:text-base font-raleway font-semibold">
            <slot/>
        </button>
    </template>
</template>


<script>
import {defineComponent} from "vue";
import {contentColor, hoverColor} from "@/Utils/colors";
import { Link } from '@inertiajs/inertia-vue3';

export default defineComponent({
    components: {
        Link,
    },
    props: {
        href: String,
        color: String,
        wide: Boolean,
        onclick: Function,
        type: String,
        target: String,
        title: String
    },
    methods : {
        contentColor,
        hoverColor
    },
})
</script>

