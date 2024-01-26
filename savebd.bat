SET JOUR=%date:~-10,2%
SET ANNEE=%date:~-4%
SET MOIS=%date:~-7,2%
SET HEURE=%time:~0,2%
SET MINUTE=%time:~3,2%
SET SECOND=%time:~-5,2%
IF "%time:~0,1%"==" " SET HEURE=0%HEURE:~1,1%
SET REPERTOIR=F:\BACKUP\
SET FICHIER=%REPERTOIR%\BD_%JOUR%_%MOIS%_%ANNEE%_A_%HEURE%_%MINUTE%.sql
SET FICHIER1=%REPERTOIR1%\Sauvegarde_de_mysql_du_%JOUR%_%MOIS%_%ANNEE%_A_%HEURE%_%MINUTE%.sql
IF NOT exist "%REPERTOIR%" md "%REPERTOIR%"
C:C:\wamp64\bin\mysql\mysql8.0.18\bin\mysqldump -u root -p -B isnak1785412> %FICHIER%;