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

                            <router-link class="nav-link" :to="{name:'login'}">
                                Login
                            </router-link>
                            <router-link class="nav-link" :to="{name:'register'}">
                                Register
                            </router-link>


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
    export default {
        name: "App.vue"
    }
</script>

<style scoped>

</style>



