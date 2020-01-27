<template>
  <div>
    <button @click="wrappedHandler" type="button" class="btn btn-primary" :disabled="inProgress === true">
      <span v-if="inProgress === true" class="spinner-border spinner-grow-sm" role="status" aria-hidden="true"></span>
      {{ buttonText }}
    </button>
  </div>
</template>

<script>
  export default {
    name: "AsyncButton",
    props: {
      handler: {
        type: Function,
        required: true
      },
      buttonText: {
        type: String,
        default: 'Add'
      }
    },
    data() {
      return {
        inProgress: false
      }
    },
    methods: {
      wrappedHandler() {
        this.inProgress = true

        this.handler().finally(() => {
          this.inProgress = false
        })
      }
    }
  }
</script>

<style scoped>

</style>