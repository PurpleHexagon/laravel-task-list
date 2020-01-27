import types from './mutation-types'
import axios from 'axios'
import Vue from 'vue'

export default {
    resetState({commit}) {
        commit(types.resetState)
    },
    fetchTasks({commit}) {
        return axios.get(
          '/api/tasks'
        ).then((res) => {
            commit('addTasksToStore', { 'tasks': res.data })
        }).catch(() => {
            Vue.notify({
                type: 'error',
                title: 'Todo list',
                text: 'An error occurred whilst fetching tasks'
            })
        })
    },
    addTask({commit}, payload) {
        const { task } = payload

        return axios.post(
          '/api/tasks',
          task
        ).then((res) => {
            Vue.notify({
                type: 'success',
                title: 'Todo list',
                text: 'The task was added successfully'
            })

            commit('addTaskToStore', { 'task': res.data })
        }).catch(() => {
            Vue.notify({
                type: 'error',
                title: 'Todo list',
                text: 'An error occurred whilst adding task'
            })
        })
    },
    updateTask({commit}, payload) {
        const {task, id} = payload

        return axios.put(
          `/api/tasks/${id}`,
          task
        ).then(() => {
          Vue.notify({
              type: 'success',
              title: 'Todo list',
              text: 'The task status was updated'
          })
        })
        .catch(() => {
            Vue.notify({
                type: 'error',
                title: 'Todo list',
                text: 'An error occurred whilst updated task'
            })
        })
    }
}
