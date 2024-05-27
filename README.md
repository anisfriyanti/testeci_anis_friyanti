
# Project Title

A brief description of what this project does and who it's for


# testeci_anis_friyanti
declare this variable in .env in Frontend Project
```bash
APP_URL_WEB=http://127.0.0.1:8086/  *hostname frontend
APP_URL_API=http://127.0.0.1:8085/  *hostname Api
``` 

1. Test 1
API :
```bash 
curl --location --request GET 'http://127.0.0.1:8085/star?nominal=3&type=1' 
``` 
FRONTEND
```bash 
http://127.0.0.1:8086/star

```
Output :
```bash 
{
    "code": 200,
    "message": "data berhasil",
    "data": [
        "*",
        "**",
        "***"
    ]
}
```

*masih minus type 3

2. Test 2
API :
```bash 
curl --location --request GET 'http://127.0.0.1:8085/currency?money=20000' 
```
FRONTEND
```bash 
 http://127.0.0.1:8086/currency
 ```
Output : 
```bash 
{
    "code": 200,
    "message": "data berhasil",
    "data": {
        "currency": "Rp.",
        "decimal": "20,000",
        "integer": "20000",
        "terbilang": "dua puluh  ribu rupiah"
    }
}
 ```
 3. Test 4

 
 API :
 - read : 
 ```bash 
 curl --location --request GET 'http://127.0.0.1:8085/karyawan'\
  ```

- add: 
 ```bash 
 curl --location --request POST 'http://127.0.0.1:8085/karyawan' \
        --form 'nik="96387423"' \
        --form 'nama="fatimah sari"' \
        --form 'ttl="2023-01-20"' \
        --form 'alamat="Jakarta TIMUR"' \
        --form 'id_jabatan="3"'
  ```

- update : 
 ```bash 
 curl --location --request PUT 'http://127.0.0.1:8085/karyawan/9' \
 
        --header 'Content-Type: application/x-www-form-urlencoded' \

        --data-urlencode 'nik=23454234' \
        --data-urlencode 'nama=Siti Nur aida' \
        --data-urlencode 'ttl=1996-09-29' \
        --data-urlencode 'alamat=lamongan' \
        --data-urlencode 'id_jabatan=3'
 ```
- delete : 
 ```bash 
 --location --request DELETE 'http://127.0.0.1:8085/karyawan/9' \
  ```        