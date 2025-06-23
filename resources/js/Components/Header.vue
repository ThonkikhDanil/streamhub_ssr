<script setup lang="ts">
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import LoginButton from '@/Components/LoginButton.vue';
import SearchRow from '@/Components/SearchRow.vue';
import ToggleDarkThemeButton from '@/Components/ToggleDarkThemeButton.vue';
import ToggleSidebarButton from '@/Components/ToggleSidebarButton.vue';
import UserDropdown from '@/Components/UserDropdown.vue';
import { UserKey } from '@/keys';
import { inject } from 'vue';

const findUser = inject(UserKey);

if (!findUser) {
	throw new Error('User context is not provided');
}

const { user } = findUser;
</script>

<template>
	<div class="sticky top-0 z-50 bg-[#D5F2F2] shadow-sm dark:bg-[#010326]">
		<!-- Верхняя часть хедера -->
		<div class="h-16 px-3 py-2 sm:h-20 sm:px-4 sm:py-4">
			<div class="flex h-full items-center justify-between">
				<!-- Левая группа элементов -->
				<div
					class="flex items-center space-x-2 text-[#010326] dark:text-[#D5F2F2] sm:space-x-3"
				>
					<ToggleSidebarButton class="text-xl sm:text-2xl" />
					<ToggleDarkThemeButton class="text-xl sm:text-2xl" />
					<!-- Логотип скрыт на очень маленьких экранах -->
					<ApplicationLogo
						class="hidden text-xl sm:inline-block sm:text-2xl md:mx-2 2xl:text-4xl"
					/>
				</div>

				<!-- Поиск на больших экранах (скрыт на мобильных) -->
				<SearchRow
					class="hidden md:flex lg:absolute lg:left-1/2 lg:-translate-x-1/2 lg:transform"
				/>

				<!-- Правая группа элементов -->
				<div class="flex items-center">
					<UserDropdown v-if="user" />
					<LoginButton v-else />
				</div>
			</div>
		</div>

		<!-- Нижняя часть хедера - строка поиска на мобильных -->
		<div
			class="border-t border-[#B8E6E6] px-3 py-2 dark:border-[#1A1A3E] md:hidden"
		>
			<SearchRow class="w-full" />
		</div>
	</div>
</template>
