import * as esbuild from "esbuild";
import { sassPlugin } from "esbuild-sass-plugin";
import postcss from "postcss";
import autoprefixer from "autoprefixer";

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
