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
	<div class="min-h-screen">
		<Header />
		<Sidebar />
		<slot />
	</div>
</template>
