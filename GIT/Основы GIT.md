Источники:
https://git-scm.com/book/ru/v2
https://www.fandroid.info/shpargalka-po-komandam-git/
https://support.rdb24.com/hc/ru/articles/115000463769-%D0%9F%D1%80%D0%B0%D0%B2%D0%B8%D0%BB%D0%B0-%D1%81%D0%B8%D0%BD%D1%82%D0%B0%D0%BA%D1%81%D0%B8%D1%81%D0%B0-%D1%84%D0%B0%D0%B9%D0%BB%D0%B0-gitignore
!! https://devsday.ru/blog/details/11891
!! https://youtu.be/W4hoc24K93E полный курс !!!
https://youtu.be/NXNf9aYTCZ0?si=V2RCqNN814_lS7_B оформление read_me.md

----------- Теория start ----------
Переписывание истории https://www.atlassian.com/ru/git/tutorials/rewriting-history
commit --amend позволяет добавить новые проиндексированные изменения в последний коммит.
С помощью коммита --amend можно добавлять изменения в индекс Git или удалять таковые из него.
Если никаких изменений не проиндексировано, при использовании флага --amend вам все равно будет предложено изменить комментарий к последнему коммиту.
Будьте осторожны при использовании флага --amend с коммитами, доступными другим членам команды.
Изменение коммита, доступного другому пользователю, может привести к путанице и длительным устранениям конфликтов при слиянии.
позволяет объединить проиндексированные изменения с предыдущим коммитом без создания нового коммита
можно использовать для редактирования комментария к предыдущему коммиту без изменения состояния кода в нем
такое изменение не только редактирует последний коммит, но и полностью его заменяет. То есть измененный коммит станет новой сущностью с отдельной ссылкой
сценарии использования команды git commit --amend
Изменение комментария к последнему коммиту
git commit --amend
Допустим, при выполнении коммита вы допустили ошибку в комментарии к нему.
Выполнение этой команды в отсутствие проиндексированных файлов позволяет отредактировать комментарий к предыдущему коммиту без изменения состояния кода.
Добавление аргумента -m позволяет передать новый комментарий из командной строки, не открывая текстовый редактор.
git commit --amend -m "новое сообщение коммита"
Изменение файлов после коммита
Допустим что вы забыли добавить в коммит один из файлов.
Для того чтобы исправить эту ошибку, достаточно проиндексировать другой файл и выполнить коммит с флагом --amend: # Edit hello.py and main.py
git add hello.py
git commit # Realize you forgot to add the changes from main.py
git add main.py
git commit --amend --no-edit
Флаг --no-edit позволит внести изменения в коммит без изменения комментария к нему.
Итоговый коммит заменит неполный коммит.
При этом все будет выглядеть так, словно изменения в файлах hello.py и main.py были сделаны за один коммит.  
 git rebase изменения или объединения нескольких коммитов в новый базовый коммит
позволяет изменять историю, а интерактивное выполнение rebase «подчищает» за вами следы.
В стандартном режиме команда git rebase позволяет в буквальном смысле перезаписать историю:
она автоматически применяет коммиты в текущей рабочей ветке к указателю head переданной ветки.
Поскольку новые коммиты заменяют старые, команду git rebase запрещено применять к коммитам, которые стали доступны публично. Иначе история проекта исчезнет.
git reflog
git reflog master
содержит все предидущие значения master по умолчанию 30 дней
git reset отмена изменений, удаление коммитов https://youtu.be/DMncFUqzDuM
git reset флаг номер коммита на который нужно вернутся
git reset флаг без номера коммита подразумивается HEAD т.е. индекс здвигатся не будет но произойдёт очистка локального репозитория от незакоммиченных изменений
флаги:
--hard передвигает индекс (HEAD) текущей ветки на указанный коммит а весь последующий индекс отбрасывает (см. git reflog master)
в дальнейшем, при следующих коммитах, индекс будет наращивать ветку дальше
а старый коммит с которого был выполнен reset --hard будет в последствии удалён НО не сразу!
по этому с помощью команды git reflog master можно найти сторый удалённый коммит и перейти на него командой git reset флаг номер коммита
--soft передвигает индекс (HEAD) текущей ветки на указанный коммит но весь последующий индекс не трогает!
т.е. по факту отменяет сделанные ранее коммиты не удаляя изменений!
пртмер:
git reset --soft HEAD~2 // коммиты будут удалены но изменения останутся
git reset --hard HEAD~2 // удалить два последних коммита в локальном репозитории
git push --forse // удальть из удаённого репозитория те коммиты которые ранее были удалены из локального репозитория

