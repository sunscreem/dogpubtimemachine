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
        beers: this.initialData.beers,
        bars: [],
      }
    },

    props: ['selectedDate','initialData'],

    watch: {
       selectedDate: function(){
          // this.fetchTheBeers();
       }
    },

    created(){
        
        this.beerHeaderText = 'There are ' + this.beers.length + ' beers on tap. Click on a beer...';
        
    },

    methods: {

      fetchTheBeers() {

        // let params = {};

        // if (this.selectedDate) { params.d = this.selectedDate.toJSON(); }

        // axios.get(route('beers.index'),{
        //   params: params
        // })
        //   .then((response) => {
        //     this.beers = response.data;
        //     this.beerHeaderText = 'There are ' + this.beers.length + ' beers on tap. Click on a beer...';
        //     if (this.selectedDate) { 
        //         this.beerHeaderText = 'On '+this.selectedDate.toLocaleDateString()+' there were '+ this.beers.length + ' beers on tap. Click on a beer...'; 
        //     }
        //   })
        //   .catch(error => {
        //         let errorText = (error.status ? error.response.statusText : error);
        //         this.$swal({text: errorText,
        //             title: 'Something went wrong!',
        //             type: 'error'});
                
        //   });
      },

      showBarsForBeer(beer) {

          //  console.log(beer.beer.barUUIDs);

           this.bars = this.initialData.bars.filter(bar => beer.barUUIDs.includes(bar.uuid));

           this.barsHeaderText = beer.name + ' by ' + beer.brewery + ' on tap in ' + this.bars.length + ' Brewdog bar' + (this.bars.length !== 1 ? 's' : '') + ':';
       
// console.log(barsToShow);
          //  this.bars.push(this.initialData.bars['076040e5-c597-4681-8acd-639baac03f22'])
          //  this.bars.push(this.bars[0])
           
      //   let params = {};

      //   if (this.selectedDate) { params.d = this.selectedDate.toJSON(); }

      //   this.barsHeaderText = 'Loading...';
      //   document.getElementById("bars").scrollIntoView({behavior:'smooth'});
      //   axios.get(route('bars.hasBeer', beer.uuid),{
      //     params: params
      //   }).then((response) => {
      //     this.bars = response.data;

      //     this.barsHeaderText = beer.name + ' by ' + beer.brewery + ' on tap in ' + this.bars.length + ' Brewdog bar' + (this.bars.length !== 1 ? 's' : '') + ':';
       
      //    if (this.selectedDate) { 
      //      this.barsHeaderText = beer.name + ' by ' + beer.brewery + ' was on tap in '+  this.bars.length +' Brewdog bar' + (this.bars.length !== 1 ? 's' : '') + ' on '+ this.selectedDate.toLocaleDateString() +':';
      //    }
      //   })
      //     .catch(error => {
      //         let errorText = (error.status ? error.response.statusText : error);
      //         this.$swal({text: errorText,
      //             title: 'Something went wrong!',
      //             type: 'error'});
      //     });

      }
    },
  }
</script>
