<template>
    <div class="">

        <div class="mt-5 md:mt-0">
            <div class="px-4 py-5 sm:p-6 bg-white sm:rounded-lg">
                <slot name="content"></slot>
            </div>
        </div>
    </div>
</template>

<script>
    import { defineComponent } from 'vue'

    export default defineComponent({
        components: {
        }
    })
</script>
