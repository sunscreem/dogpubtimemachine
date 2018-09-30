<template>
  <div class="container">
      <headers :selectedDate="selectedDate"
               :onTapCount="onTapCount"
               :barsCount="barsCount"
               :timeMachineStartsDate="timeMachineStartsDate"
               @date-changed="dateChanged"></headers>
      
      <div class="row ">
      <div class="col-md-6 mb-4">
          <beers :beers="beersForCurrentDate" @showBars="showBarsForBeer"></beers>
        
      </div>
      <div class="col-md-6 mb-4" id="bars">
        <bars :barsToShow="barsToShow"></bars>
       
      </div>
    </div>
    <div class="row mb-4">
      <div class="col-12">
        <system-status></system-status>
      </div>
    </div>

      
    <div class="card shadow">
        <div class="card-header">
            What on earth is this?!
        </div>
        <div class="card-body">
        <p>If you are wondering what this is, who made it and why then you are in luck:</p>
        <p><a href="https://github.com/sunscreem/dogpubtimemachine/tree/master#what-is-this">Head on over here</a> for all the details.</p>
        </div>
    </div>
    
  </div>







    
 

</template>

<script>

  export default {
    data() {
      return {
        selectedDate: null,
        onTapCount: this.initialData.beers.length,
        barsCount: this.initialData.bars.length,
        // selectedBeer: null,
        // beerHeaderText: 'There are ' + this.initialData.beers.length + ' beers on tap. Click on a beer...',
        beersForCurrentDate: this.initialData.beers,
        barsForCurrentDate: this.initialData.bars,
        barsToShow: [],
        // historicBars: [],
      }
    },

    props: ['initialData','timeMachineStartsDate'],

    watch: {
      //  selectedDate: function(){
      //     this.fetchDataForDate();
      //  }
    },

    methods: {

      dateChanged(selectedDate) {
        // let now = new Date();
        // if (selectedDate.toDateString() == now.toDateString()) {
        //   this.selectedDate = null;
        //   return
        // }
        this.selectedDate = selectedDate;
      },

      // fetchDataForDate() {

      //   this.beers = this.bars = [];

      //   axios.get(route('api.data'),{
      //     params: { date: this.selectedDate.toJSON() }
      //   })
      //   .then((response) => {
      //       this.beers = response.data.beers;
      //       this.historicBars = response.data.bars;
      //       this.beerHeaderText = 'There are ' + this.beers.length + ' beers on tap. Click on a beer...';
      //       if (this.selectedDate) { 
      //           this.beerHeaderText = 'On '+this.selectedDate.toLocaleDateString()+' there were '+ this.beers.length + ' beers on tap. Click on a beer...'; 
      //       }
      //    })
      //     .catch(error => {
      //         let errorText = (error.status ? error.response.statusText : error);
      //         this.$swal({text: errorText,
      //              title: 'Something went wrong!',
      //              type: 'error'});
      //     });
      // },

      showBarsForBeer(beer) {
        
        // if (this.selectedDate) { 
        //     this.bars = this.historicBars.filter(bar => beer.barUUIDs.includes(bar.uuid));
        //     this.barsHeaderText = beer.name + ' by ' + beer.brewery + ' was on tap in '+  this.bars.length +' Brewdog bar' + (this.bars.length !== 1 ? 's' : '') + ' on '+ this.selectedDate.toLocaleDateString() +':';
        //     return;
        //  }

          console.log(beer);

          this.bars = this.barsForCurrentDate.filter(bar => beer.barUUIDs.includes(bar.uuid));

          // this.barsHeaderText = beer.name + ' by ' + beer.brewery + ' on tap in ' + this.bars.length + ' Brewdog bar' + (this.bars.length !== 1 ? 's' : '') + ':';
         
      }
    },
  }
</script>


 data() {
    return {
      
    }
  },
  
  methods: {
   
  }