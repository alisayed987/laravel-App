import modA from "./moduleA"
Nova.booting((Vue, router, store) => {
  store.registerModule('moduleA',modA)
  router.addRoutes([
    {
      name: 'test-tool',
      path: '/test-tool',
      component: require('./components/Tool'),
    },
  ]),
  Vue.component('table-component', require('./components/TableComponent.vue'));
  

})

