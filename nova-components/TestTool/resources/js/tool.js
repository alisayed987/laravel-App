import modA from "./moduleA";
require("../../node_modules/bootstrap/dist/css/bootstrap.min.css");
require("../../node_modules/bootstrap/dist/css/bootstrap.css");

Nova.booting((Vue, router, store) => {
  store.registerModule('moduleA',modA)
  router.addRoutes([
    {
      name: 'test-tool',
      path: '/test-tool',
      component: require('./components/Tool'),
    },
  ]),
  Vue.component('table-component', require('./components/TableComponent.vue')),
  Vue.component('label-input', require('./components/LabelInput.vue'))
  

})

