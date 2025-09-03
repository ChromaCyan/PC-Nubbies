<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

const form = useForm({
    name: '',
    email: '',
<<<<<<< HEAD
=======
    gender: '',
    age_range: '',
>>>>>>> 539b01a78333c5afd9b506c2a4e3d33686af6268
    password: '',
    password_confirmation: '',
});

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>
    <GuestLayout>
        <Head title="Register" />

<<<<<<< HEAD
        <form @submit.prevent="submit">
=======
        <form @submit.prevent="submit" class="max-w-md mx-auto mt-8">
>>>>>>> 539b01a78333c5afd9b506c2a4e3d33686af6268
            <div>
                <InputLabel for="name" value="Name" />

                <TextInput
                    id="name"
                    type="text"
<<<<<<< HEAD
                    class="mt-1 block w-full"
=======
                    class="mt-1 block w-full px-3 py-2 border rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
>>>>>>> 539b01a78333c5afd9b506c2a4e3d33686af6268
                    v-model="form.name"
                    required
                    autofocus
                    autocomplete="name"
                />

                <InputError class="mt-2" :message="form.errors.name" />
            </div>

            <div class="mt-4">
                <InputLabel for="email" value="Email" />

                <TextInput
                    id="email"
                    type="email"
<<<<<<< HEAD
                    class="mt-1 block w-full"
=======
                    class="mt-1 block w-full px-3 py-2 border rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
>>>>>>> 539b01a78333c5afd9b506c2a4e3d33686af6268
                    v-model="form.email"
                    required
                    autocomplete="username"
                />

                <InputError class="mt-2" :message="form.errors.email" />
            </div>
<<<<<<< HEAD
=======

            <div class="mt-4">
                <InputLabel for="gender" value="Gender" />

                <select
                    id="gender"
                    class="mt-1 block w-full px-3 py-2 border rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    v-model="form.gender"
                    required
                >
                    <option value="">Select Gender</option>
                    <option value="1">Male</option>
                    <option value="0">Female</option>
                </select>

                <InputError class="mt-2" :message="form.errors.gender" />
            </div>
>>>>>>> 539b01a78333c5afd9b506c2a4e3d33686af6268

            <div class="mt-4">
                <InputLabel for="age_range" value="Age Group" />

                <select
                    id="age_range"
                    class="mt-1 block w-full px-3 py-2 border rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    v-model="form.age_range"
                    required
                >
                    <option value="">Select Age Group</option>
                    <option value="1">18-24</option>
                    <option value="2">25-34</option>
                    <option value="3">35-45</option>
                    <option value="4">46-59</option>
                    <option value="5">60+</option>
                </select>

                <InputError class="mt-2" :message="form.errors.age_range" />
            </div>

            <div class="mt-4">
                <InputLabel for="password" value="Password" />

                <TextInput
                    id="password"
                    type="password"
<<<<<<< HEAD
                    class="mt-1 block w-full"
=======
                    class="mt-1 block w-full px-3 py-2 border rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
>>>>>>> 539b01a78333c5afd9b506c2a4e3d33686af6268
                    v-model="form.password"
                    required
                    autocomplete="new-password"
                />

                <InputError class="mt-2" :message="form.errors.password" />
            </div>

            <div class="mt-4">
                <InputLabel for="password_confirmation" value="Confirm Password" />

                <TextInput
                    id="password_confirmation"
                    type="password"
<<<<<<< HEAD
                    class="mt-1 block w-full"
=======
                    class="mt-1 block w-full px-3 py-2 border rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
>>>>>>> 539b01a78333c5afd9b506c2a4e3d33686af6268
                    v-model="form.password_confirmation"
                    required
                    autocomplete="new-password"
                />

                <InputError class="mt-2" :message="form.errors.password_confirmation" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <Link
                    :href="route('login')"
<<<<<<< HEAD
                    class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
=======
                    class="underline text-sm text-gray-600 hover:text-gray-900"
>>>>>>> 539b01a78333c5afd9b506c2a4e3d33686af6268
                >
                    Already registered?
                </Link>

                <PrimaryButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Register
                </PrimaryButton>
            </div>
        </form>
    </GuestLayout>
</template>
