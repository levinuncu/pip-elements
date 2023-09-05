import * as esbuild from "esbuild";
import { sassPlugin } from "esbuild-sass-plugin";
import postcss from "postcss";
import autoprefixer from "autoprefixer";
import vuePlugin from "esbuild-plugin-vue3";

await esbuild.build({
  entryPoints: ["./assets/styles/main.scss"],
  outfile: "src/Resources/public/css/main.css",
  minify: true,
  plugins: [
    sassPlugin({
      async transform(source) {
        const { css } = await postcss([autoprefixer()]).process(source);
        return css;
      },
    }),
  ],
});

// await esbuild.build({
//   entryPoints: ["./assets/vue/**"],
//   outdir: "src/Resources/public/vue",
//   minify: true,
//   bundle: true,
//   splitting: true,
//   format: "esm",
//   chunkNames: "LOL",
//   plugins: [vuePlugin()],
// });
