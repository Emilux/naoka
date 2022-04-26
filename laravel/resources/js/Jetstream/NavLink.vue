<template>
    <Link :href="href" :class="classes">
        <slot />
    </Link>
</template>

<script>
    import { defineComponent } from 'vue'
    import { Link } from '@inertiajs/inertia-vue3';

    export default defineComponent({
        components: {
            Link,
        },
        props: ['href', 'active'],

        computed: {
            classes() {
                return this.active
                    ? 'inline-flex items-center border-indigo-400 font-medium leading-5 text-gray-900 transition'
                    : 'inline-flex items-center border-transparent font-medium leading-5 text-gray-500 transition'
            }
        }
    })
</script>
