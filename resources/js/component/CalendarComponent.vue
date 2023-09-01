<template>
  <div class="calendar">
    <FullCalendar :options="calendarOptions" />
  </div>
</template>

<script>
import { FullCalendar } from 'vue-full-calendar'
import 'vue-full-calendar/dist/vue-full-calendar.css'

export default {
  components: {
    FullCalendar
  },
  data() {
    return {
      calendarOptions: {
        plugins: ['dayGrid'],
        initialView: 'dayGridMonth'
        // Customize further as needed
      }
    }
  }
}
</script>

<style scoped>
.calendar {
  margin-left: -15px; /* Adjust this value to align properly with your layout */
}
</style>
