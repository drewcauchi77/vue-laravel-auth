<template>
  <form @submit.prevent="handleSubmit">
      <h3>Login</h3>

      <div class="form-group">
          <label>Email</label>
          <input type="email" v-model="email" class="form-control" palceholder="Email">
      </div>

      <div class="form-group">
          <label>Password</label>
          <input type="password" v-model="password" class="form-control" palceholder="Password">
      </div>

      <button class="btn btn-primary btn-block">Login</button>
  </form>
</template>

<script>
import axios from 'axios'

export default {
    name: 'Login',
    data() {
        return {
            email: '',
            password: ''
        }
    },
    methods: {
        async handleSubmit() {
            const response = await axios.post('login', {
                email: this.email,
                password: this.password
            })

            localStorage.setItem('token', response.data.token)

            this.$router.push('/')
        }
    }
}
</script>

<style>

</style>