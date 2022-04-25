<template>
    <section class="my-16 text-naoka-purple font-raleway">
        <div class="mt-12">
            <div class="container lg:w-[1056px]">
                <div class="mx-6">
                    <div class="flex justify-between items-center flex-wrap">
                        <div><h2 class="text-lg">Emilien's team</h2></div>
                        <button class="flex items-center hover:bg-naoka-blue-hover transition-colors bg-naoka-blue text-white py-2 px-3.5 rounded-xl text-xs sm:text-sm font-raleway font-semibold">
                            <i class="naoka-icon solidPlus mr-1"></i>
                            <span>Create kanban</span>
                        </button>
                    </div>

                    <div class="flex items-center justify-between mt-4 flex-wrap">
                        <div class="flex items-center">
                            <div class="bg-naoka-red -mr-4 w-8 h-8 rounded-full"></div>
                            <div class="bg-naoka-yellow -mr-4 w-8 h-8 rounded-full"></div>
                            <div class="bg-naoka-blue -mr-4 w-8 h-8 rounded-full"></div>
                            <button class="bg-naoka-purple text-white w-8 h-8 rounded-full flex justify-center items-center transition-colors hover:bg-naoka-purple-hover">
                                <i class="naoka-icon SolidOptionDotHorizontal text-3xl"></i>
                            </button>
                            <button class="aspect-square w-8 h-8 ml-4 flex transition-colors hover:bg-naoka-blue-hover justify-center items-center bg-naoka-blue text-white rounded-lg">
                                <i class="naoka-icon SolidAddMember"></i>
                            </button>
                        </div>
                        <button class="aspect-square w-8 h-8 flex transition-colors hover:bg-naoka-purple-hover justify-center items-center bg-naoka-purple text-white rounded-full">
                            <i class="naoka-icon SolidCog"></i>
                        </button>
                    </div>
                </div>

            </div>

            <div class="flex flex-col mt-8 overflow-auto hide-scrollbar">
                <div class="flex mx-auto">
                    <div class="flex container">
                        <div v-for="board in boards" class="shadow-base flex-shrink-0 flex flex-col justify-between w-72 mx-6 border-2 border-naoka-purple p-4 rounded-3xl">
                            <CardKanban :board="board"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
    import { defineComponent } from 'vue'
    import CardKanban from "@/components/Dashboard/CardKanban.vue";

    export default defineComponent({
        components: {
            CardKanban,
        },

        props: {
            boards: Array,
        },

        methods: {
            
        }
    })
</script>
