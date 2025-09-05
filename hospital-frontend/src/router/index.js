import { defineRouter } from '#q-app/wrappers'
import { createRouter, createMemoryHistory, createWebHistory, createWebHashHistory } from 'vue-router'
import routes from './routes'
import { useUserStore } from 'stores/user'

export default defineRouter(function () {
  const createHistory = process.env.SERVER
    ? createMemoryHistory
    : process.env.VUE_ROUTER_MODE === 'history'
      ? createWebHistory
      : createWebHashHistory

  const Router = createRouter({
    scrollBehavior: () => ({ left: 0, top: 0 }),
    routes,
    history: createHistory(process.env.VUE_ROUTER_BASE),
  })

  // Guard global
  Router.beforeEach((to, from, next) => {
    const userStore = useUserStore()
    userStore.loadUser() // carga desde localStorage

    if (to.meta.requiresAuth && !userStore.user) {
      return next('/login')
    }

    if ((to.path === '/login' || to.path === '/register') && userStore.user) {
      return next('/dashboard')
    }

    next()
  })

  return Router
})
