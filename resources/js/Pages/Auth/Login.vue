<script setup lang="ts">
import Checkbox from '@/Components/Checkbox.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import Layout from '@/Layouts/Layout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

defineProps<{
	title: string;
	canResetPassword?: boolean;
	status?: string;
}>();

const form = useForm({
	email: '',
	password: '',
	remember: false,
});

const submit = () => {
	form.post(route('login'), {
		onFinish: () => {
			form.reset('password');
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
			<div v-if="status" class="mb-4 text-sm font-medium text-green-600">
				{{ status }}
			</div>

			<form @submit.prevent="submit">
				<div>
					<InputLabel for="email" value="Электронная почта" />

					<TextInput
						id="email"
						type="email"
						class="mt-1 block w-full"
						v-model="form.email"
						required
						autofocus
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
						autocomplete="current-password"
					/>

					<InputError class="mt-2" :message="form.errors.password" />
				</div>

				<div class="mt-4 block">
					<label class="flex items-center">
						<Checkbox
							name="remember"
							v-model:checked="form.remember"
						/>
						<span
							class="ms-2 text-sm text-gray-600 dark:text-gray-400"
							>Запомнить меня</span
						>
					</label>
				</div>

				<div class="mt-4 flex items-center justify-end">
					<Link
						:href="route('register')"
						class="me-4 rounded-md text-sm text-gray-600 underline hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:text-gray-400 dark:hover:text-gray-100 dark:focus:ring-offset-gray-800"
					>
						Нет аккаунта?
					</Link>
					<Link
						v-if="canResetPassword"
						:href="route('password.request')"
						class="rounded-md text-sm text-gray-600 underline hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:text-gray-400 dark:hover:text-gray-100 dark:focus:ring-offset-gray-800"
					>
						Забыли пароль?
					</Link>

					<PrimaryButton
						class="ms-4"
						:class="{ 'opacity-25': form.processing }"
						:disabled="form.processing"
					>
						Войти
					</PrimaryButton>
				</div>
			</form>
		</div>
	</Layout>
</template>
