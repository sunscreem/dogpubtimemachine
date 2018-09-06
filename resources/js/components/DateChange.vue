<template>
    <div class="mt-3 mb-2">
        Go Back In Time! <strong>Change Date: </strong>
          <div tabIndex="1" @blur="hideDatepicker" class="d-inline-block">
            <datepicker 
                ref="datepicker"
                :value="formattedValue"
                :full-month-name="true"
                :monday-first="true"
                :format="formatDate"
                :bootstrap-styling="true"
            ></datepicker>
        </div>
    </div>
</template>

<script>

    import Datepicker from 'vuejs-datepicker';

    export default {
        
        data() {
            return {
                date: ''
            }
        },

        components: {
            Datepicker
        },

        computed: {
            formattedValue() {
                return this.formatDate(this.value)
            }
        },

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
        }

    }
</script>
