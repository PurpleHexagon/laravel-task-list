<template>
    <div class="mb-5">
        <form>
            <div class="form-group">
                <input v-model="title" type="text" class="form-control" id="title" placeholder="Title"/>
            </div>
            <div class="form-group">
                <input v-model="details" type="text" class="form-control" id="details" placeholder="Details"/>
            </div>
            <button @click="add" type="button" class="btn btn-primary">Add</button>
        </form>
    </div>
</template>

<script>
  import axios from 'axios'

  export default {
    name: "AddTodo",
    data: {
      title: '',
      details: ''
    },
    methods: {
      add() {
        axios.post(
          '/api/tasks',
          {
            user_id: 1,
            title: this.title,
            details: this.details
          }
      )
      }
    }
  }
</script>

<style scoped>

</style>