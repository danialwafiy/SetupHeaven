<template>
    <div class="w-full bg-white min-h-screen">
        <div class="w-full bg-indigo-500 text-white">
          <div class="max-w-7xl mx-auto py-6 flex items-center">
            <inertia-link :href="'/'" class="text-3xl font-bold text-white"
                >SETUPHEAVEN</inertia-link
            >
            <div class="w-full flex justify-end items-center">
                <div class="text-base font-lighter">About Us</div>
                <button
                    class="text-base font-lighter ml-12 bg-white p-2 rounded text-indigo-500 w-32 text-center"
                    @click="isShowLogin = true"
                     v-if="!$page.props.user"
                >
                    Login
                </button>
                <button
                    class="text-base font-lighter ml-12 bg-white p-2 rounded text-indigo-500 w-32 text-center"
                    @click="logout"
                    v-else
                >
                    {{$page.props.user.name}}
                </button>
            </div>
          </div>
        </div>
        <div class="max-w-7xl mx-auto py-8">
            <slot></slot>
        </div>
        <div
            class="fixed inset-0 flex items-center justify-center"
            v-if="isShowLogin"
        >
            <div
                class="flex jusitify-center items-center bg-white opacity-80 inset-0 fixed w-full z-10"
                @click="isShowLogin = false"
            ></div>
            <Login @hideLogin="isShowLogin=false"/>
        </div>
        <footer
            class="bg-indigo-500 p-6 font-semibold text-white text-sm text-center"
        >
            <i class="far fa-copyright"></i> 2021 SETUPHEAVEN
        </footer>
    </div>
</template>

<script>
import Login from "../Pages/Auth/Login.vue";

export default {
    components: {
        Login,
    },
    data() {
        return {
            isShowLogin: false,
        };
    },
    methods:{
        logout() {
            this.$inertia.post(route('logout'));
        },
    },
    mounted(){
        if(location.href == window.location.origin + '/login' )
            this.isShowLogin = true
    }
};
</script>
