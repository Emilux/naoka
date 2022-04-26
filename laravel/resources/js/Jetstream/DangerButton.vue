<template>
    <button :type="type" class="flex bg-naoka-red text-white font-semibold rounded-xl disabled:opacity-25 transition p-3">
        <slot></slot>
    </button>
</template>

<script>
    import { defineComponent } from 'vue'

    export default defineComponent({
        props: {
            type: {
                type: String,
                default: 'button',
            },
        }
    })
</script>
