<template>
    <div>

        <div class="fixed bottom-6 right-6 z-50 flex items-center gap-3">

            <!-- Floating Message -->
            <div v-if="!open" class="relative px-4 py-3 rounded-2xl
               bg-white/95 backdrop-blur-md
               shadow-2xl border border-gray-100
               animate-bounce">

                <p class="text-sm font-semibold text-gray-800">
                    🤖 Need help? Chat with our AI assistant
                </p>

                <p class="text-xs text-gray-500 mt-1">
                    Instant replies • 24/7 support
                </p>

                <!-- Bubble Tail -->
                <div class="absolute top-1/2 -right-2 -translate-y-1/2
                   w-4 h-4 bg-white rotate-45 border-r border-b border-gray-100">
                </div>

            </div>

            <!-- AI Robot Button -->
            <button @click="open = true" class="group relative hover:scale-110 active:scale-95
               transition-all duration-300">

                <!-- Robot -->
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 80 80"
                    class="w-20 h-20 drop-shadow-[0_10px_25px_rgba(59,130,246,0.4)]">

                    <defs>
                        <linearGradient id="botGradient" x1="0%" y1="0%" x2="100%" y2="100%">
                            <stop offset="0%" stop-color="#8B5CF6" />
                            <stop offset="50%" stop-color="#3B82F6" />
                            <stop offset="100%" stop-color="#06B6D4" />
                        </linearGradient>

                        <linearGradient id="eyeGradient" x1="0%" y1="0%" x2="100%" y2="100%">
                            <stop offset="0%" stop-color="#FDE68A" />
                            <stop offset="100%" stop-color="#F59E0B" />
                        </linearGradient>
                    </defs>

                    <!-- Glow -->
                    <circle cx="40" cy="40" r="30" fill="url(#botGradient)" opacity="0.18" />

                    <!-- Head -->
                    <rect x="18" y="18" width="44" height="38" rx="14" fill="url(#botGradient)" />

                    <!-- Eyes -->
                    <circle cx="31" cy="37" r="5" fill="url(#eyeGradient)" />
                    <circle cx="49" cy="37" r="5" fill="url(#eyeGradient)" />

                    <!-- Smile -->
                    <path d="M30 48 Q40 56 50 48" stroke="white" stroke-width="3" fill="none" stroke-linecap="round" />

                    <!-- Antenna -->
                    <line x1="40" y1="10" x2="40" y2="18" stroke="#8B5CF6" stroke-width="4" stroke-linecap="round" />

                    <circle cx="40" cy="8" r="5" fill="#06B6D4" />

                    <!-- Side Dots -->
                    <circle cx="12" cy="36" r="4" fill="#3B82F6" />
                    <circle cx="68" cy="36" r="4" fill="#06B6D4" />

                </svg>

                <!-- Online Indicator -->
                <span class="absolute bottom-2 right-2 flex h-4 w-4">
                    <span
                        class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-4 w-4 bg-emerald-500 border-2 border-white"></span>
                </span>

            </button>

        </div>

        <div v-if="open" class="fixed bottom-6 right-6 z-50 w-[360px] h-[520px]
             bg-white/90 backdrop-blur-xl
             border border-gray-200 shadow-2xl
             rounded-3xl flex flex-col overflow-hidden
             animate-fadeUp">

            <div class="flex items-center justify-between px-4 py-3 border-b">
                <div class="font-semibold text-[#1d1d1f]">
                    AI Assistant
                </div>

                <button @click="open = false" class="text-gray-500 hover:text-black">
                    ✕
                </button>
            </div>

            <!-- MESSAGES -->
            <div class="flex-1 p-4 overflow-y-auto space-y-3">

                <div v-for="(msg, i) in messages" :key="i" :class="msg.role === 'user' ? 'text-right' : 'text-left'">

                    <span class="inline-block px-4 py-2 rounded-2xl text-sm" :class="msg.role === 'user'
                        ? 'bg-black text-white'
                        : 'bg-gray-100 text-gray-800'">
                        {{ msg.text }}
                    </span>

                </div>

            </div>

            <!-- INPUT -->
            <div class="p-3 border-t flex gap-2">

                <input v-model="input" @keyup.enter="send" placeholder="Ask something..."
                    class="flex-1 border rounded-full px-4 py-2 text-sm outline-none" @keyup.enter.prevent="send" />

                <button @click="send" class="w-10 h-10 rounded-full bg-black text-white
                 flex items-center justify-center
                 hover:scale-105 active:scale-95 transition">
                    ➤
                </button>

            </div>

        </div>

    </div>
</template>

<script setup>
import { ref } from "vue";
import { ChatAPI } from "../../../stores/chatAPi.js"; // <-- your API file

const open = ref(false);
const input = ref("");
const loading = ref(false);

const messages = ref([
    { role: "ai", text: "Hi 👋 I’m your AI shopping assistant. Ask me anything!" }
]);

const send = async () => {
    if (!input.value.trim() || loading.value) return;

    const userMessage = input.value;

    // push user message instantly
    messages.value.push({
        role: "user",
        text: userMessage
    });

    input.value = "";
    loading.value = true;

    try {
        // call Laravel API (LLM)
        const res = await ChatAPI.sendMessage(userMessage);
        const arko = await ChatAPI.ddhere()
        console.log(arko);
        messages.value.push({
            role: "ai",
            text: res.data.reply
        });

    } catch (error) {
        messages.value.push({
            role: "ai",
            text: "⚠️ Sorry, something went wrong. Try again."
        });
    } finally {
        loading.value = false;
    }
};
</script>

<style>
@keyframes fadeUp {
    from {
        opacity: 0;
        transform: translateY(20px) scale(0.95);
    }

    to {
        opacity: 1;
        transform: translateY(0) scale(1);
    }
}

.animate-fadeUp {
    animation: fadeUp 0.25s ease-out;
}
</style>