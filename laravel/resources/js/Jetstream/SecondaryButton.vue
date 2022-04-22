<template>
    <button :type="type" class="inline-flex items-center px-4 py-2 bg-white border border-purple rounded-md font-semibold text-xs text-purple uppercase tracking-widest shadow-sm disabled:opacity-25 transition">
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
