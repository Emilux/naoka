<template>
  <Head title="Log in" />
  <jet-authentication-card>

    <AuthTitle title="Sign In" description="Lorem ipsum dolor ipsumeto la Qunatasse la tu connais"/>

    <jet-validation-errors class="mb-4" />

    <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
      {{ status }}
    </div>

    <form @submit.prevent="submit" class="sm:px-12">
      <div class="relative">
        <jet-input
          id="email"
          type="email"
          class="mt-1 block w-full pl-14"
          v-model="form.email"
          placeholder="Email"
          required
          autofocus
        />
        <SpanInput>
            <i class="naoka-icon SolidMail"></i>
        </SpanInput>
      </div>

      <div class="relative mt-8">
        <jet-input
          id="password"
          type="password"
          class="mt-1 block w-full pl-14"
          v-model="form.password"
          placeholder="Password"
          required
          autocomplete="current-password"
        />
        <SpanInput>
            <i class="naoka-icon SolidKey"></i>
        </SpanInput>
      </div>
        <div class="mt-3">
            <Link
                v-if="canResetPassword"
                :href="route('password.request')"
                class="flex flex-row-reverse text-sm underline text-purple"
            >
                Forgot your password?
            </Link>
        </div>



      <div class="block mt-3">
        <label class="flex items-center">
          <jet-checkbox name="remember" v-model:checked="form.remember" />
          <span class="ml-2 text-purple text-lg">Remember me</span>
        </label>
      </div>

      <div class="flex items-center justify-end mt-8">

        <jet-button
          class="justify-center w-full"
          :class="{ 'opacity-25': form.processing }"
          :disabled="form.processing"
        >
          Sign in
        </jet-button>
      </div>
    </form>

    <div class="mt-6 flex justify-center text-sm text-purple ">Don't have an account ?&nbsp;
      <Link
        :href="route('register')"
        class="underline font-medium"
      >
        Register
      </Link>
    </div>
  </jet-authentication-card>

</template>

<script>
import { defineComponent } from "vue";
import JetAuthenticationCard from "@/Jetstream/AuthenticationCard.vue";
import JetButton from "@/Jetstream/Button.vue";
import JetInput from "@/Jetstream/Input.vue";
import JetCheckbox from "@/Jetstream/Checkbox.vue";
import SpanInput from "@/Jetstream/SpanInput.vue";
import JetValidationErrors from "@/Jetstream/ValidationErrors.vue";
import AuthTitle from "@/Jetstream/AuthTitle.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";

export default defineComponent({
  components: {
    Head,
    JetAuthenticationCard,
    JetButton,
    JetInput,
    JetCheckbox,
    SpanInput,
    JetValidationErrors,
    AuthTitle,
    Link,
  },

  props: {
    canResetPassword: Boolean,
    status: String,
  },

  data() {
    return {
      form: this.$inertia.form({
        email: "",
        password: "",
        remember: false,
      }),
    };
  },

    beforeMount() {
        document.getElementById('captchaStyle').innerHTML="";
    },

    beforeUnmount() {
        document.getElementById('captchaStyle').innerHTML=".grecaptcha-badge { visibility: hidden !important; }";
    },

  methods: {
    submit() {
        const submitForm = (token) => {
            this.form.recaptcha_token = token;
            this.form
                .transform((data) => ({
                    ...data,
                    recaptcha_token:token,
                    remember: this.form.remember ? "on" : "",
                }))
                .post(this.route("login"), {
                    onFinish: () => this.form.reset("password"),
                });
        }

        grecaptcha.ready(function() {
            grecaptcha
                .execute(process.env.MIX_CAPTCHA_SITE_KEY, { action: "submit" })
                .then(function (token) {
                    submitForm(token);
                });
        })


    },
  },
});
</script>
