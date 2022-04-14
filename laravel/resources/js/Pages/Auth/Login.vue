<template>
  <Head title="Log in" />

  <jet-authentication-card>

    <AuthTitle title="Sign In" description="Lorem ipsum dolor ipsumeto la Qunatasse la tu connais"/>

    <jet-validation-errors class="mb-4" />

    <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
      {{ status }}
    </div>

    <form @submit.prevent="submit">
      <div class="relative">
        <jet-input
          id="email"
          type="email"
          class="mt-1 block w-full pl-13"
          v-model="form.email"
          placeholder="Email"
          required
          autofocus
        />
        <SpanInput>
          <path class="fill-purple" fill-rule="evenodd" clip-rule="evenodd" d="M25 0H3L13.0412 5.4854C13.6387 5.81183 14.3613 5.81183 14.9588 5.4854L25 0ZM0 0V14.3333C0 15.4379 0.895431 16.3333 2 16.3333H26C27.1046 16.3333 28 15.4379 28 14.3333V0L15.0077 7.57882C14.385 7.94207 13.615 7.94207 12.9923 7.57882L0 0Z" fill="black"/>
        </SpanInput>
      </div>

      <div class="relative mt-4">
        <jet-input
          id="password"
          type="password"
          class="mt-1 block w-full pl-13"
          v-model="form.password"
          placeholder="Password"
          required
          autocomplete="current-password"
        />
        <SpanInput>
          <path class="fill-purple" fill-rule="evenodd" clip-rule="evenodd" d="M10.3813 13.2091C7.72825 14.6452 4.34328 14.2421 2.10103 11.9999C-0.632637 9.26621 -0.632637 4.83405 2.10103 2.10038C4.8347 -0.633288 9.26686 -0.633288 12.0005 2.10038C14.2428 4.34263 14.6459 7.7276 13.2098 10.3807L21.9 19.0709L21.9 21.8994L19.0716 21.8994L18.3645 21.1923L18.3645 19.5709C18.3645 19.2948 18.1406 19.0709 17.8645 19.0709L17.0513 19.0709L17.2095 17.9631C17.2567 17.6332 16.9738 17.3503 16.6439 17.3975L14.829 17.6567L13.4147 16.2425L13.8056 15.0699C13.9359 14.679 13.564 14.3071 13.1732 14.4374L12.0005 14.8283L10.3813 13.2091ZM3.51525 6.34302C4.2963 7.12407 5.56263 7.12407 6.34367 6.34302C7.12472 5.56197 7.12472 4.29564 6.34367 3.5146C5.56263 2.73355 4.2963 2.73355 3.51525 3.5146C2.7342 4.29564 2.7342 5.56197 3.51525 6.34302Z" fill="black"/>
        </SpanInput>
        <Link
          v-if="canResetPassword"
          :href="route('password.request')"
          class="flex flex-row-reverse text-sm underline text-purple mt-3"
        >
          Forgot your password?
        </Link>
      </div>

      <div class="block mt-4">
        <label class="flex items-center">
          <jet-checkbox name="remember" v-model:checked="form.remember" />
          <span class="ml-2 text-sm text-purple">Remember me</span>
        </label>
      </div>

      <div class="flex items-center justify-end mt-4">

        <jet-button
          class="justify-center w-full"
          :class="{ 'opacity-25': form.processing }"
          :disabled="form.processing"
        >
          Sign in
        </jet-button>
      </div>
    </form>

    <div class="mt-4 flex justify-center text-sm text-purple ">Don't have an account ? 
      <Link
        :href="route('register')"
        class="underline font-medium"
      >
        Register
      </Link>
    </div>
  </jet-authentication-card>

  <AuthFooter/>

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
import AuthFooter from "@/Jetstream/AuthFooter.vue";
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
    AuthFooter,
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

  methods: {
    submit() {
      this.form
        .transform((data) => ({
          ...data,
          remember: this.form.remember ? "on" : "",
        }))
        .post(this.route("login"), {
          onFinish: () => this.form.reset("password"),
        });
    },
  },
});
</script>
