@echo off

setlocal

REM Chemin d'accès de l'outil mysqldump
set mysqldump=C:\wamp64\bin\mysql\mysql8.0.18\bin\mysqldump.exe

REM Informations de la base de données
set db_name=isnak1785412
set db_user=root
set db_password=" "

REM Emplacement de la sauvegarde
set backup_path=C:\Sauvegardes\

REM Nom de fichier de sauvegarde
set backup_file=%db_name%_%date:~-4,4%%date:~-10,2%%date:~-7,2%.sql

REM Commande mysqldump pour sauvegarder la base de données
"%mysqldump%" --user=%db_user% --password=%db_password% --databases %db_name% > "%backup_path%%backup_file%"

echo Sauvegarde terminée