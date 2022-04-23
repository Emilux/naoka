<template>
    <footer class="p-8">
        <div class="flex justify-center">
            <slot/>
            <NavLink class="mx-2.5" :href="route('terms.show')">Terms & Conditions</NavLink>
            <NavLink class="mx-2.5" :href="route('policy.show')">Privacy Policies</NavLink>
        </div>
    </footer>
</template>

<script>
import {defineComponent} from "vue";
import NavLink from "@/Components/Navigation/NavLink";

export default defineComponent({
    components: {
        NavLink,
    },
})
</script>

<style scoped>

</style>
