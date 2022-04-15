<template>
    <footer class="absolute bottom-0 left-[50%] translate-x-[-50%] w-full sm:max-w-md mt-6 px-6 py-4 overflow-hidden sm:rounded-lg">
        <ul class="flex items-center justify-around text-purple text-lg">
            <li class="my-4"><a target="_blank" :href="route('terms.show')" class="">Terms & Conditions</a></li>
            <li><a target="_blank" :href="route('policy.show')" class="">Privacy Policy</a></li>
        </ul>
    </footer>
</template>

<script>
    import { defineComponent } from 'vue'

    export default defineComponent({
    })
</script>
