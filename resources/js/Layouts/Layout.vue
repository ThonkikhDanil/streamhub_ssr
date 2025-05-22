<script setup lang="ts">
import Header from '@/Components/Header.vue';
import Sidebar from '@/Components/Sidebar.vue';
import { SidebarKey } from '@/keys';
import { provide, ref } from 'vue';

const isSidebar = ref(false);

function toggleSidebar() {
	isSidebar.value = !isSidebar.value;
}

provide(SidebarKey, { isSidebar, toggleSidebar });
</script>

<template>
	<div class="min-h-screen bg-cyan-100 dark:bg-slate-950">
		<Header />
		<Sidebar />
		<div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
			<h2
				class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200"
			>
				<slot name="title" />
			</h2>
		</div>
		<slot />
	</div>
</template>
