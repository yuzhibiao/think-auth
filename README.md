# think-auth
thinkphp5.1 权限认证类库

## 安装
> composer require topthink/think-captcha:dev-master


##使用
1. 拷贝当前类库下database/migrations的所有文件到项目根目录的database/migrations中

2. 在命令行下，切换到项目根目录，执行命令导入表结构
   `php think migrate:run`

3. 在项目中使用类库 
   `$auth = yuzhibiao\auth::instance();`

