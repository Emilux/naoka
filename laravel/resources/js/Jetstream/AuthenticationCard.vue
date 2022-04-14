<template>

  <JetAuthPuddle />

  <div class="py-12 px-12">
    <jet-authentication-card-logo />
  </div>

  <div class="flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
    <div class="w-full sm:max-w-md mt-6 px-6 py-4 overflow-hidden sm:rounded-lg">
      <slot />
    </div>
  </div>
</template>


<script>
import { defineComponent } from "vue";
import JetAuthenticationCardLogo from "@/Jetstream/AuthenticationCardLogo.vue";
import JetAuthPuddle from "@/Jetstream/AuthPuddle.vue";

export default defineComponent({
    components: {
        JetAuthenticationCardLogo,
        JetAuthPuddle,
    },
});
</script>
