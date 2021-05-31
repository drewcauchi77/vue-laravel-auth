<template>
    <form @submit.prevent="handleSubmit">
        <Success v-if="success" :success="success" />
        <Error v-if="error" :error="error"/>

        <h3>Forgot Password</h3>

        <div class="form-group">
            <label>Email</label>
            <input type="email" v-model="email" class="form-control" placeholder="Email" />
        </div>

        <button class="btn btn-primary btn-block">Submit</button>
    </form>
</template>

<script>
import axios from 'axios'
import Success from './Success'
import Error from './Error'

export default {
    name: 'Forgot',
    data() {
        return {
            email: '',
            message: '',
            success: '',
            error: ''
        }
    },
    components: {
        Success,
        Error
    },
    methods: {
        async handleSubmit() {
            try{
                await axios.post('forgot', {
                    email: this.email
                })

                this.success = 'Message has been sent'
                this.error = ''
            }catch(e){
                this.error = 'An error has occurred'
                this.success = ''
            }
        }
    }
}
</script>