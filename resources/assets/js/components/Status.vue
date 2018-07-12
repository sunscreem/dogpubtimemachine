<template>
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
</template>

<script>

    export default {
        data(){
           return {
               stats: {}
           }
       },
       mounted(){
           this.fetchSystemStatus();
       },
       methods:{
           fetchSystemStatus() {
               axios.get(route('system.status'))
               .then((response)=>{
                    this.stats = response.data;
                })
                .catch(error => {
                    this.$swal({text: error.response.statusText,
                                title: 'Something went wrong!',
                                type: 'error'});
                });
           },
          
       }
    }

</script>
