<template>
  <div>
    <div class="row ">
      <div class="col-md-6 mb-4">
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
      </div>
      <div class="col-md-6 mb-4" id="bars">
        <div class="card shadow">
          <div class="card-header">
              <span v-if="bars.length">{{ barsHeaderText }}</span>
              <span v-else>Choose A Beer</span>
          </div>
          <div class="card-body bars" >
            <div v-for="bar in bars">
              <bar :bar="bar"></bar>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row mb-4">
      <div class="col-12">
        <system-status></system-status>
      </div>
    </div>
  </div>

</template>

<script>

  export default {
    data() {
      return {
        beerHeaderText: 'There are ' + this.initialData.beers.length + ' beers on tap. Click on a beer...',
        barsHeaderText: null,
        beers: this.initialData.beers,
        bars: [],
      }
    },

    props: ['selectedDate','initialData'],

    watch: {
       selectedDate: function(){
          this.fetchDataForDate();
       }
    },

    methods: {

      fetchDataForDate() {

        this.beers = this.bars = [];

        axios.get(route('api.data'),{
          params: { date: this.selectedDate.toJSON() }
        })
        .then((response) => {
            this.beers = response.data.beers;
            this.beerHeaderText = 'There are ' + this.beers.length + ' beers on tap. Click on a beer...';
            if (this.selectedDate) { 
                this.beerHeaderText = 'On '+this.selectedDate.toLocaleDateString()+' there were '+ this.beers.length + ' beers on tap. Click on a beer...'; 
            }
         })
          .catch(error => {
              let errorText = (error.status ? error.response.statusText : error);
              this.$swal({text: errorText,
                   title: 'Something went wrong!',
                   type: 'error'});
          });
      },

      showBarsForBeer(beer) {
        
          this.bars = this.initialData.bars.filter(bar => beer.barUUIDs.includes(bar.uuid));

          this.barsHeaderText = beer.name + ' by ' + beer.brewery + ' on tap in ' + this.bars.length + ' Brewdog bar' + (this.bars.length !== 1 ? 's' : '') + ':';
         
          if (this.selectedDate) { 
               this.barsHeaderText = beer.name + ' by ' + beer.brewery + ' was on tap in '+  this.bars.length +' Brewdog bar' + (this.bars.length !== 1 ? 's' : '') + ' on '+ this.selectedDate.toLocaleDateString() +':';
           }
      }
    },
  }
</script>
