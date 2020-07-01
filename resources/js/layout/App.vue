<template>

    <div>
            <!--Nav Bar-->
            <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                <div class="container">

                        <router-link class="nav-link" :to="{name:'home'}">
                            Laravel
                        </router-link>

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" >
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <!-- Authentication Links -->
                          <template v-if="authenticated">
                              <a>
                                  {{user.user_id}}
                              </a>
                                <router-link class="nav-link" :to="{name:'register'}">
                                    Logout
                                </router-link>
                            </template>

                            <template v-else>
                                <router-link class="nav-link" :to="{name:'login'}">
                                    Login
                                </router-link>
                                <router-link class="nav-link" :to="{name:'register'}">
                                    Register
                                </router-link>
                            </template>

                        </ul>

                    </div>
                </div>
            </nav>

               <!--Content-->
            <main class="py-4">
                   <router-view></router-view>
            </main>
    </div>
</template>
<script>
    import { mapGetters } from 'vuex'
    export default {
        name: "App.vue",

        computed: {
            ...mapGetters({
                'authenticated': 'auth/authenticated',
                'user': 'auth/user'
            })
        }

    }
</script>

<style scoped>

</style>



