<script setup lang="ts">
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import LoginButton from '@/Components/LoginButton.vue';
import SearchRow from '@/Components/SearchRow.vue';
import ToggleDarkThemeButton from '@/Components/ToggleDarkThemeButton.vue';
import ToggleSidebarButton from '@/Components/ToggleSidebarButton.vue';
import { usePage } from '@inertiajs/vue3';
import { computed } from 'vue';
import UserDropdown from './UserDropdown.vue';

const page = usePage();
const user = computed(() => page.props.auth.user);
</script>

<template>
	<div
		class="sticky top-0 z-50 flex h-20 items-center justify-between bg-[#D5F2F2] p-4 dark:bg-[#010326]"
	>
		<div
			class="flex w-72 items-center justify-between text-2xl text-[#010326] dark:text-[#D5F2F2]"
		>
			<ToggleSidebarButton />
			<ToggleDarkThemeButton />
			<ApplicationLogo />
		</div>
		<SearchRow />
		<UserDropdown v-if="user" />
		<LoginButton v-else />
	</div>
</template>
