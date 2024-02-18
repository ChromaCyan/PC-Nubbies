<script setup>
    import { Head, Link, useForm } from '@inertiajs/vue3';
import AuthenticationCard from '@/Components/AuthenticationCard.vue';
import AuthenticationCardLogo from '@/Components/AuthenticationCardLogo.vue';
import Checkbox from '@/Components/Checkbox.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { ref } from 'vue';

const form = useForm({
    name: '',
    email: '',
    address:'',
    phone:'',
    password: '',
    password_confirmation: '',
    age: '',
    gender: '',
    terms: false,
});


const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
/*
const isBuyerChecked = ref(false);
const isSellerChecked = ref(false);

const handleCheckboxChange = (checkbox) => {
    if (checkbox === 'buyer' && isBuyerChecked.value) {
        isSellerChecked.value = false;
    } else if (checkbox === 'seller' && isSellerChecked.value) {
        isBuyerChecked.value = false;
    }
};
*/

</script>
<template>

    <Head title="Register" />
    <AuthenticationCard>
        <template #logo>
            <AuthenticationCardLogo />
        </template>
        <form @submit.prevent="submit">
            <div>
                <InputLabel for="name" value="Name" />
                <TextInput id="name" v-model="form.name" type="text" class="mt-1 block w-full" required autofocus autocomplete="name" />
                <InputError class="mt-2" :message="form.errors.name" />
            </div>
            <div class="mt-4">
                <InputLabel for="email" value="Email" />
                <TextInput id="email" v-model="form.email" type="email" class="mt-1 block w-full" required autocomplete="username" />
                <InputError class="mt-2" :message="form.errors.email" />
            </div>
            <div class="mt-4">
                <InputLabel for="address" value="Address" />
                <TextInput id="address" v-model="form.address" type="text" class="mt-1 block w-full" required autofocus autocomplete="address" />
                <InputError class="mt-2" :message="form.errors.address" />
            </div>

            <!-- Phone -->
            <div class="mt-4">
                <InputLabel for="phone" value="Phone" />
                <TextInput id="phone" v-model="form.phone" type="tel" class="mt-1 block w-full" required autofocus autocomplete="tel" />
                <InputError class="mt-2" :message="form.errors.phone" />
            </div>

            <!-- Age -->
            <div class="mt-4">
                <InputLabel for="age" value="Age Range" />
                <select id="age" v-model="form.age" class="mt-1 block w-full px-4 py-2 rounded-md border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 dark:focus:border-gray-600 dark:focus:ring-offset-gray-800">
                    <option value="" disabled>Select your Age Range</option>
                    <option value="1" class="py-1">18-25</option>
                    <option value="2" class="py-1">26-35</option>
                    <option value="3" class="py-1">36-45</option>
                    <option value="4" class="py-1">46-55</option>
                    <option value="5" class="py-1">56+</option>
                </select>
                <InputError class="mt-2" :message="form.errors.age" />
            </div>
            
            <!-- Checkbox (buyer/seller) 
            <div>
                <div class="mt-4">
                    <label for="buyer" class="flex items-center cursor-pointer">
                        <input id="buyer" type="checkbox" v-model="isBuyerChecked" @change="handleCheckboxChange('buyer')" class="form-checkbox h-5 w-5 text-indigo-600">
                        <span class="ml-2 text-gray-700">Are you a buyer?</span>
                    </label>
                </div>
                <div class="mt-4">
                    <label for="seller" class="flex items-center cursor-pointer">
                        <input id="seller" type="checkbox" v-model="isSellerChecked" @change="handleCheckboxChange('seller')" class="form-checkbox h-5 w-5 text-indigo-600">
                        <span class="ml-2 text-gray-700">Are you a seller?</span>
                    </label>
                </div>
            </div>
            Checkbox (buyer/seller) -->

            <!-- Gender -->
            <div class="mt-4">
                <InputLabel for="gender" value="Gender" />
                <select id="gender" v-model="form.gender" class="mt-1 block w-full px-4 py-2 rounded-md border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 dark:focus:border-gray-600 dark:focus:ring-offset-gray-800">
                    <option value="" disabled>Select your Gender</option>
                    <option value="1" class="py-1">Male</option>
                    <option value="0" class="py-1">Female</option>
                    <option class="py-1">Firetruck</option>
                    <option class="py-1">Helicopter</option>
                    <option class="py-1">Xbox Controller</option>
                    <option class="py-1">Treadmill</option>
                    <option class="py-1">Josh Hutcherson</option>
                    <option class="py-1">Local McDonald worker</option>
                    <option class="py-1">Slave</option>
                </select>
                <InputError class="mt-2" :message="form.errors.gender" />
            </div>

            <div class="mt-4">
                <InputLabel for="password" value="Password" />
                <TextInput id="password" v-model="form.password" type="password" class="mt-1 block w-full" required autocomplete="new-password" />
                <InputError class="mt-2" :message="form.errors.password" />
            </div>

            <div class="mt-4">
                <InputLabel for="password_confirmation" value="Confirm Password" />
                <TextInput id="password_confirmation" v-model="form.password_confirmation" type="password" class="mt-1 block w-full" required autocomplete="new-password" />
                <InputError class="mt-2" :message="form.errors.password_confirmation" />
            </div>

            <div v-if="$page.props.jetstream.hasTermsAndPrivacyPolicyFeature" class="mt-4">
                <InputLabel for="terms">
                    <div class="flex items-center">
                        <Checkbox id="terms" v-model:checked="form.terms" name="terms" required />
                        <div class="ms-2">
                            I agree to the <a target="_blank" :href="route('terms.show')" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">Terms of Service</a> and <a target="_blank" :href="route('policy.show')" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">Privacy Policy</a>
                        </div>
                    </div>
                    <InputError class="mt-2" :message="form.errors.terms" />
                </InputLabel>
            </div>

            <div class="flex items-center justify-end mt-4">
                <Link :href="route('login')" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                Already registered?
                </Link>
                <PrimaryButton class="ms-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Register
                </PrimaryButton>
            </div>
        </form>
    </AuthenticationCard>
</template>
