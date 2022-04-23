<template>
    <Link class="hover:bg-naoka-blue-hover transition-colors inline-block bg-naoka-blue text-white py-2 px-8 sm:px-16 rounded-xl text-xs sm:text-base font-raleway font-semibold" :href="href"><slot/></Link>
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

<style scoped>

</style>
