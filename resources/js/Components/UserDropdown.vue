<script setup lang="ts">
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import { UserKey } from '@/keys';
import { inject } from 'vue';

const findUser = inject(UserKey);

if (!findUser) {
	throw new Error('User context is not provided');
}

const { user } = findUser;
</script>

<template>
	<Dropdown align="right" width="48">
		<template #trigger>
			<span class="inline-flex rounded-2xl">
				<button
					type="button"
					class="inline-flex items-center rounded-2xl border border-transparent px-4 py-2 font-semibold leading-4 text-[#010326] transition duration-150 ease-in-out hover:bg-[#116EBF] hover:text-[#D5F2F2] focus:outline-none dark:text-[#D5F2F2] dark:hover:bg-[#1F82BF] dark:hover:text-[#010326]"
				>
					{{ user.name }}

					<svg
						class="-me-0.5 ms-2 h-4 w-4"
						xmlns="http://www.w3.org/2000/svg"
						viewBox="0 0 20 20"
						fill="currentColor"
					>
						<path
							fill-rule="evenodd"
							d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
							clip-rule="evenodd"
						/>
					</svg>
				</button>
			</span>
		</template>

		<template #content>
			<DropdownLink :href="route('dashboard')"> Dashboard </DropdownLink>
			<DropdownLink :href="route('profile.edit')"> Profile </DropdownLink>
			<DropdownLink :href="route('videos.index')">
				My Videos
			</DropdownLink>
			<DropdownLink :href="route('logout')" method="post" as="button">
				Log Out
			</DropdownLink>
		</template>
	</Dropdown>
</template>
