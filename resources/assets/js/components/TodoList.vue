<template>
  <div class="main container">
    <notifications position="top left" />

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
            <p class="card-text">A list of tasks.</p>
          </div>

          <div v-if="showModal">
            <transition name="modal">
              <div class="modal-mask">
                <div class="modal-wrapper">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">Edit Task</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true" @click="showModal = false">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form>
                          <div class="form-group">
                            <input v-model="taskToEdit.title" type="text" class="form-control" id="title" placeholder="Title"/>
                          </div>
                          <div class="form-group">
                            <input v-model="taskToEdit.details" type="text" class="form-control" id="details" placeholder="Details"/>
                          </div>
                        </form>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" @click="showModal = false">Close</button>
                        <async-button buttonText="save" :handler="editTaskWrapper"></async-button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </transition>
          </div>

          <ul class="list-group list-group-flush todo-list">
            <li class="list-group-item todo-list_list-group-item" v-for="task in tasks">
              <input :id="`completeCheck${task.id}`" class="completeCheck" v-model="task.is_complete" @click="putTodo(task.id, task)" type="checkbox" />
              <label :for="`completeCheck${task.id}`" class="task" :class="task.is_complete ? 'strikethrough': ''">
                {{ task.title }} - {{ task.details }}
              </label>
              <button class="btn btn-primary float-right" @click="showModalHandler(task.id)">Edit</button>
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
  import { find, merge } from 'lodash'
  import AsyncButton from "./AsyncButton"

  export default {
    components: {AddTodo, AsyncButton},
    data() {
      return {
          showModal: false,
          taskToEditId: null,
      }
    },
    created() {
      this.fetchTasks()
    },
    computed: merge(
      {
        taskToEdit() {
          return find(this.tasks, (task) => task.id == this.taskToEditId)
        }
      },
      mapGetters(['tasks'])
    ),
    methods: merge({
      editTaskWrapper() {
        return this.updateTask({
          id: this.taskToEditId,
          task: this.taskToEdit
        }).then(() => {
          this.taskToEditId = null
          this.showModal = false
        })
      },
      showModalHandler(id) {
        this.showModal = true
        this.taskToEditId = id
      },
      putTodo(id, task) {
        task.is_complete = ! task.is_complete
        return this.updateTask({ id, task })
      }
    },
    mapActions(
      ['fetchTasks', 'updateTask']
    ))
  }
</script>

<style scoped>
  .strikethrough {
    text-decoration: line-through;
  }

  .main.container {
    max-width: 500px;
  }

  .todo-list_list-group-item {
    text-align: left;
    padding-left: 2rem;
  }

  .modal-mask {
    position: fixed;
    z-index: 9998;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, .5);
    display: table;
    transition: opacity .3s ease;
  }

  .modal-wrapper {
    display: table-cell;
    vertical-align: middle;
  }

  .completeCheck {
    float: left;
    position: relative;
    top: 4px;
    left: -15px;
  }

  .task {
    float: left;
    width: 300px;
  }
</style>
