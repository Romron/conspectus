Источники:
   https://github.com/HowProgrammingWorks/Index		Базовый курс инженерии программного обеспечения 
   https://nodejsdev.ru/      !!!!  полный рускоязычный справочник
   https://habr.com/ru/company/timeweb/blog/541452/
   node.js
      https://youtu.be/243pQXC5Ebs?si=MwYK7ccmULclv0Ze
   gulp
      https://lucasbatiiista.medium.com/configuring-gulp-browsersync-php-inside-server-3ee882c6a798


Термины:

Смежные области:


----------------------- T O D O  -----------------------  



----------------------- TO USE  -----------------------  

Node.js debugging       https://code.visualstudio.com/docs/nodejs/nodejs-debugging
   in setting.json      
      "debug.javascript.autoAttachFilter": "disabled",




----------------------- ТЕОРИЯ start -----------------------  
   вся информация о текущем node процесе в пепеменной process     https://nodejs.org/docs/latest/api/process.html#processargv
      process.argv возвращает массив, содержащий аргументы командной строки, переданные при запуске процесса Node.js
         console.log(process.argv);
      устновить свой флаг команде в консоли process.argv.includes('--my_flag');
         пример:
            const isDev = process.argv.includes('--dev');   // теперь если в консоли вводить любую команду с флагом --dev isDev будет true иначе false
----------------------- ТЕОРИЯ end ------------------------- 


----------------------- Практика start ---------------------


   Алгоритм использования 
      установить менеджер версий
         скачать https://github.com/coreybutler/nvm-windows/releases
      установить node.js
         nvm install node        // установит последнюю версию node 
         nvm install номер_версии    // установит указанную версию+
         для gulp-assembly нужна node v16.17.1
         
      использование разных версий      команды нужно вводить в cmd windows открытой с правами администратора(!!)
         nvm ls      // покажет все установленные версии
         nvm use номер_версии    // использовать указанную версию
            nvm use устанавливает нужную версию только для текущей оболочки. 
            Если вы измените оболочку, только что обновленная версия node.js будет потеряна.
         nvm alias default номер_версии      //определяет версию для использования по умолчанию
         nvm current    // покажет текущую версию
         nvm ls-remote     // покажет все доступные версии
         nvm run 10.15.0 app.js     // запустит указанное приложение с указанной версией node 
      npm
         По умолчанию в Windows особенно, в win10 и старше, запрещено выполнение неподписанных скриптов, 
            что препятствует работе npm. 
            Чтобы решить эту проблему, нужно изменить политику выполнения скриптов:
               Откройте PowerShell с правами администратора:
                  Нажмите Win + X и выберите Windows PowerShell (Admin) или PowerShell (Администратор)
               Проверьте текущую политику выполнения:
                  Get-ExecutionPolicy
                     Обычно она установлена на Restricted или RemoteSigned.
               Измените политику выполнения на RemoteSigned:
                  Set-ExecutionPolicy RemoteSigned
               
         установка npm старшие версии node не должны использовать более молодые версии npm 
            поэтому версии npm нужно устанавливать отдельно
               npm install -g npm@номер_версии 
         удалить модуль
            npm r mame_modul

         установка модулей
            локальная   только для данного проэкта
               npm init modul_name 
            глобальная  для того что бы была возможность обратится к данному модулю из командной строки в любом проэкте
               npm init modul_name -g


----------------------- Практика end -----------------------
   для PHP
      использовать proxy т.е. переадресовать запрос через другой сервер
      gulp 
         browserSync
            browserSync.init({
               proxy: "http://web/twily/gulp/"     
            });
         gulp-livereload       https://gist.github.com/vectorcode/62c299fe78d87451bf83
         https://lucasbatiiista.medium.com/configuring-gulp-browsersync-php-inside-server-3ee882c6a798
   Полезные команды
      npm ls -g --depth=0
         пакажет все модули установленные глобально


----------------------- Проблемы -- решения start ---------





----------------------- Проблемы -- решения end -----------








----------------------- ЧЕРНОВИК -----------------------






npm i copy-webpack-plugin@5.1.1

