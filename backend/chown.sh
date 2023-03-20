# /bin/bash
chown -Rf 1000:1000 app/Models &&
chown -Rf 1000:1000 database &&
chown -Rf 1000:1000 app/Http &&
chmod -Rf 777 storage/logs
