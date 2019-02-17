 подправим файл etc/hosts // c:\Windows\System32\drivers\etc //

 127.0.0.1 agregator
127.0.0.1 pma.example.com

++
phpmyadmin: 
	image: phpmyadmin/phpmyadmin 
	environment: 
		PMA_ARBITRARY: 1 
		MYSQL_USER: homestead
		MYSQL_PASSWORD: secret 
		MYSQL_ROOT_PASSWORD: root 
	ports: - "80:80" 
	links: 
	# for mysql container - "db:db"

