docker run --rm --volume "/c/Users/Pred0ta/Documents/Symphony/tp-p2019:/www" --link tpp2019_mysql_1:mysql tpp2019_cli php bin/console doctrine:schema:drop --force
docker run --rm --volume "/c/Users/Pred0ta/Documents/Symphony/tp-p2019:/www" --link tpp2019_mysql_1:mysql tpp2019_cli php bin/console doctrine:schema:create
docker run --rm --volume "/c/Users/Pred0ta/Documents/Symphony/tp-p2019:/www" --link tpp2019_mysql_1:mysql tpp2019_cli php bin/console hautelook_alice:doctrine:fixtures:load --no-interaction
