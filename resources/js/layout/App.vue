<template>

    <div>
            <!--Nav Bar-->
            <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                <div class="container">

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">

                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mr-auto">
                            <router-link class="nav-link" :to="{name:'home'}">
                                Home
                            </router-link>
                        </ul>

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
            <br><br>
            <!--Content-->
            <div class="container">
               <router-view></router-view>
            </div>
    </div>
</template>
<script>
    export default {
        name: "App.vue"
    }
</script>

<style scoped>

</style>
