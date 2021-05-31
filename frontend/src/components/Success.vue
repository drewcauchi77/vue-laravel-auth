<template>
  <div class="alert alert-success" role="alert">
        {{ success }}
    </div>
</template>

<script>
export default {
    name: 'Success',
    props: ['success']
}
</script>