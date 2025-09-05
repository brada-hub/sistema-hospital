<template>
  <q-layout view="lHh Lpr lFf">
    <q-page-container>
      <div class="flex flex-center q-pa-md bg-grey-2" style="min-height: 100vh">
        <q-card
          flat
          bordered
          class="row no-wrap shadow-10 rounded-borders overflow-hidden"
          style="max-width: 900px; width: 100%"
        >
          <!-- Panel izquierdo (Mi Hospital) -->
          <div
            class="col-6 bg-indigo-10 text-white flex flex-center column q-pa-lg"
            :class="$q.screen.lt.sm ? 'hidden' : 'col-6'"
          >
            <q-icon name="local_hospital" size="64px" color="teal-4" />
            <div class="text-h4 q-mt-md text-center">Mi Hospital</div>
            <div class="text-subtitle2 text-grey-4 q-mt-md text-center">
              Gestión integral de pacientes y personal médico con la mejor tecnología.
            </div>
          </div>

          <!-- Panel derecho (Formulario de login) -->
          <div class="col-6 flex flex-center" :class="$q.screen.lt.sm ? 'col-12' : 'col-6'">
            <q-card-section class="full-width q-pa-md q-pa-lg-none q-pa-sm-gt-sm">
              <div class="text-center q-mb-md">
                <div class="text-h5 text-indigo-10">Bienvenido</div>
                <div class="text-subtitle2 text-grey-6">Ingresa para administrar el sistema.</div>
              </div>

              <q-form @submit.prevent="handleLogin" class="q-gutter-sm q-gutter-md-gt-sm">
                <q-input
                  filled
                  v-model="email"
                  type="email"
                  placeholder="tu@correo.com"
                  dense
                  clearable
                  class="q-mb-sm q-mb-md-gt-sm"
                >
                  <template v-slot:prepend>
                    <q-icon name="mail_outline" color="grey-6" />
                  </template>
                </q-input>

                <q-input
                  filled
                  v-model="password"
                  :type="showPassword ? 'text' : 'password'"
                  placeholder="••••••••"
                  dense
                  class="q-mb-sm q-mb-md-gt-sm"
                >
                  <template v-slot:prepend>
                    <q-icon name="lock" color="grey-6" />
                  </template>
                  <template v-slot:append>
                    <q-icon
                      :name="showPassword ? 'visibility_off' : 'visibility'"
                      class="cursor-pointer"
                      @click="showPassword = !showPassword"
                    />
                  </template>
                </q-input>

                <div class="text-right q-mb-sm q-mb-md-gt-sm">
                  <q-btn flat dense color="teal" label="¿Olvidaste la contraseña?" />
                </div>

                <q-btn
                  type="submit"
                  color="teal"
                  label="Ingresar"
                  class="full-width q-mt-sm q-mt-md-gt-sm"
                  unelevated
                />
              </q-form>

              <div class="text-center q-mt-sm q-mt-md-gt-sm text-caption text-grey-6">
                ¿Tienes problemas?
                <q-btn flat dense label="Contacta a Soporte" color="teal" class="q-ml-xs" />
              </div>
            </q-card-section>
          </div>
        </q-card>
      </div>
    </q-page-container>
  </q-layout>
</template>

<script setup>
import { ref } from 'vue'

const email = ref('')
const password = ref('')
const showPassword = ref(false)

const handleLogin = () => {
  console.log('Login con', email.value, password.value)
}
</script>

<style scoped>
body {
  margin: 0;
  padding: 0;
  font-family: 'Poppins', sans-serif;
}
</style>
