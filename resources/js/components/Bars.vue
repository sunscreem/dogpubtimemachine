<template>
     <div class="card shadow">
          <div class="card-header">
              <span v-if="barsToShow.length">{{ barsHeaderText }}</span>
              <span v-else>Choose A Beer</span>
          </div>
          <div class="card-body bars" >
            <div v-for="bar in barsToShow">
              <bar :bar="bar"></bar>
            </div>
          </div>
        </div>
</template>

<script>
export default {
    
    props: ['barsToShow'],

    computed: {
            barsHeaderText: function() {
                return 'header text';
            }
        },

}
</script>

