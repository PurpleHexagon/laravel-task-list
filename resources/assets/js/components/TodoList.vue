<template>
  <div class="main container">
    <div class="row">
      <div class="col-md-12">
        <add-todo></add-todo>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="card mb-5">
          <div class="card-body">
            <h3 class="card-title">Todos</h3>
            <p class="card-text">Unarchived tasks are displayed below.</p>
          </div>

          <ul class="list-group list-group-flush todo-list">
            <li class="list-group-item todo-list_list-group-item" v-for="task in tasks">
              <input v-model="task.is_complete" @click="putTodo(task.id, task.is_complete)" type="checkbox" />
              <span :class="task.is_complete ? 'strikethrough': ''">
                {{ task.title }} - {{ task.details }}
              </span>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  import AddTodo from "./AddTodo"
  import { mapActions, mapGetters } from 'vuex'
  import { merge } from 'lodash'

  export default {
    components: {AddTodo},
    created() {
      this.fetchTasks()
    },
    computed: merge(
      {},
      mapGetters(['tasks'])
    ),
    methods: merge({
      putTodo(id, isComplete) {
        return this.toggleTaskComplete({ id, isComplete: !isComplete })
      }
    },
    mapActions(
      ['fetchTasks', 'toggleTaskComplete']
    ))
  }
</script>

<style scoped>
  .strikethrough {
    text-decoration: line-through;
  }

  .main.container {
    max-width: 400px;
  }

  .todo-list_list-group-item {
    text-align: left;
    padding-left: 2rem;
  }
</style>
