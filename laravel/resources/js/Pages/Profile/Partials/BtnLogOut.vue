<template>
    <jet-form-section @submitted="logout">
        <template #form>
        <div class="relative">
                <jet-button class="mt-3 sm:mt-0 pl-9 items-center " :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Log Out
                    <i class="absolute left-4 naoka-icon SolidLogOut "></i>
                </jet-button>
            </div>
        </template>
    </jet-form-section>
</template>

<script>
    import { defineComponent } from 'vue'
    import JetButton from '@/Jetstream/Button.vue'
    import JetFormSection from '@/Jetstream/FormSection.vue'

    export default defineComponent({
        components: {
            JetButton,
            JetFormSection,
        },

        data() {
            return {
                form: this.$inertia.form({
                    _method: 'POST',
                }),
            }
        },

        methods: {
            logout() {
                this.$inertia.post(route('logout'));
            },
        },
    })
</script>
