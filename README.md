#### To start the ctf, you have to build the container
`docker build -t ctf .`
#### run it
`docker run -d -p 8080:80 sqli-ctf`
#### and access it on `http://localhost:8080/`

---
# CTF structure

### index.html 
- is a web app with login form and an admin page that contains uploaded in special directory (admin) files

### users.db 
- is a sqlite3 database containing users logins and passwords. there is only one yet, admin:S3cur3D-p4$$w0rd

### login.php
- php script for login form interaction

### /folder
- directory contains flag for lfi 

### /admin
- directory contains uploaded by admin files

