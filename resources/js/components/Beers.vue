<template>
    <div class="card shadow">
        <div class="card-header">{{ beerHeaderText }}</div>
          <div class="card-body beers">
            <div v-if="beers.length">
              <div v-for="beer in beers">
                <beer :beer="beer" @showBars="showBarsForBeer"></beer>
              </div>
            </div>
            <div v-else class="text-center pt-5"><img src="/images/spinner.gif"></div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
      return {
        beerHeaderText: null,//'There are ' + this.initialData.beers.length + ' beers on tap. Click on a beer...',
        barsHeaderText: null,
        // beers: this.initialData.beers,
      }
    },

    props: ['beers'],

    methods: {

        showBarsForBeer(beer) {
            this.$emit('showBars',beer);
        }
    }

}
</script>

