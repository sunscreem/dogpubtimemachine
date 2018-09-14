<template>
    <div class="mt-3 mb-2">
        <span v-if="dateToShow">
            <h4 class="text-danger link" @click="showDatePicker">Showing Beers From {{ dateToShow }}</h4>
        </span>
        <span v-else-if="changingDate">
          Choose A Date: 
          <div tabIndex="1" @blur="hideDatePicker" class="d-inline-block ml-1">
            <datepicker 
                    ref="datepicker"
                    v-model="selectedDate"
                    :full-month-name="true"
                    :monday-first="true"
                    :format="formatDate"
                    :disabled-dates="disabledDates"
                    :bootstrap-styling="true"
                    v-on:selected="dateSelected"
            ></datepicker>
          </div>
        </span>
        <span v-else>
            Go Back In Time! 
            <a href="#" @click.prevent="showDatePicker">Choose A Date</a>
        </span>

    </div>
</template>

<script>

    import Datepicker from 'vuejs-datepicker';

    export default {
        
        data() {
            return {
                selectedDate: new Date(),
                dateToShow: null,
                changingDate: false,
                disabledDates: {
                    to: new Date(this.timeMachineStartsDate),
                    from: new Date()
                }
            }
        },

        components: {
            Datepicker
        },
        
        props: ['timeMachineStartsDate'],

        methods: {
            hideDatepicker() {
                this.$refs.datepicker.close()
            },
            formatDate(date) {
                let dateObj = new Date(date)
                const formattedDate = ('0' + dateObj.getDate()).slice(-2) + '/'
                                    + ('0' + (dateObj.getMonth()+1)).slice(-2) + '/'
                                    + dateObj.getFullYear()
                return formattedDate
            },
            showDatePicker() {
                 this.dateToShow = null;
                 this.changingDate = true;
                 this.$nextTick()
                 .then(()=>{ this.$refs.datepicker.showCalendar(); });
            },
            hideDatePicker() {
                 this.changingDate = false;
            },
            dateSelected(){
                this.changingDate = false;
                this.$nextTick()
                 .then(()=>{ 
                     this.dateToShow = this.formatDate(this.selectedDate);  
                     this.$emit('date-changed',this.selectedDate);
                });
            }
            
        }

    }
</script>
