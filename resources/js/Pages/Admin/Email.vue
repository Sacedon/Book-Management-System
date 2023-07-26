<template>
    <Head title="Admin" />
    <AppLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Send Mail</h2>
        </template>
        <div v-if="props.message.success" class="py-5 rounded-lg text-green-600 bg-green-100 text-center">
            Information: {{ props.message.success }}
        </div>
        <div v-if="props.message.error" class="py-5 rounded-lg text-red-600 bg-red-100 text-center">
            Error: {{ props.message.error }}
        </div>
        <div class="py-12">
            <div class="flex justify-center items-center">
                <div class="p-4 rounded-lg bg-white shadow-sm w-1/4">
                    <h1 class="text-2xl text-center mb-10">Send email to all</h1>
                    <form @submit.prevent="submit">
                        <div class="mb-4">
                            <label for="subject" class="block font-semibold mb-1">Subject</label>
                            <input v-model="form.subject" type="text" id="subject" class="px-4 py-2 w-full rounded-md border-gray-300 focus:border-blue-500 focus:ring-blue-500">
                        </div>
                        <div class="mb-4">
                            <label for="message" class="block font-semibold mb-1">Message</label>
                            <textarea v-model="form.message" id="message" class="px-4 py-2 h-40 w-full rounded-md border-gray-300 focus:border-blue-500 focus:ring-blue-500"></textarea>
                        </div>
                        <div class="flex justify-end">
                            <button type="submit" class="px-6 py-2 text-white font-semibold rounded-md bg-blue-600 hover:bg-blue-700 focus:bg-blue-700">Send Mail</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<script setup>
    import AppLayout from '@/Layouts/AppLayout.vue';
    import { Head, useForm } from '@inertiajs/inertia-vue3';

    const form = useForm({
        subject: '',
        message: ''
    });

    const submit = () => {
        form.post('/admin/email');
        form.subject = '';
        form.message = '';
    };

    const props = defineProps({
        message: Object
    });
</script>

<style scoped>
    input:focus,
    textarea:focus {
        outline: none;
        border-color: #2563eb;
        box-shadow: 0 0 0 2px rgba(37, 99, 235, 0.2);
    }
</style>
