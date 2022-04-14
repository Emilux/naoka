<template>
    <Head title="Forgot Password" />

    <jet-authentication-card>

        <AuthTitle title="Forgotten password"/>

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
                    <path class="fill-purple" fill-rule="evenodd" clip-rule="evenodd" d="M25 0H3L13.0412 5.4854C13.6387 5.81183 14.3613 5.81183 14.9588 5.4854L25 0ZM0 0V14.3333C0 15.4379 0.895431 16.3333 2 16.3333H26C27.1046 16.3333 28 15.4379 28 14.3333V0L15.0077 7.57882C14.385 7.94207 13.615 7.94207 12.9923 7.57882L0 0Z" fill="black"/>
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

    <AuthFooter/>

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
