<template>
    <div>
        <h1 v-if="user">Hi {{ user.first_name }} {{ user.last_name }}</h1>
        <h1 v-if="!user">Hello Guest</h1>
    </div>
</template>

<script>
export default {
    name: 'Home',
    props: ['user']
}
</script>

<style>
    h1{
        text-align: center;
        text-transform: uppercase;
    }
</style>