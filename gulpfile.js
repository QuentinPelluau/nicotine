/// G U L P   C O N F I G  -------------------------------------

//Le fichier gulpfile.js s'occupe de gérer les tâches à réaliser, leurs options, leurs sources et destination.
'use strict';// Script entier en mode strict

// HELP
//www.npmjs.com/package/
//www.alsacreations.com/tuto/lire/1686-introduction-a-gulp.html
//www.alsacreations.com/tuto/lire/1685-ebauche-de-workflow-gulp-taches-uncss-includes-critical-css.html

// TODO
//fichiers de dev dans le dossier du theme a supprimer pour mis en prod
//www.npmjs.com/package/gulp-mamp

// LIVERELOAD
// Si bug refresh chrome, vider cache fichier



/// T E R M I N A L -------------------------------------

//cd dossier de travail
//$npm install //pour installer les dependances //node modules
//$ gulp


/// R E Q U I R E S -------------------------------------

// Definition des variables pour dependencies du package.json
var gulp = require('gulp'),
    autoprefixer = require('gulp-autoprefixer'),
    cleancss = require('gulp-clean-css'),
    concat = require('gulp-concat'),
    cssbeautify = require('gulp-cssbeautify'),
    csscomb = require('gulp-csscomb'),
    csso = require('gulp-csso'),
    imagemin = require('gulp-imagemin'),
    inject = require('gulp-inject'),
    plugins = require('gulp-load-plugins'),
    rename = require('gulp-rename'),
    sass = require('gulp-sass'),
    sourcemaps = require('gulp-sourcemaps'),
    uglify = require('gulp-uglify'),
    livereload = require('gulp-livereload');
    purify = require('gulp-purifycss');



// gulp-load-plugins desactiver car pb avec livereload

// Include plugins // appel tous les plugins du package.json
//www.npmjs.com/package/gulp-load-plugins
//ajouter plugins. devant chaque plugin ensuite
// var plugins = require('gulp-load-plugins')({
//   DEBUG: true, // when set to true, the plugin will log info to console. Useful for bug reporting and issue debugging
//   pattern: '*', // the glob(s) to search for // pour plugin avec autre prefix que gulp- ou gulp.
//   lazy: true // whether the plugins should be lazy loaded on demand
// });



/// V A R I A B L E S -------------------------------------

// Variables de chemins des dossiers et fichiers ciblés
var assets = './assets'; // dossier de travail
var prod = '.'; // dossier de destination, livrable, dist
var mainscss = (assets+ '/styles/main.scss'); // fichier Scss principal
//var mainjs = (assets + '/scripts/main.js'); // fichier Js principal
var alljs = (assets + '/scripts/*.js'); // fichier Js principal


/// T A S K S -------------------------------------

// Tâche par défaut
gulp.task('default', ['build']);

// Tâche #1  - CSS
gulp.task('styles', function () {
  return gulp.src(mainscss)
    .pipe(sass({outputStyle:'expanded'}).on('error', sass.logError)) // Compiler Sass vers CSS
    .pipe(csscomb()) // Réordonner les propriétés
    .pipe(cssbeautify({indent: '  '}))// Ré-indenter et reformater 
    .pipe(autoprefixer())// Ajouter automatiquement les préfixes CSS3
    .pipe(rename('style.css'))
    .pipe(cleancss({ specialComments : 1 }))// minify CSS 
    // denotes a number of /*! ... */ comments preserved; defaults to `all`
    //moyen de garder le commentaire definition du THEME WP
    //.pipe(sourcemaps.write('.', {includeContent: false})) //?
    .pipe(gulp.dest(prod))
    .pipe(livereload())
});

    //.pipe(plugins.csso()) // CSS minifier with structural optimizations
    // .pipe(plugins.rename({ suffix: '.min' }))


// Tâche #2 - Scripts / JS
gulp.task('scripts', function() {
  return gulp.src(alljs)
    .pipe(concat('script.js'))
    .pipe(uglify({mangle:false}))
    .pipe(gulp.dest(prod))
    .pipe(livereload())
});


// Tâche #3 - Build
// prod = css minify + js minify
gulp.task('build', ['styles', 'scripts']);

// Watcher
// surveille *scss et *js et lance ['la tache'] en fonction
gulp.task('watch', function () {
  livereload.listen();
  gulp.watch(assets + '/styles/**/*.scss', ['styles']); // tout les .scss dans styles
  gulp.watch(assets + '/scripts/**/*.js', ['scripts']);
});

// Tâche #4 - Remove unused css
gulp.task('purifycss', function() {
  return gulp.src('./style.css') //CSS Source
    .pipe(purify(['./*.js', './public/**/*.html']))
    .pipe(gulp.dest(assets);
});


