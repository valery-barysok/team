## Версионирование

Все версии pods не имеют версий в podfile. Механизм версионирования pods осуществляется через podfile.lock. Он не должен находиться в .gitignore проекта.

Пример: 

```swift
pod 'Alamofire'
```

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
```
alias pi='pod install --repo-update'
```
Теперь данную команду можно использовать просто введя 'pi' в командной строке.

Также есть еще один alias для verbose вывода:
```
alias piv='pod install --repo-update --verbose'
```
Теперь данную команду можно использовать просто введя 'piv' в командной строке.

## Для перманентного использования alias 

Скопируйте [скрипт](https://github.com/TouchInstinct/team/blob/master/iOS/Examples/Alias-piv_pi.md) и вставьте в командную строку.
