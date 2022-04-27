<template>
    <Head title="Forgot Password" />

    <jet-authentication-card>

        <Title title="Forgotten password"/>

        <div class="mb-4 text-sm text-purple">
            Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.
        </div>

        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
            {{ status }}
        </div>

        <jet-validation-errors class="mb-4" />

        <form @submit.prevent="submit">
            <div class="relative">
                <jet-input
                id="email" type="email" class="mt-1 block w-full pl-13" v-model="form.email" placeholder="Email" required autofocus/>
                <SpanInput>
                    <i class="naoka-icon SolidMail"></i>
                </SpanInput>
            </div>

            <div class="flex items-center justify-end mt-4">
                <jet-button class="justify-center w-full" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Email Password Reset Link
                </jet-button>
            </div>

            <div class="mt-4 flex justify-center text-sm text-purple">Have you changed your mind ?
                <Link
                    :href="route('login')"
                    class="underline font-medium"
                >
                    Back to login
                </Link>
            </div>
        </form>
    </jet-authentication-card>
</template>

<script>
    import { defineComponent } from 'vue'
    import { Head, Link } from '@inertiajs/inertia-vue3';
    import JetAuthenticationCard from '@/Jetstream/AuthenticationCard.vue'
    import JetAuthenticationCardLogo from '@/Jetstream/AuthenticationCardLogo.vue'
    import JetButton from '@/Jetstream/Button.vue'
    import JetInput from '@/Jetstream/Input.vue'
    import JetLabel from '@/Jetstream/Label.vue'
    import AuthFooter from '@/Jetstream/AuthFooter.vue'
    import SpanInput from '@/Jetstream/SpanInput.vue'
    import AuthTitle from '@/Jetstream/AuthTitle.vue'
    import JetValidationErrors from '@/Jetstream/ValidationErrors.vue'
    import Title from '@/components/Ui/Title.vue'

    export default defineComponent({
        components: {
            Head,
            JetAuthenticationCard,
            JetAuthenticationCardLogo,
            JetButton,
            JetInput,
            JetLabel,
            JetValidationErrors,
            AuthFooter,
            SpanInput,
            AuthTitle,
            Title,
            Link,
        },

        props: {
            status: String
        },

        data() {
            return {
                form: this.$inertia.form({
                    email: ''
                })
            }
        },

        methods: {
            submit() {
                this.form.post(this.route('password.email'))
            }
        }
    })
</script>
