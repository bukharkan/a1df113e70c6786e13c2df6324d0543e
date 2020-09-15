# CODE-CHALLENGE-REST-API-PHP-WITH-DOCKER

Code Challenge | REST-API | Sender Email | Docker 
<img src="https://i.ibb.co/r7f0Fqx/document-9.jpg" alt="document-9" border="0">

```
1. REST-API PHP
2. POSTGRES DATABASE
3. Background Job
4. SMTP
5. OAuth2
```
# RUN APPS WITH DOCKER

```
$ docker-compose build
$ docker-compose up -d
```
<img src="https://i.ibb.co/fH7Vg1f/document-4.jpg" alt="document-4" border="0">

# USE API WITH POSTMAN

```
GET TOKEN
open postman app
use POST url : http://localhost/token.php
with body :
  x-www-form-urlencoded
  and key : 
    grant_type : client_credentials
    client_id : arkan
    client_secret : arkan123
```

<img src="https://i.ibb.co/F6ppgxC/document-1.jpg" alt="document-1" border="0">

```
SEND EMAIL
open postman app
use POST url : http://localhost/sendEmail.php
with body :
  form-data
  and key : 
    mail_to : kynawy@getnada.com
    mail_from : admin@warunks.com
    subject : PROMO LAJADAY 9.9
    body : Klik Link dibawah ini untuk konfirmasi email
  and Authorization
    - OAuth 2.0
    - Copy & Paste Access Token from GET TOKEN
```
<img src="https://i.ibb.co/4K5XYSf/document-2.jpg" alt="document-2" border="0">
<img src="https://i.ibb.co/nnPRySt/document-3.jpg" alt="document-3" border="0">

# LOOKING DB WITH PGADMIN

```
Login page
open url http://localhost:5050 with your browser
default user : 
   email : admin@warunks.com
   password : admin123
```
<img src="https://i.ibb.co/ftJRCxf/document-5.jpg" alt="document-5" border="0">

```
Add Server 
tab general : 
   name : mydb
tab connection :
   host : postgres
   username : dev
   password : secret
```
<img src="https://i.ibb.co/CnZxwjD/document-6.jpg" alt="document-6" border="0">
<img src="https://i.ibb.co/1Tk60bV/document-7.jpg" alt="document-7" border="0">

```
GET DATA FROM TABLE
right click on public and select Query Tool
then input query SELECT * FROM QUEUE
execute click icon lightning
```

<img src="https://i.ibb.co/GH5hPkb/document-8.jpg" alt="document-8" border="0">

# BACKGROUND JOB ( WORKER )

```
background job i make manual
background job will execute row if the row sent is null
you can check on worker.php & you can check log in file log-workers.txt or http://localhost/log-workers.txt

```
# SMTP

```
i use ELASTICEMIAL
you can check on /src/includes/Models/Api.php line 58

```

# OAuth2

```
Oauth2 i use for authentication API Send email
```













