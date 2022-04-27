<template>
    <div class="flex flex-col items-center text-purple mt-5 mb-14 text-center">
        <h1 class="font-serif font-bold text-4xl sm:text-6xl mb-4">{{ title }}</h1>
        <p v-if="description != null">
            {{ description }}
        </p>
    </div>
</template>

<script>
import { defineComponent } from 'vue'

export default defineComponent({
    props: {
        title: String,
        description: String,
    },
})
</script>

<style scoped>

</style>
