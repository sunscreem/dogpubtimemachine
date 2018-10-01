<template>
     <div class="card shadow">
          <div class="card-header">
              <span v-if="barsToShow.length">{{ barsHeaderText }}</span>
              <span v-else>Choose A Beer</span>
          </div>
          <div class="card-body bars" >
            <div v-for="bar in barsToShow">
              <bar  :bar="bar"
                    :selectedDate="selectedDate"></bar>
            </div>
          </div>
        </div>
</template>

<script>
export default {
    
    props: ['barsToShow','selectedBeer','selectedDate'],

    computed: {
            barsHeaderText: function() {
                let headerText = this.selectedBeer.name + ' by ' + this.selectedBeer.brewery;
                if (this.selectedDate) { headerText += ' on '+ this.$filters.formatDate(this.selectedDate) +' was on tap in '; } else { headerText += ' now on tap in '; }
                headerText += this.barsToShow.length + ' Brewdog bar' + (this.barsToShow.length !== 1 ? 's' : '') + ':';
                return headerText;
            }
        },

}
</script>

