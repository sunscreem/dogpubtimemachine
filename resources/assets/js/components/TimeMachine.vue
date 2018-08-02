<template>
  <div>
    <div class="row ">
      <div class="col-md-6 mb-4">
        <div class="card shadow">
          <div class="card-header">{{ beerHeaderText }}</div>
          <div class="card-body beers">
            <div v-if="beers.length">
              <div v-for="beer in beers">
                <beer :beer="beer" @showBars="getBarsForBeer"></beer>
              </div>
            </div>
            <div v-else class="text-center pt-5"><img src="/images/spinner.gif"></div>
          </div>
        </div>
      </div>
      <div class="col-md-6 mb-4" id="bars">
        <div class="card shadow">
          <div class="card-header">{{ barsHeaderText }}</div>
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
        beerHeaderText: 'Loading...',
        barsHeaderText: 'Choose A Beer',
        beers: [],
        bars: [],
      }
    },

    mounted() {
      this.fetchTheBeers();
      // if (this.beerSelected.id > 0) {
      //   this.getBarsForBeer(this.beerSelected,false)
      // }
      // window.onpopstate = function(event) {
      //   if (event.state && event.state.id > 0) {
      //     this.getBarsForBeer(event.state, false);
      //   }
      // }.bind(this);
    },

    methods: {

      fetchTheBeers() {
        axios.get(route('beers.index'))
          .then((response) => {
            this.beers = response.data;
            this.beerHeaderText = 'There are ' + this.beers.length + ' beers on tap. Click on a beer...';
          })
          .catch(error => {
            this.$swal({
              text: (error.response ? error.response.statusText : 'Are you offline?'),
              title: 'Something went wrong!',
              type: 'error'
            });
          });
      },

      getBarsForBeer(beer, updateUrl = true) {
        this.barsHeaderText = 'Loading...';
        axios.get(route('bars.hasBeer', beer.id)).then((response) => {
          this.bars = response.data;
          this.barsHeaderText = beer.name + ' by ' + beer.brewery + ' on tap in ' + this.bars.length + ' Brewdog bar' + (this.bars.length !== 1 ? 's' : '') + ':';
          document.getElementById("bars").scrollIntoView({behavior:'smooth'});
          // if (updateUrl) {
          //   history.pushState(beer, beer.name, beer.id);
          // }
        })
          .catch(error => {
            this.$swal({
              text: (error.response ? error.response.statusText : 'Are you offline?'),
              title: 'Something went wrong!',
              type: 'error'
            });
          });

      }
    },

    // props: {
    //   'beerSelected': Object
    // }

  }
</script>
