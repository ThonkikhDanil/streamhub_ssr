import vue from '@vitejs/plugin-vue';
import laravel from 'laravel-vite-plugin';
import { vite as vidstack } from 'vidstack/plugins';
import { defineConfig } from 'vite';

export default defineConfig({
	plugins: [
		laravel({
			input: 'resources/js/app.ts',
			ssr: 'resources/js/ssr.ts',
			refresh: true,
		}),
		vue({
			template: {
				transformAssetUrls: {
					base: null,
					includeAbsolute: false,
				},
				compilerOptions: {
					isCustomElement: (tag) => tag.startsWith('media-'),
				},
			},
		}),
		vidstack(),
	],
});
