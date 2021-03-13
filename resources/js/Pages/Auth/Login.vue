<template>
    <div
        class="lg:w-1/5 md:w-1/2 p-10 border-2 border-indigo-500 bg-white z-20 mx-auto rounded"
    >
        <div
            class="text-4xl text-indigo-500 font-bold tracking-wider text-center"
        >
            LOGIN
        </div>
        <jet-validation-errors class="my-6" />

        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
            {{ status }}
        </div>

        <form @submit.prevent="submit" class="mt-10">
            <div>
                <label for="email" class="text-indigo-500">Email</label>
                <input
                    type="email"
                    class="w-full bg-transparent border-0 border-b-2 border-indigo-500 focus:ring-0 outline-none text-xl text-gray-400 py-2"
                    v-model="form.email"
                    required
                    autofocus
                />
            </div>

            <div class="mt-4">
                <label for="password" class="text-indigo-500">Password</label>
                <input
                    type="password"
                    class="w-full bg-transparent border-0 border-b-2 border-indigo-500 focus:ring-0 outline-none text-xl text-gray-400 py-2"
                    v-model="form.password"
                    required
                    autocomplete="current-password"
                />
            </div>

            <div class="block mt-4">
                <label class="flex items-center">
                    <jet-checkbox
                        name="remember"
                        v-model:checked="form.remember"
                    />
                    <span class="ml-2 text-sm text-gray-600">Remember me</span>
                </label>
            </div>

            <div class="flex items-center justify-center mt-6">
                <inertia-link
                    v-if="canResetPassword"
                    :href="route('password.request')"
                    class="underline text-sm text-gray-600 hover:text-gray-900"
                >
                    Forgot your password?
                </inertia-link>

                <button
                    :class="{ 'opacity-25': form.processing }"
                    :disabled="form.processing"
                    type="submit"
                    class="mt-5 font-lighter bg-indigo-500 p-3 rounded text-white hover:bg-white hover:text-indigo-500 border hover:border-indigo-500 transition duration-500 w-32 text-center"
                >
                    Log in
                </button>
            </div>
        </form>
    </div>
</template>

<script>
import JetAuthenticationCard from "@/Jetstream/AuthenticationCard";
import JetAuthenticationCardLogo from "@/Jetstream/AuthenticationCardLogo";
import JetButton from "@/Jetstream/Button";
import JetInput from "@/Jetstream/Input";
import JetCheckbox from "@/Jetstream/Checkbox";
import JetLabel from "@/Jetstream/Label";
import JetValidationErrors from "@/Jetstream/ValidationErrors";

export default {
    components: {
        JetAuthenticationCard,
        JetAuthenticationCardLogo,
        JetButton,
        JetInput,
        JetCheckbox,
        JetLabel,
        JetValidationErrors,
    },

    props: {
        canResetPassword: Boolean,
        status: String,
    },

    data() {
        return {
            form: this.$inertia.form({
                email: "",
                password: "",
                remember: false,
            }),
        };
    },

    methods: {
        submit() {
            this.form
                .transform((data) => ({
                    ...data,
                    remember: this.form.remember ? "on" : "",
                }))
                .post(this.route("login"), {
                    onFinish: () => this.form.reset("password"),
                    onSuccess: () => this.$emit('hideLogin'),
                });
        },
    },
};
</script>
