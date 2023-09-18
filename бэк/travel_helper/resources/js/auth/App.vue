<template>
  <div class="surface-ground flex align-items-center justify-content-center min-h-screen min-w-screen overflow-hidden">
    <div class="flex flex-column align-items-center justify-content-center">


        <template>
    <div class="card flex justify-content-center">
        <span class="p-float-label">
            <InputText id="username" v-model="value" />
            <label for="username">Username</label>
        </span>
    </div>
</template>

<script setup>
import { ref } from 'vue';

const value = ref(null);
</script>


    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue'

const loading = ref(false)
const user = ref({
  email: null,
  password: null,
})
const errors = ref([])

const reset = () => {
  user.value = {}
  errors.value = []
}

const login = () => {
  loading.value = true

  axios.get('/sanctum/csrf-cookie').then(() => {
    axios.post('/api/login', {
      email: user.value.email,
      password: user.value.password,
    }).then(() => {
          reset()
          window.location.href = '/app'
        },
    ).catch(e => {
      if (e.response.data.errors) {
        errors.value = e.response.data.errors
        loading.value = false
      }
    })
  })
}
</script>
