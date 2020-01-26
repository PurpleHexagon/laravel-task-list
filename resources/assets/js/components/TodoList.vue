<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Todos</h3>
                        <p class="card-text">Unarchived tasks are displayed below.</p>
                    </div>

                    <ul class="list-group list-group-flush">
                        <li class="list-group-item" v-for="task in taskList" style="text-align: left; padding-left: 2rem;">
                            <input type="checkbox" class="form-check-input"/>
                            {{ task.title }} - {{ task.details }}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
          tasks: {
            type: String
          }
        },
        computed: {
          taskList() {
            return JSON.parse(this.tasks)
          }
        }
    }
</script>
