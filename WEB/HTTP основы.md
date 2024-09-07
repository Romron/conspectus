Источники:  https://youtu.be/nQU5K0DbofE

Термины:
   Адресация
   Маска сети
Смежные области:



----------------------- ТЕОРИЯ start -----------------------
Адресация
   Интервал адресов для локальных сетей
      10.х.х.х
      172.16.х.х - 172.31.х.х
      192.168.х.х
   Интервал адресов для внутреннего использования
      127.0.0.х
Маска сети
мак адрес нужен только для соединения машин внутри локальных сетей

Виртуальные хосты       https://youtu.be/sMUGgozqrYo
   C:\Windows\System32\drivers\etc\hosts 
      127.0.0.1 имя сайта 
   apache\conf\extra\httpd-vhosts.conf
      <VirtualHost 127.0.0.1:80>
         ServerName имя сайта
         # ServerAlias альтернативные имена сайта через пробел
         DocumentRoot "D:/web"   абсолютный путь к папке сайта
         # ErrorLog "logs/dummy-host2.example.com-error.log"
         # CustomLog "logs/dummy-host2.example.com-access.log" common
      </VirtualHost>
      ## Настройки папки виртуального хоста
      # <Directory "имя сайта">
      #         # AllowOverride none
      #         AllowOverride All
      #         # Require all denied
      #         Require all granted 
      #         Options Indexes FollowSymLinks Includes ExecCGI
      # </Directory>
   apache\conf\httpd.conf
      <Directory />
         ##запрещает доступ к виртуальным хостам
         # Require all denied        
         ##разрешает доступ к виртуальным хостам
         Require all granted         
      </Directory>
   перезагрузить сервер
   доменное имя в брацузере   -->   
      обращение к DNS серверу(на локальной мошине это файл hosts) который возвращает IP  -->  
      на сервер приходит запрос по IP а на сервере записано что это IP связан с конкретной папкой на локальной машине

----------------------- ТЕОРИЯ end ------------------------- 


----------------------- Практика start ---------------------
Рабочий код из файла httpd-vhosts.conf при этом в httpd.conf нет ничего об этом хосте
   <VirtualHost 127.0.0.1:80>
      DocumentRoot "F:/web"
      ServerName web

      <Directory "F:/web">
         Options Indexes FollowSymLinks Includes ExecCGI
         AllowOverride All
         Require all granted
      </Directory>
   </VirtualHost>


   для настройки виртуального хоста Laragon
   для каждого из суб доменов в conf файлы laragon нужно прописать такой же блок
      <VirtualHost *:80>
         DocumentRoot "D:/web/multisite"
         ServerName multisite

         <Directory "D:/web/multisite">
            Options Indexes FollowSymLinks Includes ExecCGI
            AllowOverride All
            Require all granted
         </Directory>

        ErrorLog "D:/web/multisite/logs/multisite-error.log"
        CustomLog "D:/web/multisite/logs/multisite-access.log" common
      </VirtualHost>


   строки для файла .hosts
      127.0.0.1 multisite
      127.0.0.1 premium-theme-1.multisite



----------------------- Практика end -----------------------



----------------------- Проблемы -- решения start ---------

----------------------- Проблемы -- решения end -----------








----------------------- ЧЕРНОВИК -----------------------








