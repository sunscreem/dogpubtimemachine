<template>
    <div class="card shadow">
        <div class="card-header">System Status</div>
        <div class="card-body">
            Total Brewdog Bars: {{ stats.totalBrewdogBars }}<br>
            Total bars checked in the last 2 hours: {{ stats.totalBarsCheckedInTwoHours }}<br>
            Last bar was checked: {{ stats.lastBarChecked }}<br>
            Total bars updated their tap lists in the last 3 days: {{ stats.totalBarUpdatedTapListInLastThreeDays }}<br>
            <a href="/bars-status">Bars Status</a>
            <!-- Bars not currently showing taplists on brewdog.com: {{ stats.barsNotShowingTapLists }}<br>                     -->
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
               .then((data)=>{ this.stats = data; });
           },
          
       }
    }

</script>
