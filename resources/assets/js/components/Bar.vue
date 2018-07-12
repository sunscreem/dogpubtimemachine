<template>
    <div>
          <span v-tooltip.right="tooltip">{{ bar.name }}</span>
    </div>
</template>

<script>
    export default {

        data(){
            return {
                }
        },
        computed: {
            tooltip() {
                var tip = 'Last Checked: ' + this.bar.lastChecked+'<br>';
                tip += 'Tap List Updated: '+ this.bar.tapListLastUpdated; 
                return tip;
            }
        }
        
        props: ['bar']
    }
</script>

