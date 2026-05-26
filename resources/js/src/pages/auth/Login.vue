<template>
  <div class="min-h-screen flex items-center justify-center bg-gray-100">
    <div class="w-full max-w-md bg-white p-6 rounded-xl shadow">

      <h2 class="text-2xl font-bold mb-6 text-center">Login</h2>

      <form @submit.prevent="login">

        <!-- Email -->
        <div class="mb-4">
          <label class="block mb-1 text-sm">Email</label>
          <input
            v-model="email"
            type="email"
            class="w-full border p-2 rounded"
            placeholder="Email"
          />
        </div>

        <!-- Password -->
        <div class="mb-4">
          <label class="block mb-1 text-sm">Password</label>
          <input
            v-model="password"
            type="password"
            class="w-full border p-2 rounded"
            placeholder="Password"
          />
        </div>

        <!-- Error -->
        <p v-if="error" class="text-red-500 text-sm mb-2">
          {{ error }}
        </p>

        <!-- Button -->
        <button
          type="submit"
          class="w-full bg-blue-600 text-white py-2 rounded"
          :disabled="loading"
        >
          {{ loading ? 'Logging in...' : 'Login' }}
        </button>

      </form>

    </div>
  </div>
</template>

<script setup>
import { ref } from "vue";
import { useRouter } from "vue-router";
import http from '../../../api/http.js';

const router = useRouter();

const email = ref("");
const password = ref("");
const loading = ref(false);
const error = ref(null);

const login = async () => {
  loading.value = true;
  error.value = null;

  try {
    const response = await http.post("/login", {
      email: email.value,
      password: password.value,
    });

    const token = response.data.token;

    // Save token
    localStorage.setItem("token", token);

    // ❌ REMOVE THIS (not needed anymore)
    // http interceptor handles it automatically

    // Redirect
    router.push("/dashboard");

  } catch (err) {
    error.value =
      err.response?.data?.message || "Login failed";
  } finally {
    loading.value = false;
  }
};
</script>