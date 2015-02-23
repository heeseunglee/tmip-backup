echo "* * * * * php $(pwd)/artisan scheduled:run 1>> /dev/null 2>&1" > cron.txt
crontab cron.txt