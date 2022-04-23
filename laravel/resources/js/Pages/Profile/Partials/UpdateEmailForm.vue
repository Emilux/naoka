<template>
    <jet-form-section @submitted="updateProfileInformation">
        <template #form>

            <div class="sm:w-3/6 w-100">
                <div class="relative">
                    <jet-input id="email" type="email" class="mt-1 block w-full pl-14" v-model="form.email" placeholder="Email"/>
                    <SpanInput>
                        <i class="naoka-icon SolidMail"></i>
                    </SpanInput>
                    <jet-input-error :message="form.errors.email" class="mt-2" />
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
    import SpanInput from '@/Jetstream/SpanInput.vue'

    export default defineComponent({
        components: {
            JetActionMessage,
            JetButton,
            JetFormSection,
            JetInput,
            JetInputError,
            SpanInput,
        },

        props: ['user'],

        data() {
            return {
                form: this.$inertia.form({
                    _method: 'PUT',
                    name: this.user.name,
                    email: this.user.email,
                    photo: null,
                }),

                photoPreview: null,
            }
        },

        methods: {
            updateProfileInformation() {
                if (this.$refs.photo) {
                    this.form.photo = this.$refs.photo.files[0]
                }

                this.form.post(route('user-profile-information.update'), {
                    errorBag: 'updateProfileInformation',
                    preserveScroll: true,
                    onSuccess: () => (this.clearPhotoFileInput()),
                });
            },

            clearPhotoFileInput() {
                if (this.$refs.photo?.value) {
                    this.$refs.photo.value = null;
                }
            },

        },
    })
</script>
