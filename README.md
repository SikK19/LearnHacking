# LearnHacking

### Generate SSL Certificate

```
openssl req -x509 -nodes -newkey rsa:2048 -keyout ssl/private/server.key -out ssl/certs/server.crt -subj "/CN=localhost" -days 5000
```

### Notes

- There is a nodejs API, but you dont really need it, just use your php backend for the react frontend
- There is no practical benefit in using a passphrase for the ssl certificate key, i removed it
- By mounting html/php files instead of copying you dont need to restart the server to see changes
- you can create vhosts in apache which act like separate server.
- by defining `MYSQL_DATABASE` for your mysql container it will create this database on initial startup
