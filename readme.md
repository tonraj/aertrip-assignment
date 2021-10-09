# Aertrip India Ltd - Backend PHP Developer - Take Home Assignment

## Aertrip EMS

This EMS tool is made with PHP Laravel.

### Problem Statement

A company has multiple departments and each employee works in one of the departments. Each employee may have multiple contact numbers and addresses. Create REST API using any PHP framework for performing various operations like creating departments, Add, edit, view, delete, search employees.

API Base : https://localhost:8000/api

Features:

1. Proper Validation
2. DB Relationship
3. Sample Seeder is Included

```
php artisan migrate
php artisan db:seed
php artisan serve
```

> Postman Collection  is Included in root of repo named **Aertrip EMS**

Routes :

For better understanding use POSTMAN.

1. /ems/departments
2. /ems/department/add
3. /ems/department/{id}/edit
4. /ems/department/{id}/delete
5. /ems/employs
6. /ems/department/add/employ
7. /ems/employ/{id}/edit
8. /ems/employ/{id}/delete
9. /ems/employ/add/contact
10. /ems/employ/add/address
11. /ems/employ/edit/{id}/contact
12. /ems/employ/edit/{id}/address
13. /ems/employ/{id}/contact
14. /ems/employ/{id}/address
