<template>
    <div class="overflow-auto">
        <div>
            <ListKanbans/>
        </div>

        <div>
            <ListKanbans/>
        </div>
    </div>
</template>

<script>
    import { defineComponent } from 'vue'
    import ListKanbans from "@/Dashbord/ListKanbans.vue";

    export default defineComponent({
        components: {
            ListKanbans,
        },

        props: {
            
        },

        methods: {
            
        }
    })
</script>
