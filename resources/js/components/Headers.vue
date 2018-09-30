<template>
    <div>
        <div class="d-flex justify-content-between">
            <span>
                <h1 class="mt-3">Dog Pub Time Machine</h1>
            </span>
            <span class="text-right">
                <date-change :time-machine-starts-date="timeMachineStartsDate"
                             @date-changed="dateChanged"
                ></date-change>
            </span>
        </div>
        
        <div class="d-flex justify-content-between">
            <span>
                <h6>What beers are on tap in Brewdog bars?</h6>
            </span>
            <span class="text-right">
                <h6 class="text-center">
                    <span v-if="selectedDate">On {{ selectedDate | formatDate }} there were</span>
                    <span v-else>Right now there are</span>
                     {{ onTapCount }} beers on tap across {{ barsCount }} Brewdog bars
                </h6>
            </span>
        </div>
      </div>
</template>

<script>
export default {
    
    props: ['selectedDate','onTapCount','barsCount','timeMachineStartsDate'],

    filters: {
        formatDate(date) {
            // this could be done better
            const formattedDate = ('0' + date.getDate()).slice(-2) + '/'
                                + ('0' + (date.getMonth()+1)).slice(-2) + '/'
                                + date.getFullYear()
            return formattedDate
        },
    },

    methods: {
        dateChanged(selectedDate) {
            this.$emit('date-changed',selectedDate);
        },
        
    }

}
</script>
