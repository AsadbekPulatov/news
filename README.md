NEWS
==
Requirements
1. PHP version must be: 8.2
2. Composer version: >=2.5.1


Installation
1. Copy <code>.env.example</code> to <code>.env</code> and set db configs
2. <code>composer i</code>
3. <code>php artisan key:generate</code>
4. <code>php artisan migrate</code>
5. <code>php artisan serve</code>

API endpoints
___
1. <code>/api/login</code>
2. <code>/api/register</code>
3. <code>/api/logout</code>
___
1. <code>/api/v1/news</code>
2. <code>/api/v1/categories</code>
