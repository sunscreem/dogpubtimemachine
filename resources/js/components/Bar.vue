<template>
  <div>
    <a v-tooltip.right="tooltip">{{ bar.name }}</a>
  </div>
</template>

<script>
  export default {

    props: ['bar','selectedDate'],

    computed: {
      tooltip() {
        let tip = '';
        if (!this.selectedDate) {
          tip += 'Last Checked: ' + this.bar.lastChecked + '<br>';
          tip += 'Tap List Updated: ' + this.bar.tapListLastUpdated + '<br>';
        }
        tip += '<a target="_blank" rel="noopener noreferrer" href="'+ this.bar.brewdog_site_listing_url + '">Visit Website</a>';
        return {
          content: tip,
          trigger: 'click'
        };
      }
    },

  }
</script>

