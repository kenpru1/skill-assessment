// import { defineConfig } from 'vite';  
// import laravel from 'laravel-vite-plugin';  
// import vue from '@vitejs/plugin-vue';  
// import path from 'path';  
  
  
// export default defineConfig({  
//     "plugins":[  
//         laravel({  
//             "input": [  
//                 "resources/css/app.css",  
//                 "resources/js/app.ts"  
//             ],  
//             "refresh": true  
//         }),  
//         vue({  
//             template: {  
//                 transformAssetUrls: {  
//                     base: null,  
//                     includeAbsolute: false,  
//                 },            
// 			},       
// 		 })    
// 	 ],
//  });
import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';

export default defineConfig({
    plugins: [
        laravel({
            input: 'resources/js/app.ts',
            ssr: 'resources/js/ssr.js',
            refresh: true,
        }),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
    ],
});