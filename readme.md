# Aertrip India Ltd - Backend PHP Developer - Take Home Assignment

## Aertrip EMS

This EMS tool is made with PHP Laravel.

### Problem Statement

A company has multiple departments and each employee works in one of the departments. Each employee may have multiple contact numbers and addresses. Create REST API using any PHP framework for performing various operations like creating departments, Add, edit, view, delete, search employees.

API Base : https://localhost:8000/api

Features:

1. Proper Validation
2. DB Relationship
3. Feature Tests
4. Sample Seeder is Included
5. Employees Pagination

```
php artisan migrate
php artisan test
php artisan db:seed
php artisan serve
```

> Postman Collection  is Included in root of repo named **Aertrip EMS**

Routes :

For better understanding refer POSTMAN.

1. /ems/departments
2. /ems/department/add
3. /ems/department/{department_id}/edit
4. /ems/department/{department_id}/delete
5. /ems/employs
6. /ems/department/add/employ
7. /ems/employ/{employ_id}/edit
8. /ems/employ/{employ_id}/delete
9. /ems/employ/add/contact
10. /ems/employ/add/address
11. /ems/employ/edit/{contact_id}/contact
12. /ems/employ/edit/{address_id}/address
13. /ems/employ/{contact_id}/contact
14. /ems/employ/{address_id}/address
15. /ems/department/{department_id}/get
16. /ems/employ/{employ_id}/get
