#!/bin/bash
# opinionated npm package downloader

packages=(
    browserify
    gulp
    gulp-autoprefixer
    gulp-cached
    gulp-changed
    gulp-concat
    gulp-copy
    gulp-filter
    gulp-if
    gulp-imagemin
    gulp-jshint
    gulp-notify
    gulp-order
    gulp-rename
    gulp-replace
    gulp-sass
    gulp-size
    gulp-sourcemaps
    gulp-streamify
    gulp-substituter
    gulp-uglify
    gulp-usemin
    gulp-util
    jshint-stylish
    main-bower-files
    pretty-hrtime
    run-sequence
    vinyl-source-stream
    watchify
)

is_npm()
{
    echo 'npm command does not exists.'
    exit 1
}

create_package_json()
{
    npm init
}

install_packages()
{
    npm i -D ${packages[@]}
}

if ! npm_var="$(type -p "npm")" || [ -z $npm_var ]; then
    is_npm; exit 1;
else
    if [ -e package.json ]; then
        install_packages
    else
        create_package_json && install_packages
    fi
fi