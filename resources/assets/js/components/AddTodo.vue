<template>
  <div class="mb-5">
    <form>
      <div class="form-group">
        <input v-model="title" type="text" class="form-control" id="title" placeholder="Title"/>
      </div>
      <div class="form-group">
        <input v-model="details" type="text" class="form-control" id="details" placeholder="Details"/>
      </div>
      <async-button :handler="addTaskWrapper"></async-button>
    </form>
  </div>
</template>

<script>
  import axios from 'axios'
  import AsyncButton from "./AsyncButton"
  import { merge } from 'lodash'
  import { mapActions } from 'vuex'

  export default {
    name: "AddTodo",
    components: {AsyncButton},
    data() {
      return {
        title: '',
        details: ''
      }
    },
    methods: merge({
        addTaskWrapper() {
          return this.addTask({
            task: {
              title: this.title,
              details: this.details
            }
          }).then(() => {
            this.title = ''
            this.details = ''
          })
        }
      },
      mapActions(['addTask'])
    )
  }
</script>

<style scoped>

</style>
