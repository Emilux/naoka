<template>
    <input type="checkbox" :value="value" v-model="proxyChecked"
        class="relative w-6 h-6 rounded border-2 border-purple shadow-sm focus:border-purple focus:ring focus:ring-purple">
</template>

<script>
import { defineComponent } from 'vue'

export default defineComponent({
    emits: ['update:checked'],

    props: {
        checked: {
            type: [Array, Boolean],
            default: false,
        },
        value: {
            default: null,
        },
    },

    computed: {
        proxyChecked: {
            get() {
                return this.checked;
            },

            set(val) {
                this.$emit("update:checked", val);
            },
        },
    },
})
</script>
