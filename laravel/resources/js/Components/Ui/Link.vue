<template>
    <Link :href="href" v-bind:class="[{'px-8 sm:px-16':wide},buttonColor(color)]" class="items-center transition-colors inline-flex py-3 px-4 rounded-xl text-xs sm:text-base font-raleway font-semibold">
        <slot/>
    </Link>
</template>

<script>
import {defineComponent} from "vue";
import { Link } from '@inertiajs/inertia-vue3';

export default defineComponent({
    components: {
        Link,
    },
    props: {
        href: String,
        color: String,
        wide: Boolean
    },
    methods : {
        buttonColor: (color) => {
            switch (color) {
                case 'blue':
                    return 'hover:bg-naoka-blue-hover bg-naoka-blue text-white'
                case 'purple':
                    return 'hover:bg-naoka-purple-hover bg-naoka-purple text-white'
                case 'yellow':
                    return 'hover:bg-naoka-yellow-hover bg-naoka-yellow text-naoka-purple'
                case 'white-blue':
                    return 'hover:bg-white-hover bg-white text-naoka-blue'
                case 'white-yellow':
                    return 'hover:bg-white-hover bg-white text-naoka-yellow'
                case 'white-purple':
                    return 'hover:bg-white-hover bg-white text-naoka-purple'
                default:
                    return 'text-naoka-purple'
            }
        }
    },
})
</script>

