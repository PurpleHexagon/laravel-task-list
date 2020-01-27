export default [
  'resetState',
  'addTasksToStore',
  'addTaskToStore',
].reduce((acc, value) => {
  acc[value] = value
  return acc
}, {})
