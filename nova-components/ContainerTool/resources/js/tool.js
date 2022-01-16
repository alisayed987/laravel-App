Nova.booting((Vue, router, store) => {
  router.addRoutes([
    {
      name: 'container-tool',
      path: '/container-tool',
      component: require('./components/Tool'),
    },
  ])
})
