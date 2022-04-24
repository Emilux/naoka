<template>
    <div class="overflow-auto">
      <RecentKanbans/>

      <ListTeam/>
    
    </div>
</template>

<script>
    import { defineComponent } from 'vue'
    import JetAuthPuddle from "@/Dashbord/ListKanbans.vue";
    import RecentKanbans from "@/Dashbord/RecentKanbans.vue";
    import ListTeam from "@/Dashbord/ListTeam.vue";

    export default defineComponent({
        components: {
          ListTeam,
          RecentKanbans,
        },
    })
</script>
