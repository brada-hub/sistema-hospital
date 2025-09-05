import { defineStore } from 'pinia'
import { api } from 'boot/axios'

export const useUserStore = defineStore('user', {
  state: () => ({
    user: null,
    token: null,
    loading: false,
  }),
  actions: {
    async login(email, password) {
      this.loading = true
      try {
        const { data } = await api.post('/login', { email, password })
        this.user = data.user
        this.token = data.access_token

        localStorage.setItem('token', this.token)
        localStorage.setItem('user', JSON.stringify(this.user))
        api.defaults.headers.common['Authorization'] = `Bearer ${this.token}`

        return true
      } catch (err) {
        throw err.response?.data?.message || 'Error en login'
      } finally {
        this.loading = false
      }
    },
    async logout() {
      try {
        if (this.token) {
          await api.post(
            '/logout',
            {},
            {
              headers: { Authorization: `Bearer ${this.token}` },
            },
          )
        }
      } catch {
        /* ignorar error */
      }

      this.user = null
      this.token = null
      localStorage.removeItem('token')
      localStorage.removeItem('user')
      delete api.defaults.headers.common['Authorization']
    },

    loadUser() {
      const token = localStorage.getItem('token')
      const user = localStorage.getItem('user')

      if (token && user) {
        this.token = token
        this.user = JSON.parse(user)
        api.defaults.headers.common['Authorization'] = `Bearer ${token}`
      } else {
        this.user = null
        this.token = null
        delete api.defaults.headers.common['Authorization']
      }
    },
  },
})
