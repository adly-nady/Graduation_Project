<script setup>
import { ref, defineProps } from 'vue';
import { useForm } from '@inertiajs/inertia-vue3';
import { route } from 'ziggy-js'; 

const form = useForm({
    title: '',
    content: '',
});

const props = defineProps({ success: String }); 

const submit = () => {
    form.post(route('test.one'));
    console.log(props.success); 
};
</script>

<template>
    <div class="max-w-2xl mx-auto p-6 bg-white rounded-lg shadow">
        <h1 class="text-xl font-bold mb-4">Create a Post</h1>

        <!-- ✅ Fix success message display -->
        <div v-if="props.success" class="divs bg-green-200 text-green-700 p-2 rounded mb-4">
            Done Add
        </div>
        <div class="bg-blue-500 text-white p-4 rounded-lg">
            Tailwind يعمل بنجاح! 🚀
        </div>
        <form @submit.prevent="submit">
            <div class="mb-4">
                <label class="block text-gray-700">Title</label>
                <input v-model="form.title" type="text" class="w-full border rounded p-2">
                <div v-if="form.errors.title" class="text-red-500 text-sm">{{ form.errors.title }}</div>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700">Content</label>
                <textarea v-model="form.content" class="w-full border rounded p-2"></textarea>
                <div v-if="form.errors.content" class="text-red-500 text-sm">{{ form.errors.content }}</div>
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Submit</button>
        </form>
    </div>
</template>
