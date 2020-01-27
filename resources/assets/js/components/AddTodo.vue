<template>
  <div class="mb-5">
    <form>
      <div class="form-group">
        <input v-model="title" type="text" class="form-control" id="title" placeholder="Title"/>
      </div>
      <div class="form-group">
        <input v-model="details" type="text" class="form-control" id="details" placeholder="Details"/>
      </div>
      <async-button :handler="addTask"></async-button>
    </form>
  </div>
</template>

<script>
  import axios from 'axios'
  import AsyncButton from "./AsyncButton"

  export default {
    name: "AddTodo",
    components: {AsyncButton},
    data() {
      return {
        title: '',
        details: ''
      }
    },
    methods: {
      addTask() {
        return axios.post(
          '/api/tasks',
          {
            user_id: 1,
            title: this.title,
            details: this.details
          }
        ).then(() => {
          axios.get(
            '/api/tasks'
          ).then((res) => {
            this.title = ''
            this.details = ''
            this.$emit('updateTasks', res.data)
          })
        })
      }
    }
  }
</script>

<style scoped>

</style>
