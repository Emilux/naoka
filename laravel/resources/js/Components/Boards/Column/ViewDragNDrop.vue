<template>
    <draggable
        class="flex w-full overflow-auto items-start h-full py-12 px-4 absolute right-0 top-0 w-[calc(100%-4rem)] sm:w-[calc(100%-3rem)]"
        :list="columns"
        :scroll-sensitivity="100"
        :delayOnTouchOnly="true"
        :delay="100"
        :force-fallback="true"
        group="columns"
        @change="moveColumn"
        handle=".handle"
    >
        <template #item="{ element }" :key="element.id">
            <div class="flex flex-col border-2 mx-8 rounded-3xl w-72 flex-shrink-0 max-h-full overflow-hidden">
                <div class="handle p-3 text-sm text-naoka-purple font-raleway font-semibold cursor-pointer flex justify-between items-center">
                    <div v-bind:onclick="log" class="hover:bg-white-hover p-1 w-full">{{ element.name }}</div>
                        <div class="text-xl flex items-center">
                        <CreateCard :column="element" addClass="p-1"/>
                        <DeleteColumn :column="element"/>
                    </div>
                </div>

                <ViewCards :column="element" :cards="element.cards"/>

                <CreateCard :column="element" text='Add new card...' addClass="py-4 px-4"/>
            </div>
        </template>
    </draggable>
</template>

<script>
import { defineComponent } from 'vue'
import draggable from 'vuedraggable'
import ViewCards from '@/components/Boards/Cards/ViewCards.vue'
import CreateCard from '@/components/Boards/Cards/CreateCard.vue'
import DeleteColumn from '@/components/Boards/Column/DeleteColumn.vue'

export default {
    components: {
        draggable,
        ViewCards,
        CreateCard,
        DeleteColumn,
    },

    props: {
        columns: Object,
        cards: Object,
    },

    data() {
        return {
            hasScroll: true,
            drag: true,
            form: this.$inertia.form()
        }
    },

    methods:{
        moveColumn: function (e) {
            const newIndex = e.moved.newIndex
            const nextIndex = newIndex+1
            const prevIndex = newIndex-1
            const nextColId = nextIndex > this.columns.length-1 ? null : this.columns[nextIndex].id
            const prevColId = prevIndex < 0 ? null : this.columns[prevIndex].id

            this.form.put(route('boards.column.move', {board:this.$page.props.board,column:e.moved.element,nextColumnId:nextColId,prevColumnId:prevColId}), {
                errorBag: 'moveColumn',
                preserveScroll: false
            });
        }
    }
}
</script>
