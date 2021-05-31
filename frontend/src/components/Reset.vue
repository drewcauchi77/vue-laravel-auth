<template>
  <form @submit.prevent="handleSubmit">
      <h3>Reset Password</h3>

      <div class="form-group">
          <label>Password</label>
          <input type="password" v-model="password" class="form-control" placeholder="Password">
      </div>

      <div class="form-group">
          <label>Password Confirm</label>
          <input type="password" v-model="password_confirm" class="form-control" placeholder="Confirm Password">
      </div>

      <button class="btn btn-primary btn-block">Submit</button>
  </form>
</template>

<script>
import axios from 'axios'

export default {
    name: 'Reset',
    data() {
        return {
            password: '',
            password_confirm: ''
        }
    },
    methods: {
        async handleSubmit() {
            await axios.post('reset', {
                password: this.password,
                password_confirm: this.password_confirm,
                token: this.$route.params.token
            })

            this.$router.push('/login')
        }
    }
}
</script>