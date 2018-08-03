<template>
    <div>
        <a @click="showBars" class="link">{{ beer.nameAndBrewery }} / {{ totalBars }}</a>
    </div>
</template>

<script>
    export default {
        props: ['beer'],

        computed: {
            totalBars: function() {
                return this.beer.totalBars + ' bar' + (this.beer.totalBars > 1 ? 's' : '') ;
            }
        },

        methods: {

            showBars(){
                this.$emit('showBars',this.beer);
            }
        }

    }
</script>
