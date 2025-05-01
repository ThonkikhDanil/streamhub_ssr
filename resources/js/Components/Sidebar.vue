<script setup lang="ts">
import NavLink from '@/Components/NavLink.vue';
import { inject } from 'vue';
import { SidebarKey } from '@/keys';

const sidebar = inject(SidebarKey);

if (!sidebar) {
	throw new Error('Sidebar context is not provided');
}

const { isSidebar, toggleSidebar } = sidebar;
</script>

<template>
	<div :class="['absolute', 'z-20', 'flex', 'transition-all', isSidebar ? 'visible' : 'hidden']">
		<div class="bg-[#D5F2F2] dark:bg-[#010326] h-screen flex flex-col">
			<NavLink :href="route('welcome')" :active="route().current('welcome')" class="mt-0">
				<div class="mr-3">
					<i class="fi fi-br-home" />
				</div>
				<div>Главная</div>
			</NavLink>
			<NavLink :href="route('subscriptions')" :active="route().current('subscriptions')">
				<div class="mr-3">
					<i class="fi fi-br-folder" />
				</div>
				<div>Подписки</div>
			</NavLink>
		</div>
	</div>

	<div @click="toggleSidebar()" :class="['fixed', 'z-10', 'w-screen', 'h-screen', 'transition-all', 'bg-black/25', isSidebar ? 'visible' : 'hidden']"></div>
</template>
