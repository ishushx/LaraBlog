<?php
namespace Deployer;

require 'recipe/laravel.php';

// Project name
set('application', 'my_project');

// Project repository
set('repository', 'git@github.com:ishushx/LaraBlog.git');

// [Optional] Allocate tty for git clone. Default value is false.
set('git_tty', true);

// Shared files/dirs between deploys
add('shared_files', []);
add('shared_dirs', []);

// Writable dirs by web server
add('writable_dirs', []);


// Hosts

host('47.100.182.233')
    ->user('deployer') // 这里填写 deployer
    // 并指定公钥的位置
    ->identityFile('~/.ssh/deployerkey')
    // 指定项目部署到服务器上的哪个目录
    ->set('deploy_path', '/var/www/LaraBlog');

// Tasks

task('build', function () {
    run('cd {{release_path}} && build');
});

// [Optional] if deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');

// Migrate database before symlink new release.

before('deploy:symlink', 'artisan:migrate');

