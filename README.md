# testeci_anis_friyanti
declare this variable in .env in Frontend Project
APP_URL_WEB=http://127.0.0.1:8086/  *hostname frontend
APP_URL_API=http://127.0.0.1:8085/  *hostname Api 

1. Test 1
API :
curl --location --request GET 'http://127.0.0.1:8085/star?nominal=3&type=1' 
FRONTEND
http://127.0.0.1:8086/star
*masih minus type 3

2. Test 2
API :
curl --location --request GET 'http://127.0.0.1:8085/currency?money=20000' 
FRONTEND
 http://127.0.0.1:8086/currency

 3. Test 4

 karyawan
 API :
 read : curl --location --request GET 'http://127.0.0.1:8085/karyawan'\
add: curl --location --request POST 'http://127.0.0.1:8085/karyawan' \
        --form 'nik="96387423"' \
        --form 'nama="fatimah sari"' \
        --form 'ttl="2023-01-20"' \
        --form 'alamat="Jakarta TIMUR"' \
        --form 'id_jabatan="3"'


update : curl --location --request PUT 'http://127.0.0.1:8085/karyawan/9' \
        --header 'Content-Type: application/x-www-form-urlencoded' \

        --data-urlencode 'nik=23454234' \
        --data-urlencode 'nama=Siti Nur aida' \
        --data-urlencode 'ttl=1996-09-29' \
        --data-urlencode 'alamat=lamongan' \
        --data-urlencode 'id_jabatan=3'
delete : curl --location --request DELETE 'http://127.0.0.1:8085/karyawan/9' \        