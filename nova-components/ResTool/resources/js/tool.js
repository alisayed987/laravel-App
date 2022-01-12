Nova.booting((Vue, router, store) => {
  Vue.component('res-tool', require('./components/Tool')),
  Vue.component('table=component', require('./components/TableComponent.vue'))
})
