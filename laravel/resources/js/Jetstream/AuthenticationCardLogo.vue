<template>
  <Link :href="'/'" class="group">
      <div class="w-36 sm:w-40">
          <img src="" alt="">
      </div>
  </Link>
</template>

<script>
import { defineComponent } from "vue";
import { Link } from "@inertiajs/inertia-vue3";

export default defineComponent({
  components: {
    Link,
  },
});
</script>
