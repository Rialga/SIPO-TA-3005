<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <label class="col-md-4 col-form-label text-md-right" style="color: #0C9A9A">{{pesan}}</label> <br>

                <div class="card">
                    <div class="card-header">Register</div>

                    <div class="card-body">

                        <form @submit.prevent="register" id="fregis">

                            <div class="form-group row">
                                <label for="userid" class="col-md-4 col-form-label text-md-right">User ID</label>

                                <div class="col-md-6">
                                    <input id="userid" type="text" class="form-control" name="userid"  v-model="registerdata.user_id" autofocus>

                                 </div>
                            </div>

                            <div class="form-group row">
                                <label for="usernama" class="col-md-4 col-form-label text-md-right">Nama Lengkap</label>

                                <div class="col-md-6">
                                    <input id="usernama" type="text" class="form-control" name="usernama" v-model="registerdata.user_nama">

                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="usermail" class="col-md-4 col-form-label text-md-right">E-mail</label>

                                <div class="col-md-6">
                                    <input id="usermail" type="text" class="form-control" name="usermail" v-model="registerdata.user_mail">

                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="useralamat" class="col-md-4 col-form-label text-md-right">Alamat</label>

                                <div class="col-md-6">
                                    <textarea id="useralamat" type="text" class="form-control" name="useralamat" v-model="registerdata.user_alamat"></textarea>

                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="userjob" class="col-md-4 col-form-label text-md-right">Pekerjaan</label>

                                <div class="col-md-6">
                                    <input id="userjob" type="text" class="form-control" name="userjob" v-model="registerdata.user_job">

                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="usernohp" class="col-md-4 col-form-label text-md-right">No HP</label>

                                <div class="col-md-6">
                                    <input id="usernohp" type="number" class="form-control" v-model="registerdata.user_phone">

                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="userrole" class="col-md-4 col-form-label text-md-right">Role</label>

                                <div class="col-md-6">
                                    <select id="userrole" name="userrole" class="form-control" v-model="registerdata.user_role">
                                        <option value="1">Admin</option>
                                        <option value="2">Penyewa</option>
                                    </select>

                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="userpassword" class="col-md-4 col-form-label text-md-right">Password</label>

                                <div class="col-md-6">
                                    <input id="userpassword" type="password" class="form-control" name="userpassword" required>

                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirm Password</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" v-model="registerdata.user_password"  required>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Register
                                    </button>
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
        data(){
          return{
              registerdata: {},
              pesan: ''
          }
        },
        methods: {
            register(){

                this.axios
                    .post('http://localhost:8000/api/auth/register', this.registerdata)
                    .then(response => (
                        console.log(response.data),
                        this.pesan = response.data
                     ))
                    .catch(error => console.log(error))
                    .finally(() => this.loading = false)

                this.registerdata = ''
            }
        }

    }
</script>
