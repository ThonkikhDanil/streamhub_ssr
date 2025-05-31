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
	<div class="sticky top-0 z-50 h-20 bg-[#D5F2F2] p-4 dark:bg-[#010326]">
		<div class="relative flex items-center justify-between">
			<div
				class="flex w-80 items-center justify-between text-2xl text-[#010326] dark:text-[#D5F2F2]"
			>
				<ToggleSidebarButton />
				<ToggleDarkThemeButton />
				<ApplicationLogo class="mx-2" />
			</div>
			<SearchRow class="absolute left-1/2 -translate-x-1/2 transform" />
			<UserDropdown v-if="user" />
			<LoginButton v-else />
		</div>
	</div>
</template>
