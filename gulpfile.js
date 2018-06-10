var gulp 		= require('gulp'),
	sass 		= require('gulp-sass'),
	concat 		= require('gulp-concat'),
	useref 		= require('gulp-useref'),
	gulpif 		= require('gulp-if'),
	uglify 		= require('gulp-uglify'),
	cssnano 	= require('gulp-cssnano'),
	imagemin 	= require('gulp-imagemin'),
	cache 		= require('gulp-cache'),
	del 		= require('del'),
	runSequence = require('run-sequence'),
	browserSync = require('browser-sync').create();

gulp.task('default', function (callback)
{
	console.log('Running Default Task...');
});
