<template>

    <div class="form-group row mb-0">
        <div class="col-md-8 offset-md-4">
           <h1>Yash Login Sukses</h1>

            <button type="button" @click="logout()" v-if="isLogged">
                Logout
            </button>

        </div>
    </div>

</template>

<script>
    import { mapGetters } from 'vuex'

    export default {
        computed: {
            ...mapGetters([
                'isLogged'
            ])
        },

        methods: {
            logout () {
                this.$store.dispatch('logout')
            }
        }
    }
</script>

<style scoped>

</style>
