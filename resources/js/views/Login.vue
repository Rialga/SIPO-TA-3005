<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Login</div>

                    <div class="card-body">
                        <form @submit.prevent="login">
                            <div class="form-group row">
                                <label for="user_id" class="col-md-4 col-form-label text-md-right">User ID</label>

                                <div class="col-md-6">
                                    <input id="user_id" type="text" class="form-control" autofocus>

                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="user_password" class="col-md-4 col-form-label text-md-right">Password</label>

                                <div class="col-md-6">
                                    <input id="user_password" type="password" class="form-control" name="password" required autocomplete="current-password">

                                </div>
                            </div>


                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Login
                                    </button>

                                    <router-link class="btn-link" :to="{name:'register'}">
                                            Belum punya akun? Buat disini!
                                    </router-link>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        data () {
            return {
                user_id: '',
                user_password: ''
            }
        },
        methods: {
            login () {

            }
        }
    }
</script>

<style scoped>

</style>
