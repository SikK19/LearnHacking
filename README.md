# LearnHacking

### Generate SSL Certificate

```
openssl req -x509 -nodes -newkey rsa:2048 -keyout ssl/private/server.key -out ssl/certs/server.crt -subj "/CN=localhost" -days 5000
```
