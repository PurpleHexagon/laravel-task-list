<template>
  <div class="mb-5">
    <form v-on:submit.prevent="submit">
      <div class="form-group">
        <input @keyup.enter="submit" v-model="title" type="text" class="form-control" id="title" placeholder="Title"/>
      </div>
      <div class="form-group">
        <input @keyup.enter="submit"  v-model="details" type="text" class="form-control" id="details" placeholder="Details"/>
      </div>
      <async-button ref="submitButton" :handler="addTaskWrapper"></async-button>
    </form>
  </div>
</template>

<script>
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
        },
        submit() {
          this.$refs.submitButton.wrappedHandler()
        }
      },
      mapActions(['addTask'])
    )
  }
</script>

<style scoped>

</style>
