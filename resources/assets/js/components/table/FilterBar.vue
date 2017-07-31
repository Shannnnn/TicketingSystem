<template>
    <div class="filter-bar ui basic segment grid">
      <div class="ui form">
        <div class="inline field">
          <label>Search for:</label>
          <input type="text" v-model="filterText" class="three wide column" @keyup.enter="doFilter" placeholder="Company, Branch or Address">
          <button class="ui primary button" @click="doFilter">Filter</button>
          <button class="ui button" @click="resetFilter">Reset</button>
        </div>
      </div>
    </div>
</template>

<script>
  export default {
    data () {
      return {
        filterText: ''
      }
    },
    methods: {
      doFilter () {
        this.$events.fire('filter-set', this.filterText)
        console.log('doFilter:', this.filterText)
      },
      resetFilter () {
        this.filterText = ''
        this.$events.fire('filter-reset')
        console.log('resetFilter')
      }
    }
  }
</script>