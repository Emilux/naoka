<template>
    <Link class="text-naoka-purple text-sm sm:text-base font-raleway" :href="href"><slot/></Link>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3';
import {defineComponent} from "vue";

export default defineComponent({
    components: {
        Link,
    },
    props: {
        href: String,
    },
})
</script>
