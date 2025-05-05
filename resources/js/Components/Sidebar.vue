<script setup lang="ts">
import NavLink from '@/Components/NavLink.vue';
import { SidebarKey } from '@/keys';
import { inject } from 'vue';

const sidebar = inject(SidebarKey);

if (!sidebar) {
	throw new Error('Sidebar context is not provided');
}

const { isSidebar, toggleSidebar } = sidebar;
</script>

<template>
	<div
		class="absolute left-[-192px] z-20 flex h-screen flex-col bg-[#D5F2F2] transition-transform duration-500 ease-out dark:bg-[#010326]"
		:class="{ 'translate-x-48': isSidebar }"
	>
		<NavLink
			:href="route('welcome')"
			:active="route().current('welcome')"
			class="mt-0"
		>
			<div class="mr-3">
				<i class="fi fi-br-home" />
			</div>
			<div>Главная</div>
		</NavLink>
		<NavLink
			:href="route('subscriptions')"
			:active="route().current('subscriptions')"
		>
			<div class="mr-3">
				<i class="fi fi-br-folder" />
			</div>
			<div>Подписки</div>
		</NavLink>
	</div>

	<div
		@click="toggleSidebar()"
		class="fixed w-screen h-screen transition-all duration-500 ease-out bg-transparent"
		:class="{ 'bg-black/35': isSidebar }"
	></div>
</template>
