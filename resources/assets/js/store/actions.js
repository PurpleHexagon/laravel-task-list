import types from './mutation-types'
import axios from 'axios'

export default {
    resetState({commit}) {
        commit(types.resetState)
    },
    fetchTasks({commit}) {
        return axios.get(
          '/api/tasks'
        ).then((res) => {
            commit('addTasksToStore', { 'tasks': res.data })
        })
    },
    addTask({commit}, payload) {
        const { task } = payload

        return axios.post(
          '/api/tasks',
          task
        ).then((res) => {
            commit('addTaskToStore', { 'task': res.data })
        })
    },
    toggleTaskComplete({commit}, payload) {
        const {isComplete, id} = payload

        return axios.put(
          `/api/tasks/${id}`,
          {
              is_complete: isComplete,
          }
        )
    }
}