----------- Теория end ----------

----------- Практика start ----------
Основные команды
git help -a
выводит все команды с описанием
git help comand*name почему то не работает!!
выводит описание команды
git add --all
добавить все файлы в индекс
git ls-tree -r repo_name --name-only
покажет все отслеживаемые файлы
git ls-files --others --exclude-standard
покажет все НЕ отслеживаемые файлы
git rm --cached -r <"path to file or folder">
удалить из репозитория
пример
Если вы добавили файл или папку в .gitignore, после того как они попали в репозиторий,
то их необходимо удалить из репозитория этой командой
Отменить изменения в отдельном файле https://qna.habr.com/q/126519
git checkout <имя*файла>
Отменить все локальные изменения https://tyapk.ru/blog/post/git-remove-local-changes
git reset --hard HEAD
Создать репозиторий
Локальный комп --> https://github.com
открыть терминал
перейти в нужный каталог
создать структуру Git репозитория
выполнить каманду:  
 $ git init
НО проект ещё не находится под версионным контролем
добавить под версионный контроль
если текущий коталог пуст
добавить в него файлы
добавить в индекс новые файлы
$ git add --all
осуществить первый коммит изменений
git commit

      https://github.com --> локальный комп

Клонировать репозитрий
git clone https://roman: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@github.com/Romron/full-sta-k.git
git clone https://roman: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@github.com/Romron/twily.git

      git clone https://rombt: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@github.com/Rombt/e-shop-clothes.git

Работа с ветками
https://git-scm.com/book/ru/v2/%D0%92%D0%B5%D1%82%D0%B2%D0%BB%D0%B5%D0%BD%D0%B8%D0%B5-%D0%B2-Git-%D0%A3%D0%BF%D1%80%D0%B0%D0%B2%D0%BB%D0%B5%D0%BD%D0%B8%D0%B5-%D0%B2%D0%B5%D1%82%D0%BA%D0%B0%D0%BC%D0%B8
Добавить глобальный текстовый редактор https://git-scm.com/book/ru/v2/%D0%9F%D1%80%D0%B8%D0%BB%D0%BE%D0%B6%D0%B5%D0%BD%D0%B8%D0%B5-C%3A-%D0%9A%D0%BE%D0%BC%D0%B0%D0%BD%D0%B4%D1%8B-Git-%D0%9D%D0%B0%D1%81%D1%82%D1%80%D0%BE%D0%B9%D0%BA%D0%B0-%D0%B8-%D0%BA%D0%BE%D0%BD%D1%84%D0%B8%D0%B3%D1%83%D1%80%D0%B0%D1%86%D0%B8%D1%8F
Visual Studio Code git config --global core.editor "code --wait"
Вернуть запрос пароля
запустить командную строку от имени администратора
git config --system --unset credential.helper
История коммитов https://youtu.be/1oExHLJXBIg
Удалить индекс а затем восстановить индекс до версии в последнем коммите:
del .git\index
git reset
Перемещение по истории коммитов  
 git log
выводит историю коммитов
git checkout хеш коомитта из истории
переход на выбранный коммит
git checkout ветка куда нужно перейти  
 прекращение просмотра истории и возврат на последний кооммит в указанной ветке
