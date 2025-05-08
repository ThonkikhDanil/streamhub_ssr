<script setup lang="ts">
import NavLink from '@/Components/NavLink.vue';
import { SidebarKey } from '@/keys';
import { inject, Transition } from 'vue';

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

	<Transition name="overlay">
		<div
			v-if="isSidebar"
			@click="toggleSidebar()"
			class="fixed h-screen w-screen bg-black/35"
		></div>
	</Transition>
</template>

<style>
.overlay-enter-active,
.overlay-leave-active {
	transition: opacity 0.5s ease-out;
}

.overlay-enter-from,
.overlay-leave-to {
	opacity: 0;
}

.overlay-leave-active {
	pointer-events: none;
}
</style>
