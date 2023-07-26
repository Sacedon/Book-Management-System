<script setup>
import { ref, defineComponent, onMounted } from 'vue';
import { Link } from "@inertiajs/inertia-vue3";
import AppLayout from '@/Layouts/AppLayout.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import DangerButton from '@/Components/DangerButton.vue';
import TextInput from "@/Components/TextInput.vue";

const search = ref(null);
defineComponent({
    AppLayout,
    PrimaryButton,
    DangerButton,
});
defineProps({
    books: Object
});

const onSearch = (search) => {
    location.href = `/books?search=${search}`;
}
onMounted(() => {
    const params = new URLSearchParams(window.location.search);
    const searchQuery = params.get('search');
    search.value = searchQuery;
});
</script>

<template>
    <AppLayout title="Books">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Book Management
            </h2>
        </template>

        <div class="py-10">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="w-full flex">
                    <div class="w-1/2">
                        <Link :href="route('books.create')">
                        <PrimaryButton>
                            Add New Book
                        </PrimaryButton>
                        </Link>
                        <Link :href="route('books.trashed')">
                        <PrimaryButton class="ml-4">
                            Trashed Book
                        </PrimaryButton>
                        </Link>
                    </div>
                    <div class="w-1/2">
                        <TextInput id="search" type="text" class="block w-full" placeholder="Search Books..."
                            v-model="search" @keyup.enter="onSearch(search)" />
                    </div>
                </div>
                <div class="bg-blue-200 overflow-hidden shadow-xl sm:rounded-lg mt-8">
                    <div class="flex flex-col">
                        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="inline-block min-w-full sm:px-6 lg:px-8">
                                <div class="overflow-hidden">
                                    <table class="min-w-full text-center">
    <thead class="bg-blue-200">
        <tr>
            <th scope="col" class="px-6 py-4 text-sm font-bold text-gray-900">
                ID
            </th>
            <th scope="col" class="px-6 py-4 text-sm font-bold text-gray-900">
                Book Title
            </th>
            <th scope="col" class="px-6 py-4 text-sm font-bold text-gray-900">
                Book Library
            </th>
            <th scope="col" class="px-6 py-4 text-sm font-bold text-gray-900">
                Book Publisher
            </th>
            <th scope="col" class="px-6 py-4 text-sm font-bold text-gray-900">
                Book Category
            </th>
            <th scope="col" class="px-6 py-4 text-sm font-bold text-gray-900">
                Year
            </th>
            <th scope="col" class="px-6 py-4 text-sm font-bold text-gray-900">
                Action
            </th>
        </tr>
    </thead>
    <tbody>
        <tr v-for="book in books" :key="book.id" class="transition duration-300 ease-in-out hover:bg-blue-100">
            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                {{ book.id }}
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 font-normal">
                {{ book.title }}
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 font-normal">
                {{ book.library_name }}
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 font-normal">
                {{ book.publisher_name }}
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 font-normal">
                {{ book.category_name }}
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 font-normal">
                {{ book.year }}
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-center">
                <div class="flex justify-center space-x-2">
                    <a :href="route('books.edit', book.id)" class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded">
                        Edit
                    </a>
                    <a :href="route('books.destroy', book.id)" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded">
                        Remove
                    </a>
                    <a :href="'/books/email/' + book.id" class="border border-gray-300 px-3 py-1 rounded shadow text-sm text-gray-900 hover:bg-blue-200">
                        Send Email
                    </a>
                    <a :href="'/books/pdf/' + book.id" target="_blank" class="border border-gray-300 px-3 py-1 rounded shadow text-sm text-green-900 hover:bg-green-200">
                        Pdf
                    </a>
                </div>
            </td>
        </tr>
    </tbody>
</table>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