эта команда обязательна после просмотра истории для продолжении работы
возврат файла в состояние последнего коммта
если изменеия не зафиксированны до git add
git checkout --file_name
git checkout -- . // все файлы
после git add
git reset file_name (git reset . // все файлы)
git checkout --file_name (git checkout -- . // все файлы)
после git commit
git reset --hard HEAD~2 // удалить два последних коммита в локальном репозитории
git push --force // удальть из удаённого репозитория те коммиты которые ранее были удалены из локального репозитория

получить изменения из удалённого репозитория и в случае возникновения конфликтов автоматически применить изменения из удалённого репозитория
git pull --strategy-option theirs

для того чтобы слить изменения из ветки a в ветку b и в случае возникновения конфликтов
автоматически применить изменения из ветки a, можно использовать следующую последовательность команд:
git checkout b
git merge -X theirs a

Несколько аккаунтов на одном компьютере  
 источники:
https://docs.github.com/ru/account-and-profile/setting-up-and-managing-your-personal-account-on-github/managing-your-personal-account/managing-multiple-accounts#contributing-to-multiple-accounts-using-ssh-and-git_ssh_command
!! https://webhamster.ru/mytetrashare/index/mtb339/1573482054de7rhrq1mx
https://stackoverflow.com/questions/3860112/multiple-github-accounts-on-the-same-computer  
 строчки Host .... должна быть как в моём примере!!!
по протоколу https для обеих учетных записей
можно использовать разные personal access tokens для каждой учетной записи,
настроив Git для хранения разных учетных данных для каждого репозитория.
использовать диспетчера учетных данных get .helper
по протоколу SSH
настроить доступ по SSH для каждого аккаунта  
 только в GitBash!
создать ключ SSH
ssh-keygen -t ed25519 -C "rombtnet@gmail.com"
ssh-keygen -t ed25519 -C "romron@ukr.net"
включить SSH агент в фоне
$ eval "$(ssh-agent -s)"
добавить закрытый ключ SSH в ssh-agent
$ ssh-add ~/.ssh/id_ed25519_rombt
$ ssh-add ~/.ssh/id_ed25519_romron
добавить ключ в github https://docs.github.com/ru/authentication/connecting-to-github-with-ssh/adding-a-new-ssh-key-to-your-github-account
? проверка работоспособности работает не корректно!! кода две учётные записи нормально работают выдоёт ошибку!!
$ ssh -T git@github.com
? получить более полную информацию https://docs.github.com/ru/authentication/troubleshooting-ssh/error-permission-denied-publickey
$ ssh -vT git@github.com
./ssh/config рабочие примеры!!  
 Host Rombt.github.com  
 HostName github.com
IdentityFile ~/.ssh/id_ed25519_rombt # IdentitiesOnly yes # без этих строк тоже работает

            Host Romron.github.com
            HostName github.com
            IdentityFile ~/.ssh/id_ed25519_romron
            # IdentitiesOnly yes      # без этих строк тоже работает
         !!!клонировать репозиторий для SSH нужно добавлять username. после собаки и перед github !!!!
            git clone git@Rombt.github.com:Rombt/restaurant-site.git
            git clone git@Romron.github.com:Romron/laravel-0.git
            git clone git@Romron.github.com:Romron/phpOOP-0.git
            git clone git@Rombt.github.com:Rombt/CRM-Dashboard-Customers.git
            git clone git@Rombt.github.com:Rombt/impex-rombt.git
            git clone git@Rombt.github.com:Rombt/snippets.git
            git clone git@Rombt.github.com:Rombt/horizontal-menus.git
            git clone git@Rombt.github.com:Rombt/planeta-club.git
            git clone git@Rombt.github.com:Rombt/renoteck.git
            git clone git@Rombt.github.com:Rombt/timetracker.git
            git clone git@Rombt.github.com:Rombt/red-explorers.git

            git clone git@Rombt.github.com:Rombt/gulp-assembly.git
            git clone git@Rombt.github.com:Rombt/premium-theme-1.git


            git clone git@Rombt.github.com:Rombt/dvc.git
            git clone git@Rombt.github.com:Rombt/modi.git

            git clone git@Rombt.github.com:Rombt/sportfly.git



         my_repo/.git/config        рабочие примеры!!
            [remote "origin"]
               url = git@Romron.github.com:Romron/conspectus.git
            [user]
               name = Romron
               email = romron@ukr.net

---

----------- Практика end ----------

----------- Проблемы ----------

было
F:\web\twily>git rebase --continue
error: update_ref failed for ref 'refs/heads/main': cannot lock ref 'refs/heads/main': unable to resolve reference 'refs/heads/main'
error: could not update refs/heads/main
решение:
Worked for me, into terminal enter: (branch accordingly to your desires lul)
echo ref: refs/heads/master >.git/HEAD

nnn
