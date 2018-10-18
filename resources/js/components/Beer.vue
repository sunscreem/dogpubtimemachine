<template>
    <div>
        <a @click.prevent="showBars" href="#" class="link text-dark">{{ beer.name }} / {{ beer.brewery }} / {{ beersCount }}</a>
    </div>
</template>

<script>
    export default {
        props: ['beer'],

        computed: {
            beersCount: function() {
                return this.beer.bars_count + ' bar' + (this.beer.bars_count > 1 ? 's' : '') ;
            }
        },

        methods: {

            showBars(){
                this.$emit('showBars',this.beer);
            }
        }

    }
</script>
