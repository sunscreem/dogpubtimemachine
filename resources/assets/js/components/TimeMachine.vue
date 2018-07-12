<template>
    <div>
        <div class="row ">
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-header">{{ beerHeaderText }}</div>
                    <div class="card-body beers">
                        <div v-if="beers.length">
                            <div v-for="beer in beers">
                                <beer :beer="beer" @showBars="getBarsForBeer"></beer>
                            </div>
                        </div>
                        <div v-else class="text-center pt-5"><img src="/img/spinner.gif"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-header">{{ barsHeaderText }}</div>
                    <div class="card-body bars">
                        <div v-for="bar in bars">
                            {{ bar.name }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">System Status</div>
                    <div class="card-body">
                        Total Brewdog Bars: {{ stats.totalBrewdogBars }}<br>
                        Total bars checked in the last 2 hours: {{ stats.totalBarsCheckedInTwoHours }}<br>
                        Last bar was checked: {{ stats.lastBarChecked }}<br>
                        Total bars updated their tap lists in the last 3 days: {{ stats.totalBarUpdatedTapListInLastThreeDays }}<br>
                        Bars not currently showing taplists on brewdog.com: {{ stats.barsNotShowingTapLists }}<br>                    
                    </div>
                </div>
            </div>
        </div>
    </div>
    
   
</template>

<script>
    export default {
       data(){
           return {
               beerHeaderText: 'Loading...',
               barsHeaderText: 'Choose A Beer',
               beers: [],
               bars: [],
               stats: {}
           }
       },
       mounted(){

           this.fetchTheBeers();
           this.fetchSystemStatus();

       },
       methods:{

           fetchSystemStatus() {
               axios.get(route('system.status'))
               .then((response)=>{
                    this.stats = response.data;
                })
                .catch(error => {
                    // to do - sort this
                            // this.$swal({text: error.response.statusText,
                            //             title: 'Something went wrong!',
                            //             type: 'error'});
                        });
           },
           fetchTheBeers() {
               axios.get(route('beers.index'))
               .then((response)=>{
                   this.beers = response.data;
                   this.beerHeaderText = 'There are '+this.beers.length+' beers on tap. Click on a beer...';  
                 })
                .catch(error => {
                    // to do - sort this
                            // this.$swal({text: error.response.statusText,
                            //             title: 'Something went wrong!',
                            //             type: 'error'});
                        });
           },
           getBarsForBeer(beer){
               
               this.barsHeaderText = 'Loading...';
               axios.get(route('bars.hasBeer',beer.id)).then((response)=>{
                   this.bars = response.data;
                   this.barsHeaderText = beer.name+' by '+beer.brewery + ' on tap in '+this.bars.length+' Brewdog bar'+(this.bars.length != 1 ? 's':'')+':'
              
               
                 })
                .catch(error => {
                            // this.$swal({text: error.response.statusText,
                            //             title: 'Something went wrong!',
                            //             type: 'error'});
                        });;

           }
       }
       
    }
</script>
