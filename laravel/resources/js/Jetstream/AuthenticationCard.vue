<template>

  <JetAuthPuddle />

    <nav class="flex items-center justify-between my-6 sm:my-10 mx-5 sm:mx-12">
        <jet-authentication-card-logo />
    </nav>


  <div class="flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
    <div class="w-full sm:max-w-lg mt-6 px-6 py-4 overflow-hidden sm:rounded-lg">
      <slot />
    </div>
  </div>
    <AuthFooter/>
</template>


<script>
import { defineComponent } from "vue";
import JetAuthenticationCardLogo from "@/Jetstream/AuthenticationCardLogo.vue";
import JetAuthPuddle from "@/Jetstream/AuthPuddle.vue";
import AuthFooter from "./AuthFooter";

export default defineComponent({
    components: {
        JetAuthenticationCardLogo,
        JetAuthPuddle,
        AuthFooter,
    },
});
</script>
