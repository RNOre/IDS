<script>
import axios from "axios";

export default {
  name: 'ShowStudent',
  props: {
    currentStudent: Number,

  },
  data() {
    return {
      data: ''
    }
  },
  async created() {
    this.data = await axios.get(`http://localhost:8000/api/v1/students/${this.currentStudent}`)
        .then(resp => resp.data.original)
  }
}
</script>
<template>
  <div>
    {{ data }}
  </div>
</template>
<style>

</style>