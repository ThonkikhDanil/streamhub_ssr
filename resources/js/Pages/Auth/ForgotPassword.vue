<script setup lang="ts">
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import Layout from '@/Layouts/Layout.vue';
import { Head, useForm } from '@inertiajs/vue3';

defineProps<{
	title: string;
	status?: string;
}>();

const form = useForm({
	email: '',
});

const submit = () => {
	form.post(route('password.email'));
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
			<!-- <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
				Forgot your password? No problem. Just let us know your email
				address and we will email you a password reset link that will
				allow you to choose a new one.
			</div> -->
			<div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
				Забыли пароль? Нет проблем. Просто сообщите нам свой адрес
				электронной почты, и мы отправим вам ссылку для сброса пароля,
				которая позволит вам выбрать новый.
			</div>

			<div
				v-if="status"
				class="mb-4 text-sm font-medium text-green-600 dark:text-green-400"
			>
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

				<div class="mt-4 flex items-center justify-end">
					<PrimaryButton
						:class="{ 'opacity-25': form.processing }"
						:disabled="form.processing"
					>
						Отправить ссылку для сброса пароля
					</PrimaryButton>
				</div>
			</form>
		</div>
	</Layout>
</template>
