<template>
    <Head title="Register" />

    <jet-authentication-card>

        <AuthTitle title="Register" description="Lorem ipsum dolor ipsumeto la Qunatasse la tu connais"/>

        <jet-validation-errors class="mb-4" />

        <form @submit.prevent="submit" class="px-12">
            <div class="relative">
                <jet-input id="name" type="text" class="mt-1 block w-full pl-14" placeholder="Display Name" v-model="form.name" required autofocus autocomplete="name" />
                <SpanInput>
                    <i class="naoka-icon SolidUser"></i>
                </SpanInput>
            </div>

            <div class="mt-8 relative">
                <jet-input id="email" type="email" class="mt-1 block w-full pl-14" placeholder="Email" v-model="form.email" required />
                <SpanInput>
                    <i class="naoka-icon SolidMail"></i>
                </SpanInput>
            </div>

            <div class="mt-8 relative">
                <jet-input id="password" type="password" class="mt-1 block w-full pl-14" placeholder="Password" v-model="form.password" required autocomplete="new-password" />
                <SpanInput>
                    <i class="naoka-icon SolidKey"></i>
                </SpanInput>
            </div>

            <div class="mt-5" v-if="$page.props.jetstream.hasTermsAndPrivacyPolicyFeature">
                <jet-label for="terms">
                    <div class="flex items-center">
                        <jet-checkbox name="terms" id="terms" v-model:checked="form.terms" />

                        <label for="terms" class="ml-2 text-purple text-lg">
                            Accept our <a target="_blank" :href="route('terms.show')" class="underline text-gray-600 italic hover:text-gray-900">Terms & Conditions</a> And <a target="_blank" :href="route('policy.show')" class="underline italic text-gray-600 hover:text-gray-900">Privacy Policy</a>
                        </label>
                    </div>
                </jet-label>
            </div>

            <div class="flex items-center justify-end mt-5">

                <jet-button
                class="justify-center w-full"
                :class="{ 'opacity-25': form.processing }"
                :disabled="form.processing"
                >
                Register
                </jet-button>
            </div>

            <div class="mt-4 flex justify-center text-sm text-purple ">Already have an account ?
                <Link
                    :href="route('login')"
                    class="underline font-medium"
                >
                    Sign In
                </Link>
            </div>
        </form>

    </jet-authentication-card>

    <AuthFooter />

</template>

<script>
    import { defineComponent } from 'vue'
    import JetAuthenticationCard from '@/Jetstream/AuthenticationCard.vue'
    import JetAuthenticationCardLogo from '@/Jetstream/AuthenticationCardLogo.vue'
    import JetButton from '@/Jetstream/Button.vue'
    import JetInput from '@/Jetstream/Input.vue'
    import JetCheckbox from '@/Jetstream/Checkbox.vue'
    import JetLabel from '@/Jetstream/Label.vue'
    import JetValidationErrors from '@/Jetstream/ValidationErrors.vue'
    import SpanInput from "@/Jetstream/SpanInput.vue";
    import AuthTitle from "@/Jetstream/AuthTitle.vue";
    import AuthFooter from "@/Jetstream/AuthFooter.vue";
    import { Head, Link } from '@inertiajs/inertia-vue3';

    export default defineComponent({
        components: {
            Head,
            JetAuthenticationCard,
            JetAuthenticationCardLogo,
            JetButton,
            JetInput,
            JetCheckbox,
            JetLabel,
            JetValidationErrors,
            Link,
            SpanInput,
            AuthTitle,
            AuthFooter,
        },

        data() {
            return {
                form: this.$inertia.form({
                    name: '',
                    email: '',
                    password: '',
                    terms: false,
                })
            }
        },

        methods: {
            submit() {
                this.form.post(this.route('register'), {
                    onFinish: () => this.form.reset('password'),
                })
            }
        }
    })
</script>
