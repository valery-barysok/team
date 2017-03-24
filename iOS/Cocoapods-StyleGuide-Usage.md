## Версионирование

Все версии pods не имеют версий в podfile. Механизм версионирования pods осуществляется через podfile.lock. Он не должен находиться в .gitignore проекта.

Пример: pod 'Alamofire'

## Общий вид podfile

```swift
source "https://github.com/CocoaPods/Specs.git"
source "https://github.com/TouchInstinct/Podspecs.git"

inhibit_all_warnings!
platform :ios, '9.0'
use_frameworks!

project 'MyProject', {
    'DebugConfiguration' => :debug, // Это пример конфигурации
    'ReleaseConfiguration' => :release // Это пример конфигурации
}

target "MyProject" do
    pod 'Alamofire' // Это пример pod
end
```

## Команда для обновления pods

Для начала необходимо создать alias для командной строки:
<br>
alias pi='pod install --repo-update'
<br>
Теперь данную команду можно использовать просто введя 'pi' в командной строке
<br>
<br>
Также есть еще один alias для verbose вывода
<br>
alias piv='pod install --repo-update --verbose'
<br>
Теперь данную команду можно использовать просто введя 'piv' в командной строке

## Для перманентного использования alias 

Скопируйте скрипт из https://github.com/TouchInstinct/Styleguide/blob/master/ios/Examples/Alias-piv_pi.md и вставьте в терминал.
