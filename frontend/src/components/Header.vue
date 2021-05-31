<template>
  <div>
      <nav class="navbar navbar-expand navbar-light fixed-top">
          <div class="container">
              <router-link to="/" class="navbar-brand">Home</router-link>
              <div class="collapse navbar-collapse">
                  <ul class="navbar-nav ml-auto" v-if="!user">
                        <li class="nav-item">
                            <router-link to="/login" class="nav-link">Login</router-link>
                        </li>
                        <li class="nav-item">
                            <router-link to="/register" class="nav-link">Sign Up</router-link>
                        </li>
                  </ul>
                  <ul class="navbar-nav ml-auto" v-if="user">
                        <li class="nav-item">
                            <a href="javascript:void(0)" @click="handleClick" class="nav-link">Log out</a>
                        </li>
                  </ul>
              </div>
          </div>
      </nav>
  </div>
</template>

<script>
export default {
    name: 'Header',
    props: ['user'],
    methods: {
        handleClick() {
            localStorage.removeItem('token')
            this.$router.push('/login')
        }
    }
}
</script>

<style>

</style>