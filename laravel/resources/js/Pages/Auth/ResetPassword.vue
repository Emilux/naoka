<template>
    <Head title="Reset Password" />

    <jet-authentication-card>

        <AuthTitle title="Reset Password"/>

        <jet-validation-errors class="mb-4" />

        <form @submit.prevent="submit">
            <div class="relative">
                <jet-input placeholder="Email" id="email" type="email" class="mt-1 block w-full pl-13" v-model="form.email" required autofocus />
                <SpanInput>
                    <i class="naoka-icon SolidMail"></i>
                </SpanInput>
            </div>

            <div class="mt-4 relative">
                <jet-input placeholder="Password" id="password" type="password" class="mt-1 block w-full pl-13" v-model="form.password" required autocomplete="new-password" />
                <SpanInput>
                    <i class="naoka-icon SolidKey"></i>
                </SpanInput>
            </div>

            <div class="flex items-center justify-end mt-4">
                <jet-button class="justify-center w-full" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Reset Password
                </jet-button>
            </div>
        </form>
    </jet-authentication-card>
</template>

<script>
    import { defineComponent } from 'vue';
    import { Head } from '@inertiajs/inertia-vue3';
    import JetAuthenticationCard from '@/Jetstream/AuthenticationCard.vue'
    import JetAuthenticationCardLogo from '@/Jetstream/AuthenticationCardLogo.vue'
    import JetButton from '@/Jetstream/Button.vue'
    import JetInput from '@/Jetstream/Input.vue'
    import JetLabel from '@/Jetstream/Label.vue'
    import JetValidationErrors from '@/Jetstream/ValidationErrors.vue'
    import SpanInput from "@/Jetstream/SpanInput.vue";
    import AuthTitle from "@/Jetstream/AuthTitle.vue";
    import AuthFooter from "@/Jetstream/AuthFooter.vue";

    export default defineComponent({
        components: {
            Head,
            JetAuthenticationCard,
            JetAuthenticationCardLogo,
            JetButton,
            JetInput,
            JetLabel,
            JetValidationErrors,
            SpanInput,
            AuthTitle,
            AuthFooter,
        },

        props: {
            email: String,
            token: String,
        },

        data() {
            return {
                form: this.$inertia.form({
                    token: this.token,
                    email: this.email,
                    password: '',
                })
            }
        },

        methods: {
            submit() {
                this.form.post(this.route('password.update'), {
                    onFinish: () => this.form.reset('password'),
                })
            }
        }
    })
</script>
