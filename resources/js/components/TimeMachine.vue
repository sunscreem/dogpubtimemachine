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
        this.checkIfQueryStringBeerCanBeViewed();
    },

    methods: {

      dateChanged(selectedDate) {

        this.selectedDate = selectedDate;

        if (!selectedDate){
             this.beersForCurrentDate = this.initialData.beers;
             this.barsForCurrentDate =this.initialData.bars;

             let newQueryString = Object.assign({},this.$route.query);
             delete newQueryString.d;
             this.$router.push({ query: newQueryString});

             this.checkIfQueryStringBeerCanBeViewed();
             return;
        }
        this.$router.push({ query: Object.assign({}, this.$route.query, { d: this.selectedDate.toJSON() }) });
        this.fetchDataForDate();
      },

      fetchDataForDate(){

        this.beersForCurrentDate = this.barsForCurrentDate = this.barsToShow = [];

        axios.get(route('api.data'),{ params: { date: this.selectedDate.toJSON() } })
        .then((data) => {
            this.beersForCurrentDate = data.beers;
            this.barsForCurrentDate = data.bars;
            this.checkIfQueryStringBeerCanBeViewed();
         });

      },


      showBarsForBeer(beer) {

          this.$router.push({ query: Object.assign({}, this.$route.query, { b: this.$slug(beer.name+' '+beer.brewery).toLowerCase() }) });

          this.barsToShow = this.barsForCurrentDate.filter(bar => beer.barUUIDs.includes(bar.uuid));
          this.selectedBeer = beer;
          document.getElementById("bars").scrollIntoView({behavior:'smooth'});

      },

      checkIfQueryStringBeerCanBeViewed() {

          let foundBeer = this.beersForCurrentDate.find((beer)=>{
              return (this.$slug(beer.name+' '+beer.brewery).toLowerCase() === this.$route.query.b)
          });

          if (!foundBeer) { return; }

          this.showBarsForBeer(foundBeer);

      }
    },
  }
</script>

