Nova.booting((Vue, router, store) => {
  Vue.component('res-tool', require('./components/Tool')),
  Vue.component('table-component', require('./components/TableComponent.vue'))
  Vue.component('label-input', require('./components/LabelInput.vue'))
})
