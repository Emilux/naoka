<template>
    <div class="px-4 py-5 bg-white sm:p-6 sm:rounded-tl-md sm:rounded-tr-md flex sm:flex-row flex-col sm:items-center">
        <!-- Profile Photo -->
        <div class=" mr-12" v-if="$page.props.jetstream.managesProfilePhotos">

            <!-- Current Profile Photo -->
            <div class="relative w-fit">
                <div class="mt-2">
                    <img :src="user.profile_photo_url" :alt="user.name" class="rounded-full h-24 sm:h-32 w-24 sm:w-32 object-cover">
                </div>

                <div class="absolute top-0 right-0 z-10">
                    <button :type="type" @click="updateAvatar" class="flex items-center justify-center bg-blue text-gray font-semibold rounded-full border-2 border-white tracking-widest disabled:opacity-25 transition p-3 h-11 w-11">
                        <i class="naoka-icon SolidEdit text-3xl"></i>
                    </button>
                </div>
            </div>

        </div>

        <div>
            <!-- Name -->
            <p class="mb-1">{{ user.name }}</p>

            <!-- Email -->
            <p class="">{{ user.email }}</p>
        </div>


    </div>

    <jet-dialog-modal :show="updateAvatarUser" @close="closeModal">
        <template #title>
            Update your avatar
        </template>

        <template #content>
            <jet-form-section @submitted="updateProfileInformation">
                <template #form>

                    <!-- Profile Photo -->
                    <div class="flex items-center" v-if="$page.props.jetstream.managesProfilePhotos">

                        <input type="file" class="hidden" ref="photo" @change="updatePhotoPreview"/>

                        <!-- Current Profile Photo -->
                        <div class="mt-2 mr-8" v-show="! photoPreview">
                            <img :src="user.profile_photo_url" :alt="user.name" class="rounded-full h-20 w-20 object-cover">
                        </div>

                        <!-- New Profile Photo Preview -->
                        <div class="mt-2 mr-8" v-show="photoPreview">
                            <span class="block rounded-full w-20 h-20 bg-cover bg-no-repeat bg-center"
                                :style="'background-image: url(\'' + photoPreview + '\');'">
                            </span>
                        </div>

                        <div class="flex flex-col">
                            <jet-secondary-button class="mt-2 mr-2" type="button" @click.prevent="selectNewPhoto">
                                Select A New Photo
                            </jet-secondary-button>

                            <jet-secondary-button type="button" class="mt-2" @click.prevent="deletePhoto" v-if="user.profile_photo_path">
                                Remove Photo
                            </jet-secondary-button>
                        </div>

                    </div>

                    <jet-button :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                        Save
                    </jet-button>

                </template>

                <template #actions>
                    <jet-input-error :message="form.errors.photo" class="mt-2" />
                </template>
            </jet-form-section>
        </template>

        <template #footer>
            <jet-secondary-button @click="closeModal">
                Cancel
            </jet-secondary-button>
        </template>
    </jet-dialog-modal>

</template>

<script>
    import { defineComponent } from 'vue'
    import JetButton from '@/Jetstream/Button.vue'
    import JetFormSection from '@/Jetstream/FormSection.vue'
    import JetInput from '@/Jetstream/Input.vue'
    import JetInputError from '@/Jetstream/InputError.vue'
    import JetLabel from '@/Jetstream/Label.vue'
    import JetActionMessage from '@/Jetstream/ActionMessage.vue'
    import JetSecondaryButton from '@/Jetstream/SecondaryButton.vue'
    import SpanInput from '@/Jetstream/SpanInput.vue'
    import JetDialogModal from '@/Jetstream/DialogModal.vue'



    export default defineComponent({
        components: {
            JetActionMessage,
            JetButton,
            JetFormSection,
            JetInput,
            JetInputError,
            JetLabel,
            JetSecondaryButton,
            SpanInput,
            JetDialogModal,
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
                updateAvatarUser: false,
            }
        },

        methods: {
            updateAvatar() {
                this.updateAvatarUser = true;
            },
            
            closeModal() {
                this.updateAvatarUser = false
                this.form.reset()
            },

            updateProfileInformation() {
                if (this.$refs.photo) {
                    this.form.photo = this.$refs.photo.files[0]
                }

                this.form.post(route('user-profile-information.update'), {
                    errorBag: 'updateProfileInformation',
                    preserveScroll: true,
                    onSuccess: () => ([this.clearPhotoFileInput(), this.updateAvatarUser = false]),
                });
            },

            selectNewPhoto() {
                this.$refs.photo.click();
            },

            updatePhotoPreview() {
                const photo = this.$refs.photo.files[0];

                if (! photo) return;

                const reader = new FileReader();

                reader.onload = (e) => {
                    this.photoPreview = e.target.result;
                };

                reader.readAsDataURL(photo);
            },

            deletePhoto() {
                this.$inertia.delete(route('current-user-photo.destroy'), {
                    preserveScroll: true,
                    onSuccess: () => {
                        this.photoPreview = null;
                        this.clearPhotoFileInput();
                    },
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
