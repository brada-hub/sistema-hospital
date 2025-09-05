const routes = [
  // Login y Register (fuera del layout)
  {
    path: '/',
    name: 'root',
    redirect: '/login',
  },
  {
    path: '/login',
    name: 'login',
    component: () => import('src/pages/PageLogin.vue'),
  },

  // Dashboard y rutas protegidas (dentro del MainLayout)
  {
    path: '/dashboard',
    component: () => import('layouts/MainLayout.vue'),
    children: [
      {
        path: '',
        name: 'dashboard',
        component: () => import('pages/PageDashboard.vue'),
        meta: { requiresAuth: true },
      },
      {
        path: 'pacientes',
        name: 'pacientes',
        component: () => import('pages/PagePacientes.vue'),
        meta: { requiresAuth: true },
      },
      // Ruta de usuarios eliminada temporalmente
    ],
  },

  // Fallback 404
  {
    path: '/:catchAll(.*)*',
    name: 'error404',
    component: () => import('pages/ErrorNotFound.vue'),
  },
]

export default routes
