<template>
    <draggable
        :scroll-sensitivity="100"
        :delay="100"
        :delayOnTouchOnly="true"
        :force-fallback="true"
        class="pb-4 px-4 overflow-auto"
        :list="cards"
        @change="moveCard"
        group="cards"
    >
        <template #item="{ element }" :key="element.id">

            <div class=" relative p-2.5 shadow-mini rounded-2xl mt-4 cursor-pointer text-naoka-purple font-raleway border-naoka-grey text-sm border hover:bg-white-hover transition-colors">

                <div class="absolute right-0 top-0 text-lg">
                    <DeleteCard :column="column" :card="element"/>
                </div>

                <div v-if="element.tag" class="flex flex-wrap text-xs">
                    <div v-for="tag in element.tag" v-bind:style="{ backgroundColor: tag.bg,color: tag.color}" class="py-1.5 px-2.5 bg-naoka-yellow mr-2 mb-2 rounded-full">
                        {{tag.name}}
                    </div>
                </div>

                <div class="mb-4">{{element.name}}</div>

                <div class="flex justify-between font-semibold">
                    <div>
                        <div v-if="element.until" class="">Until : {{element.until}}</div>
                    </div>

                    <div>#{{$page.props.board.identifier}}-{{element.count}}</div>
                </div>
            </div>
        </template>
    </draggable>

</template>


<script>
import { defineComponent } from 'vue'
import draggable from 'vuedraggable'
import DeleteCard from '@/components/Boards/Cards/DeleteCard.vue'

export default {
    components: {
        draggable,
        DeleteCard,
    },

    props: {
        cards: Object,
        columns: Object,
        column: Object,
    },

    data() {
        return {
            hasScroll: true,
            drag: true,
            form: this.$inertia.form()
        }
    },

    methods:{
        moveCard: function (e) {

            if (e.added){
                const newIndex = e.added.newIndex
                const nextIndex = newIndex+1
                const prevIndex = newIndex-1
                const nextCardId = nextIndex > this.cards.length-1 ? null : this.cards[nextIndex].id
                const prevCardId = prevIndex < 0 ? null : this.cards[prevIndex].id
                this.form.put(route('boards.column.card.move', {board:this.$page.props.board,column:this.column,card:e.added.element,nextCardId,prevCardId}), {
                    errorBag: 'moveCard',
                    preserveScroll: false
                });
            } else if (e.moved) {
                const newIndex = e.moved.newIndex
                const nextIndex = newIndex+1
                const prevIndex = newIndex-1
                const nextCardId = nextIndex > this.cards.length-1 ? null : this.cards[nextIndex].id
                const prevCardId = prevIndex < 0 ? null : this.cards[prevIndex].id
                this.form.put(route('boards.column.card.move', {board:this.$page.props.board,column:this.column,card:e.moved.element,nextCardId,prevCardId}), {
                    errorBag: 'moveCard',
                    preserveScroll: false
                });
            }


        }
    }
}
</script>
