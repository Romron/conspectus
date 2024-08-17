
Источники:
   https://laravel.su/docs/8.x/blade#introduction



Смежные области:


----------------------- ТЕОРИЯ start -----------------------  
Blade – это 
   движок шаблонов, входящий в состав Laravel
   все шаблоны Blade компилируются в обычный PHP-код и кешируются 
Файлы шаблонов Blade используют расширение файла .blade.php 
   хранятся в каталоге resources/views
Шаблоны Blade могут быть возвращены из маршрутов или контроллера с помощью глобального помощника view. 
Данные могут быть переданы в шаблоны Blade, используя второй аргумент помощника view:
   Route::get('/', function () {
      return view('greeting', ['name' => 'Finn']);
   });
Отображение данных
   Для отображения данных, которые передаются в шаблоны Blade, 
      нужно заключить переменную в фигурные скобки 
      предворительно саздав маршрут !!!
         Route::get('/', function () {
               return view('welcome', ['name' => 'Samantha']);
            });
         Hello, {{ $name }}
   Дополнительное экранирование {{ что то }}
      нужно для предотвращения атак XSS при отображении данных
      т.к всё содержимое Blade автоматически отправляет через функцию htmlspecialchars PHP 
      для отмены этого:
         Hello, {!! $name !!}
   Отображать в шаблоне можно любые переменные переданные в шаблон(!)
   Также можете вывести результаты любой функции PHP
   Можно поместить любой PHP-код в выражение вывода Blade:
      The current UNIX timestamp is {{ time() }}.
   Blade и JavaScript фреймворки
      т.к. многие фреймворки JavaScript также используются «фигурные» скобки, 
      чтобы сообщить движку Blade, что выражение должно остаться нетронутым
      и отобразиться в браузере, нужно использовать символ @
         <h1>Laravel</h1>
         Hello, @{{ name }}
   Символ @ также используется для исключения из обработки директив Blade:
      {{-- Шаблон Blade --}}
         @@if()
      <!-- Вывод HTML -->
          @if()         
   Вывод JSON
      Иногда вы можете передать массив вашему шаблону с намерением отобразить его как JSON, 
      чтобы инициализировать переменную JavaScript. 
         Например:
            <script>
               var app = <?php echo json_encode($array); ?>;
            </script>
      Однако вместо ручного вызова json_encode, вы можете использовать метод 
         Illuminate\Support\Js::from. 
      Метод from принимает те же аргументы, что и функция PHP json_encode; 
         однако это гарантирует, что полученный JSON будет правильно экранирован для включения в кавычки HTML. 
      Метод from вернет строковый оператор JavaScript JSON.parse, 
         который преобразует данный объект или массив в допустимый объект:
            <script>
               var app = {{ Illuminate\Support\Js::from($array) }};
            </script>
      Последние версии приложения Laravel включают фасад Js, который обеспечивает удобный доступ к этой функции в ваших шаблонах Blade:
         <script>
            var app = {{ Js::from($array) }};
         </script>
      Вы должны использовать директиву Js::from только для отображения существующих переменных как JSON. 
         т.к. шаблонизатор Blade основан на регулярных выражениях то 
         попытки передать сложное выражение в директиву могут вызвать неожиданные сбои.
