<template>
    <jet-form-section @submitted="updatePassword">
        <template #form>
            <div class="sm:w-3/6 w-100">
                <div class="relative">
                    <jet-input id="current_password" type="password" class="mt-1 block w-full pl-14" v-model="form.current_password" ref="current_password" autocomplete="current-password" placeholder="Current password" />
                    <SpanInput>
                        <i class="naoka-icon SolidKey"></i>
                    </SpanInput>
                    <jet-input-error :message="form.errors.current_password" class="mt-2" />
                </div>

                <div class="relative">
                    <jet-input id="password" type="password" class="mt-1 block w-full pl-14" v-model="form.password" ref="password" autocomplete="new-password" placeholder="New password" />
                    <SpanInput>
                        <i class="naoka-icon SolidKey"></i>
                    </SpanInput>
                    <jet-input-error :message="form.errors.password" class="mt-2" />
                </div>
            </div>

        </template>

        <template #actions>
            <jet-button class="mt-3 sm:mt-0" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                Save
            </jet-button>
        </template>

        <template #error>
                <jet-action-message :on="form.recentlySuccessful" class="mr-3">
                    Saved.
                </jet-action-message>
            </template>

            
    </jet-form-section>
</template>

<script>
    import { defineComponent } from 'vue'
    import JetActionMessage from '@/Jetstream/ActionMessage.vue'
    import JetButton from '@/Jetstream/Button.vue'
    import JetFormSection from '@/Jetstream/FormSection.vue'
    import JetInput from '@/Jetstream/Input.vue'
    import JetInputError from '@/Jetstream/InputError.vue'
    import JetLabel from '@/Jetstream/Label.vue'
    import SpanInput from '@/Jetstream/SpanInput.vue'

    export default defineComponent({
        components: {
            JetActionMessage,
            JetButton,
            JetFormSection,
            JetInput,
            JetInputError,
            JetLabel,
            SpanInput,
        },

        data() {
            return {
                form: this.$inertia.form({
                    current_password: '',
                    password: '',
                }),
            }
        },

        methods: {
            updatePassword() {
                this.form.put(route('user-password.update'), {
                    errorBag: 'updatePassword',
                    preserveScroll: true,
                    onSuccess: () => this.form.reset(),
                    onError: () => {
                        if (this.form.errors.password) {
                            this.form.reset('password')
                            this.$refs.password.focus()
                        }

                        if (this.form.errors.current_password) {
                            this.form.reset('current_password')
                            this.$refs.current_password.focus()
                        }
                    }
                })
            },
        },
    })
</script>
