<template>
  <form @submit.prevent="handleSubmit">
      <Error v-if="error" :error="error"/>
      
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

      <p class="forgot-password text-right">
          <router-link to="forgot">Forgot password?</router-link>
      </p>
  </form>
</template>

<script>
import axios from 'axios'
import Error from './Error'

export default {
    name: 'Login',
    data() {
        return {
            email: '',
            password: '',
            error: ''
        }
    },
    components: {
        Error
    },
    methods: {
        async handleSubmit() {
            try{
                const response = await axios.post('login', {
                    email: this.email,
                    password: this.password
                })

                localStorage.setItem('token', response.data.token)
                this.$store.dispatch('user', response.data.user)
                this.$router.push('/')
            }catch(e){
                this.error = 'Invalid email/password¬'
            }
        }
    }
}
</script>