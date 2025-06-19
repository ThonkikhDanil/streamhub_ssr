<script setup lang="ts">
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import Layout from '@/Layouts/Layout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

defineProps<{
	title: string;
}>();

const form = useForm({
	name: '',
	email: '',
	password: '',
	password_confirmation: '',
});

const submit = () => {
	form.post(route('register'), {
		onFinish: () => {
			form.reset('password', 'password_confirmation');
		},
	});
};
</script>

<template>
	<Head :title="title" />
	<Layout>
		<template #title>
			{{ title }}
		</template>

		<div
			class="mx-auto mt-10 w-full overflow-hidden bg-[#D5F2F2] px-6 py-4 shadow-md dark:bg-[#010326] sm:max-w-md sm:rounded-lg"
		>
			<form @submit.prevent="submit">
				<div>
					<InputLabel for="name" value="Имя" />

					<TextInput
						id="name"
						type="text"
						class="mt-1 block w-full"
						v-model="form.name"
						required
						autofocus
						autocomplete="name"
					/>

					<InputError class="mt-2" :message="form.errors.name" />
				</div>

				<div class="mt-4">
					<InputLabel for="email" value="Электронная почта" />

					<TextInput
						id="email"
						type="email"
						class="mt-1 block w-full"
						v-model="form.email"
						required
						autocomplete="username"
					/>

					<InputError class="mt-2" :message="form.errors.email" />
				</div>

				<div class="mt-4">
					<InputLabel for="password" value="Пароль" />

					<TextInput
						id="password"
						type="password"
						class="mt-1 block w-full"
						v-model="form.password"
						required
						autocomplete="new-password"
					/>

					<InputError class="mt-2" :message="form.errors.password" />
				</div>

				<div class="mt-4">
					<InputLabel
						for="password_confirmation"
						value="Повторить пароль"
					/>

					<TextInput
						id="password_confirmation"
						type="password"
						class="mt-1 block w-full"
						v-model="form.password_confirmation"
						required
						autocomplete="new-password"
					/>

					<InputError
						class="mt-2"
						:message="form.errors.password_confirmation"
					/>
				</div>

				<div class="mt-4 flex items-center justify-end">
					<Link
						:href="route('login')"
						class="rounded-md text-sm text-gray-600 underline hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:text-gray-400 dark:hover:text-gray-100 dark:focus:ring-offset-gray-800"
					>
						Уже зарегистрированы?
					</Link>

					<PrimaryButton
						class="ms-4"
						:class="{ 'opacity-25': form.processing }"
						:disabled="form.processing"
					>
						Зарегистрироваться
					</PrimaryButton>
				</div>
			</form>
		</div>
	</Layout>
</template>
