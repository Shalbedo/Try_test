while !(docker exec -it api-platform-basic_database_1 mysql -uroot -ppassword --database=main -e "SELECT 1")
do
    echo 'Waiting for db to be ready'
    sleep 1
done
