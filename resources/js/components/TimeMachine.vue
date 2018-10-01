<template>
  <div class="container">

      <headers :selectedDate="selectedDate"
               :onTapCount="beersForCurrentDate.length"
               :barsCount="barsForCurrentDate.length"
               :timeMachineStartsDate="timeMachineStartsDate"
               @date-changed="dateChanged"></headers>
      
      <div class="row ">
      <div class="col-md-6 mb-4">
          <beers :beers="beersForCurrentDate" 
                 :selectedDate="selectedDate"
                 @showBars="showBarsForBeer"></beers>
        
      </div>
      <div class="col-md-6 mb-4" id="bars">
        <bars :barsToShow="barsToShow" 
              :selectedBeer="selectedBeer" 
              :selectedDate="selectedDate"></bars>
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
        selectedBeer: null,
        beersForCurrentDate: [],
        barsForCurrentDate: [],
        barsToShow: [],
      }
    },

    props: ['initialData','timeMachineStartsDate'],

    mounted(){
        if (this.$route.query.d) {
            this.selectedDate = new Date(this.$route.query.d);
            this.fetchDataForDate();
            return;
        }
        this.beersForCurrentDate = this.initialData.beers;
        this.barsForCurrentDate = this.initialData.bars;
      
    },

    methods: {

      

      dateChanged(selectedDate) {

        this.selectedDate = selectedDate;
        
        if (!selectedDate){
             this.beersForCurrentDate = this.initialData.beers; 
             this.barsForCurrentDate =this.initialData.bars;
             this.$router.push({ query: {}});
            return;
        }

        this.$router.push({ query: {d:this.selectedDate.toJSON()}});
        this.fetchDataForDate();


      },
      
      fetchDataForDate(){

        
        this.beersForCurrentDate = this.barsForCurrentDate = this.barsToShow = [];


      


        axios.get(route('api.data'),{ params: { date: this.selectedDate.toJSON() } })
        .then((response) => {
            this.beersForCurrentDate = response.data.beers;
            this.barsForCurrentDate = response.data.bars;
            
         })
          .catch(error => {
              let errorText = (error.status ? error.response.statusText : error);
              this.$swal({text: errorText,
                   title: 'Something went wrong!',
                   type: 'error'});
          });

      },


      showBarsForBeer(beer) {

          this.barsToShow = this.barsForCurrentDate.filter(bar => beer.barUUIDs.includes(bar.uuid));
          this.selectedBeer = beer;
          
      }
    },
  }
</script>

