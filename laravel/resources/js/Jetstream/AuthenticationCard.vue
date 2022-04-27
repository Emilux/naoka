<template>
  <Navbar :logoOnly="true"/>
  <div class="m-0 flex flex-col min-h-screen">

    <JetAuthPuddle />

    <div class="flex-1 flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
      <div class="w-full sm:max-w-lg mt-6 px-6 py-4 overflow-hidden sm:rounded-lg">
        <slot />
      </div>
    </div>
    <Footer/>
  </div>
</template>


<script>
import { defineComponent } from "vue";
import JetAuthenticationCardLogo from "@/Jetstream/AuthenticationCardLogo.vue";
import JetAuthPuddle from "@/Jetstream/AuthPuddle.vue";
import Footer from "@/components/Navigation/Footer";
import Navbar from "@/components/Navigation/Navbar";

export default defineComponent({
    components: {
        JetAuthenticationCardLogo,
        JetAuthPuddle,
        Footer,
        Navbar
    },
});
</script>
