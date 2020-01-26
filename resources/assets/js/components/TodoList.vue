<template>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <add-todo v-on:updateTasks="updateTasks"></add-todo>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <h3 class="card-title">Todos</h3>
            <p class="card-text">Unarchived tasks are displayed below.</p>
          </div>


          <ul class="list-group list-group-flush">
            <li class="list-group-item" v-for="task in taskList" style="text-align: left; padding-left: 2rem;">
              <input v-model="task.is_complete" @click="putTodo(task.id, task.is_complete)" type="checkbox" />
              <span :class="task.is_complete ? 'strikethrough': ''">{{ task.title }} - {{ task.details }}</span>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  import AddTodo from "./AddTodo";
  export default {
    components: {AddTodo},
    props: {
      tasks: {
        type: String
      }
    },
    computed: {
      taskList() {
        return JSON.parse(this.tasks)
      }
    },
    methods: {
      updateTasks(tasks) {
        this.tasks = JSON.stringify(tasks)
      },
      putTodo(id, isComplete) {
        axios.put(
          `/api/tasks/${id}`,
          {
            is_complete: !isComplete,
          }
        ).then(() => {
          axios.get(
            '/api/tasks'
          ).then((res) => {
            this.tasks = JSON.stringify(res.data)
            this.$forceUpdate()
          })
        })
      }
    }
  }
</script>

<style scoped>
  .strikethrough {
    text-decoration: line-through;
  }
</style>
