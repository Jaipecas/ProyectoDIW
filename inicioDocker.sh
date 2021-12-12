 #! /bin/bash

    cd laradock
    
    sudo docker-compose up -d nginx php-fpm mysql phpmyadmin workspace

    sudo docker-compose ps
    
 
