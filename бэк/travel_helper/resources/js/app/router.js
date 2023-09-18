import { createWebHistory, createRouter } from 'vue-router'
import AppLayout from './layout/AppLayout.vue'
import Error404 from './Error404.vue'
import Home from './pages/index.vue'
import Event from './pages/event/index.vue'
import Users from './pages/user/index.vue'
import Ftp from './pages/ftp/index.vue'
import Clients from './pages/client/index.vue'
import Client from './pages/client/client.vue'
import System from './pages/system/index.vue'

const routers = [
  {
    path: '/app/:pathMatch(.*)*',
    component: Error404,
    name: '404',
  },
  {
    path: '/app',
    component: AppLayout,
    children: [
      {
        path: '/app',
        name: 'app',
        component: Home,
        meta: { title: 'Главная' },
      },
      {
        path: '/app/event',
        name: 'event',
        component: Event,
        meta: { title: 'События' },
      },
      {
        path: '/app/users',
        name: 'user',
        component: Users,
        meta: { title: 'Пользователи' },
      },
      {
        path: '/app/clients',
        name: 'clients',
        component: Clients,
        meta: { title: 'Клиенты' },
      },
      {
        path: '/app/client/:id',
        name: 'client',
        component: Client,
        meta: { title: 'Клиент' },
      },
      {
        path: '/app/ftp/:connection',
        name: 'ftp',
        component: Ftp,
        meta: { title: 'Организации' },
      },
      {
        path: '/app/system',
        name: 'system',
        component: System,
        meta: { title: 'Служебная' },
      },
    ],
  },
]

const router = createRouter({
  history: createWebHistory(),
  routes: [
    ...routers,
  ],
  linkActiveClass: 'active-route-link',
  linkExactActiveClass: 'exact-active-route-link',
})

export default router
