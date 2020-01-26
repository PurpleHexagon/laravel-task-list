<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Todos</h3>
                        <p class="card-text">Add todos and view them below</p>
                    </div>

                    <ul class="list-group list-group-flush">
                        <li class="list-group-item" v-for="task in taskList">
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
