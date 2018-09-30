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
          barsHeaderText: null,
      }
    },

    props: ['beers','selectedDate'],

    computed: {
        beerHeaderText: function() {
            if (!this.beers.length ) { return 'Loading...'; }
            let headerText = 'There ';
            if (this.selectedDate) { headerText += 'were '; } else { headerText += 'are '; }
            headerText += this.beers.length + ' beers on tap';
            if (this.selectedDate) { headerText += ' on '+this.$filters.formatDate(this.selectedDate); } 
            headerText += ':';
            return headerText;
        }
    },

    methods: {
        showBarsForBeer(beer) {
            this.$emit('showBars',beer);
        }
    }

}
</script>

