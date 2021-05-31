<template>
  <form @submit.prevent="handleSubmit">
      <Error v-if="error" :error="error"/>

      <h3>Sign Up</h3>

      <div class="form-group">
          <label>First Name</label>
          <input type="text" v-model="first_name" class="form-control" placeholder="First Name">
      </div>

      <div class="form-group">
          <label>Last Name</label>
          <input type="text" v-model="last_name" class="form-control" placeholder="Last Name">
      </div>

      <div class="form-group">
          <label>Email</label>
          <input type="email" v-model="email" class="form-control" placeholder="Email">
      </div>

      <div class="form-group">
          <label>Password</label>
          <input type="password" v-model="password" class="form-control" placeholder="Password">
      </div>

      <div class="form-group">
          <label>Confirm Password</label>
          <input type="password" v-model="password_confirm" class="form-control" placeholder="Confirm Password">
      </div>

      <button class="btn btn-primary btn-block">Sign Up</button>
  </form>
</template>

<script>
import axios from 'axios'
import Error from './Error'

export default {
    name: 'Register',
    data() {
        return {
            first_name: '',
            last_name: '',
            email: '',
            password: '',
            password_confirm: '',
            error: ''
        }
    },
    components: {
        Error
    },
    methods: {
        async handleSubmit() {
            try {
                await axios.post('register', {
                    first_name: this.first_name,
                    last_name: this.last_name,
                    email: this.email,
                    password: this.password,
                    password_confirm: this.password_confirm,
                })

                this.$router.push('/login')
            }catch(e){
                this.error = 'Error occurred, please re-check your data'
            }
        }
    }
}
</script>