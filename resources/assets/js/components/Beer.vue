<template>
    <div>
        <span @click="showBars" class="link">{{ beer.name }} / {{ beer.brewery }} (11 bars)</span>
    </div>
</template>

<script>
    export default {
        props: ['beer'],

        methods: {

            showBars(){
                this.$emit('showBars',this.beer);
            }
        }

    }
</script>
