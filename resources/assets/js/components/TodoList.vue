<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Todo:</div>

                    <div class="panel-body">
                        <ul>
                            <li v-for="task in taskList">
                                <div>
                                    {{ task.title }} - {{ task.details }}
                                </div>
                            </li>
                        </ul>
                    </div>
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
