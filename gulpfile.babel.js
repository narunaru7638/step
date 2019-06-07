import gulp from 'gulp';//タスクランナー
import webpackConfig from './webpack.config.js';
import webpack from 'webpack-stream';
import notify from 'gulp-notify';// gulpタスクがエラーになった時に通知してくれる
import plumber from 'gulp-plumber'; // gulpタスクがエラーになっても止まらずに実行してくれる
import eslint from 'gulp-eslint';
import minifycss from 'gulp-minify-css';
import sass from 'gulp-sass';
import changed from 'gulp-changed';
import imagemin from 'gulp-imagemin';
import browserify from 'browserify';
import browserSync from 'browser-sync';
import source from 'vinyl-source-stream';

// npmで出るエラー、警告集
// https://qiita.com/M-ISO/items/d693ac892549fc95c14c
// chromeのreact-dev-toolをインストールしておくといい
// https://chrome.google.com/webstore/detail/react-developer-tools/fmkadmapgofadopljbjfkapdkoienihi/related

//////////vue



// gulpタスクの作成
gulp.task('build', function(){
  gulp.src('resources/js/app.js')
    .pipe(plumber({
      errorHandler: notify.onError("Error: <%= error.message %>")
    }))
    .pipe(webpack(webpackConfig))
    .pipe(gulp.dest('public/js/'));
});

gulp.task('browser-sync', function() {
  browserSync.init({
    server: {
      baseDir: "./public", // 対象ディレクトリ
      index: "index.html" //indexファイル名
    }
  });
});
gulp.task('bs-reload', function () {
  browserSync.reload();
});


gulp.task('eslint', function() {
    return gulp.src(['resources/**/*.js']) // lint のチェック先を指定
    .pipe(plumber({
      // エラーをハンドル
      errorHandler: function(error) {
        const taskName = 'eslint';
        const title = '[task]' + taskName + ' ' + error.plugin;
        const errorMsg = 'error: ' + error.message;
        // ターミナルにエラーを出力
        console.error(title + '\n' + errorMsg);
        // エラーを通知
        notify.onError({
          title: title,
          message: errorMsg,
          time: 3000
        });
      }
    }))
    .pipe(eslint({ useEslintrc: true })) // .eslintrc を参照
    .pipe(eslint.format())
    .pipe(eslint.failOnError())
    .pipe(plumber.stop());
});

//CSS圧縮
gulp.task('minify-css', function() {
    return gulp.src("./resources/css/*.css")
        .pipe(minifycss())
        .pipe(gulp.dest('./public/css/'));

});

// sassをコンパイル
gulp.task('sass', function(){
    gulp.src('./resources/scss/*.scss')
        .pipe(sass())
        .pipe(gulp.dest('./resources/css/'));

});

// 画像圧縮
// 圧縮前と圧縮後のディレクトリを定義
var paths = {
    srcDir : 'resources',
    dstDir : 'public'
};
// jpg,png,gif画像の圧縮タスク
gulp.task('imagemin', function(){
    var srcGlob = paths.srcDir + '/**/*.+(jpg|jpeg|png|gif)';
    var dstGlob = paths.dstDir;
    return gulp.src( srcGlob )
        .pipe(changed( dstGlob ))
        .pipe(imagemin([
        imagemin.gifsicle({interlaced: true}),
        imagemin.jpegtran({progressive: true}),
        imagemin.optipng({optimizationLevel: 5})
    ]
                      ))
        .pipe(gulp.dest( dstGlob ));
});



// Gulpを使ったファイルの監視
gulp.task('default', ['eslint', 'build', 'browser-sync', 'sass', 'minify-css', 'imagemin'], function(){
    gulp.watch('./resources/**/*.js', ['build']);
    gulp.watch("./public/*.html", ['bs-reload']);
    gulp.watch("./public/**/*.+(js|css)", ['bs-reload']);
    gulp.watch("./resources/**/*.js", ['eslint']);
//    gulp.watch('./src/**/*.scss', ['sass']);
//    gulp.watch('./src/**/*.css', ['minify-css']);
//    gulp.watch('/**/*.+(jpg|jpeg|png|gif)', ['imagemin']);


//    gulp.watch(paths.srcDir + './src/**/*.scss', ['sass']);
//    gulp.watch(paths.srcDir + './src/**/*.css', ['minify-css']);
//    gulp.watch(paths.srcDir + '/**/*.+(jpg|jpeg|png|gif)', ['imagemin']);

    gulp.watch(paths.srcDir + '/**/*.scss', ['sass']);
//        gulp.watch(paths.srcDir + '/scss/*.scss', ['sass']);

    gulp.watch(paths.srcDir + '/**/*.css', ['minify-css']);
    gulp.watch(paths.srcDir + '/**/*', ['imagemin']);
//    gulp.watch("./src/**/*.+(jpg|jpeg|png|gif)", ['imagemin']);


});