Директивы Blade это
   удобные псевдонимы для общих структур управления PHP, таких, как условные операторы и циклы 
   они обеспечивают очень чистый и лаконичный способ работы со структурами управления PHP, но при этом остаются схожими со своими аналогами PH
   @verbatim   для отображения большого количества переменные JavaScript 
      можно заключить HTML в директиву @verbatim
      тогдо не нужно добавлять префикс @ к каждому выражению вывода Blade:
         @verbatim
            <div class="container">
               Hello, {{ name }}.
            </div>
         @endverbatim
   @if, @elseif, @else, @endif
      работают так же, как и их аналоги в PHP:
         @if (count($records) === 1)
            I have one record!
         @elseif (count($records) > 1)
            I have multiple records!
         @else
            I don't have any records!
         @endif
   @unless
   @isset
      @isset($records)  // Переменная $records определена и не равна `null` ...
   @empty
      @empty($records)  // Переменная $records считается «пустой» ...
   @auth    пользователь аутентифицирован
      @auth
             // выполняется если пользователь аутентифицирован ...
      @endauth
   @guest   пользователь не аутентифицирован
      @guest
             // выполняется если пользователь не аутентифицирован ...
      @guest     
   @production проверяет запущено ли приложение в эксплуатационном окружении
      @production
         // Содержимое, отображаемое только в эксплуатационном окружении ...
      @endproduction
   @env приложение запущено в «переходном» окружении
      @env('staging')
         // выполняется если приложение запущено в «переходном» окружении ...
      @endenv
   @hasSection определяет, есть ли в секции наследуемого шаблона содержимое
      @hasSection('navigation')
         <div class="pull-right">
            @yield('navigation')
         </div>
         <div class="clearfix"></div>
      @endif
   @sectionMissing определяет, что в секции нет содержимого
      @sectionMissing('navigation')
         <div class="pull-right">
            @include('default-navigation')
         </div>
      @endif
   Switch
      могут быть созданы с использованием директив @switch, @case, @break, @default и @endswitch
         @switch($i)
            @case(1)
               First case...
               @break

            @case(2)
               Second case...
               @break

            @default
               Default case...
         @endswitch
   Циклы 
      работают так же, как и их аналоги в PHP
         @for ($i = 0; $i < 10; $i++)
            The current value is {{ $i }}
         @endfor

         @foreach ($users as $user)
            <p>This is user {{ $user->id }}</p>
         @endforeach

         @forelse ($users as $user)
            <li>{{ $user->name }}</li>
         @empty
            <p>No users</p>
         @endforelse

         @while (true)
            <p>I'm looping forever.</p>
         @endwhile
      Переменная Loop 
         доступна внутри цикла  
         обеспечивает доступ к информацию о цикле
            находитесь ли вы в первой или последней итерации цикла.
            @foreach ($users as $user)
               @if ($loop->first)
                  This is the first iteration.
               @endif

               @if ($loop->last)
                  This is the last iteration.
               @endif

               <p>This is user {{ $user->id }}</p>
            @endforeach
         во вложенном цикле, вы можете получить доступ к переменной $loop родительского цикла через свойство parent:
            @foreach ($users as $user)
               @foreach ($user->posts as $post)
                  @if ($loop->parent->first)
                        This is the first iteration of the parent loop.
                  @endif
               @endforeach
            @endforeach
      @continue и @break   почти так же, как и их аналоги в PHP
         Вы также можете включить в объявление директивы условие продолжения или прерывания:
            @foreach ($users as $user)
               @continue($user->type == 1)

               <li>{{ $user->name }}</li>

               @break($user->number == 5)
            @endforeach
   @class  осуществляет построение строки css-классов исходя из заданных условий
      принимает массив классов, где 
         ключ массива содержит класс или классы, которые вы хотите добавить, 
         значение является булевым выражением. 
      пример
         Если элемент массива имеет числовой ключ, он всегда будет включен в отрисованный список классов:
            @php
               $isActive = false;
               $hasError = true;
            @endphp

            <span @class([
               'p-4',
               'font-bold' => $isActive,
               'text-gray-500' => ! $isActive,
               'bg-red' => $hasError,
            ])></span>

            <span class="p-4 text-gray-500 bg-red"></span>
   @include для подключение дочерних шаблонов
      позволяет вам включать шаблоны из другого шаблона
      все переменные, доступные для родительского шаблона, 
         будут доступны для включенного шаблона:
            <div>
               @include('shared.errors')

               <form>
                  <!-- Form Contents -->
               </form>
            </div>
      также можно передать массив дополнительных данных, которые должны быть доступны для включенного шаблона:
         @include('view.name', ['status' => 'complete'])




----------------------- ТЕОРИЯ end -----------------------  
