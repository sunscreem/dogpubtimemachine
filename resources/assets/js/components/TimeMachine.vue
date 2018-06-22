<template>
    <div class="row ">
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-header">Click On A Beer:</div>
                <div class="card-body beers">
                    <div v-for="beer in beers">
                        <beer :beer="beer" @showBars="getBarsForBeer"></beer>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-header">{{ beerShowing }} On Tap In:</div>
                <div class="card-body">
                    <div v-for="bar in bars">
                        {{ bar.name }}
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
               beers: [],
               bars: [],
               beerShowing: ''
           }
       },
       mounted(){

           this.fetchTheBeers();
       },
       methods:{

           fetchTheBeers() {
               axios.get(route('beers.index'))
               .then((response)=>{
                   this.beers = response.data;
                 })
                .catch(error => {
                    // to do - sort this
                            // this.$swal({text: error.response.statusText,
                            //             title: 'Something went wrong!',
                            //             type: 'error'});
                        });
           },
           getBarsForBeer(beer){
               
               this.beerShowing = beer.name+' by '+beer.brewery;
               axios.get(route('bars.hasBeer',beer.id)).then((response)=>{
                   this.bars = response.data;
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
