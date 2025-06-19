<script setup lang="ts">
import DangerButton from '@/Components/DangerButton.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import Modal from '@/Components/Modal.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { useForm } from '@inertiajs/vue3';
import { nextTick, ref } from 'vue';

const confirmingUserDeletion = ref(false);
const passwordInput = ref<HTMLInputElement | null>(null);

const form = useForm({
	password: '',
});

const confirmUserDeletion = () => {
	confirmingUserDeletion.value = true;

	nextTick(() => passwordInput.value?.focus());
};

const deleteUser = () => {
	form.delete(route('profile.destroy'), {
		preserveScroll: true,
		onSuccess: () => closeModal(),
		onError: () => passwordInput.value?.focus(),
		onFinish: () => {
			form.reset();
		},
	});
};

const closeModal = () => {
	confirmingUserDeletion.value = false;

	form.clearErrors();
	form.reset();
};
</script>

<template>
	<section class="space-y-6">
		<header>
			<h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
				Удалить аккаунт
			</h2>

			<!-- <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
				Once your account is deleted, all of its resources and data will
				be permanently deleted. Before deleting your account, please
				download any data or information that you wish to retain.
			</p> -->
			<p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
				После удаления вашего аккаунта все его ресурсы и данные будут
				удалены навсегда. Перед удалением аккаунта загрузите любые
				данные или информацию, которые вы хотите сохранить.
			</p>
		</header>

		<DangerButton @click="confirmUserDeletion">
			Удалить аккаунт
		</DangerButton>

		<Modal :show="confirmingUserDeletion" @close="closeModal">
			<div class="p-6">
				<h2
					class="text-lg font-medium text-gray-900 dark:text-gray-100"
				>
					Вы уверены что вы хотите удалить ваш аккаунт?
				</h2>

				<!-- <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
					Once your account is deleted, all of its resources and data
					will be permanently deleted. Please enter your password to
					confirm you would like to permanently delete your account.
				</p> -->
				<p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
					После удаления вашего аккаунта все его ресурсы и данные
					будут удалены навсегда. Введите пароль, чтобы подтвердить,
					что вы хотите навсегда удалить свой аккаунт.
				</p>

				<div class="mt-6">
					<InputLabel
						for="password"
						value="Password"
						class="sr-only"
					/>

					<TextInput
						id="password"
						ref="passwordInput"
						v-model="form.password"
						type="password"
						class="mt-1 block w-3/4"
						placeholder="Пароль"
						@keyup.enter="deleteUser"
					/>

					<InputError :message="form.errors.password" class="mt-2" />
				</div>

				<div class="mt-6 flex justify-end">
					<SecondaryButton @click="closeModal">
						Закрыть
					</SecondaryButton>

					<DangerButton
						class="ms-3"
						:class="{ 'opacity-25': form.processing }"
						:disabled="form.processing"
						@click="deleteUser"
					>
						Удалить аккаунт
					</DangerButton>
				</div>
			</div>
		</Modal>
	</section>
</template>
