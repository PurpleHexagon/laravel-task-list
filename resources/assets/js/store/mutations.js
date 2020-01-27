import types from './mutation-types'
import {initialState} from './state'

export default {
    [types.resetState](state) {
        const initial = initialState()
        Object.keys(state).forEach(key => {
            state[key] = initial[key]
        })
    },
    [types.addTasksToStore](state, payload) {
        state.tasks = payload.tasks
    },
    [types.addTaskToStore](state, payload) {
        state.tasks.push(payload.task)
    }
}
