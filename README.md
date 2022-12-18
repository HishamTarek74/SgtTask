# Sgt Task
## Mini-CRM Task

### To Run The Project
- run following steps

```
clone repo  
```
```
cd to task path and 
```
```
copy .env.example to .env and configure db info
```
```
run composer install && php artisan key:generate 
```

```
run php artisan migrate --db:seed
```

```
run php artisan storage:link
```
- visit : http://localhost:8000
- email : admin@admin.com
- password : password

### Note
- There is One EndPoint to get TopCompanies BasedOn Revenue 
  
