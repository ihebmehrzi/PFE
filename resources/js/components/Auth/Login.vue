<template>

    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Login</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mx-3">


                <div class="md-form mb-4">
                    <i class="fas fa-envelope prefix grey-text"></i>

                    <input type="text"  class="form-control validate" v-model="form.email">
                    <label data-error="wrong" data-success="right" >Your email</label>
                </div>
                <div class="md-form mb-4">
                    <i class="fas fa-envelope prefix grey-text"></i>
                    <input type="email"  class="form-control validate" v-model="form.password">
                    <label data-error="wrong" data-success="right" >password</label>
                </div>

            </div>
            <div class="modal-footer d-flex justify-content-center">
                <button class="btn btn-indigo"  @click.prevent="login" data-dismiss="modal">Send<i class="fas fa-paper-plane-o ml-1"></i></button>

            </div>
        </div>
    </div>
</template>
<script type="text/javascript">
    // import Flash from '../../helpers/flash'
    // import Auth from '../../store/auth'
    // import { post } from '../../helpers/api'
    export default {
        data() {
            return {
                form: {
                    email: '',
                    password: ''
                },
                error: {},
                isProcessing: false
            }
        },
        methods: {
            login() {
                console.log('test btn email',this.form.email)
                console.log('test btn password ',this.form.password)



                this.isProcessing = true
                this.error = {}
                this.axios.post('api/auth/login', this.form)
                    .then((res) => {
                        if(res.data) {
                            // set token
                           // Auth.set(res.data.api_token, res.data.user_id)
                           // Flash.setSuccess('You have successfully logged in.')


                             console.log("ddddddddd ici ")

                           // localStorage.setItem("state","1")
                            this.$router.push('/container')
                        }
                        this.isProcessing = false
                    })
                    .catch((err) => {
                        if(err.response.status === 422) {
                            this.error = err.response.data
                        }
                        this.isProcessing = false
                    })
            }
        }
    }
</script>