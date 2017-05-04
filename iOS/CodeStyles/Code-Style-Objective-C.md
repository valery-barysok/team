###Touch Instinct Objective-C Style Guide

####Данный гайд формализует основные соглашения по написанию базовых кодовых конструкций в компании Touch Instinct.

##Введение

* [Общая информация](#Общая-информация)
* [Синтаксис точки](#Синтаксис-точки)
* [Пробелы](#Пробелы)
* [Условия](#Условия)
* [Тернарный оператор](#Тернарный-оператор)
* [Методы](#Методы)
* [Переменные](#Переменные)
* [Наименования](#Наименования)
* [Комментарии](#Комментарии)
* [Литералы](#Литералы)
* [CGRect Функции](#CGRect-Функции)
* [Константы](#Константы)
* [Enum](#Enum)
* [Битовые маски](#Битовые-маски)
* [Наименование картинок](#Наименование-картинок)
* [Булевые](#Булевые)
* [Синглтон](#Синглтон)
* [Imports](#Imports)
* [API](#API)

## Общая информация

Максимальная длина кода в любой строке равно 100 символам. Большие методы переносим на строки ниже или разбиваем.

Максимальное количество строк в методе равно 40.

Отступы делаются длинной в 4 пробела. Не использовать табуляцию в качестве отступов.

## Синтаксис точки

Доступ через точку должен использоваться для доступа или изменения свойств. Скобки желательны во всех других случаях.

Например:

```objective-c
view.backgroundColor = [UIColor orangeColor];
[UIApplication sharedApplication].delegate;
```
Но не:
```objective-c
[view setBackgroundColor:[UIColor orangeColor]];
UIApplication.sharedApplication.delegate;
```
## Пробелы

Скобки в методах (if/else/switch/while etc.) всегда открыты на той же линии что и ключевое слово, но закрываются на новой строке.
Например:
```objective-c
if (user.isHappy) {
//Do something
} else if (developer.isHappy) {
//Do anything
} else {
//Do something else
}
```
Должна быть одна пустая строка между методами для повышения читаемости. 
@synthesize и @dynamic каждая должна быть на новой строке.

Правила касательно скобок также относятся и к методам.

Например:
```objective-c
- (void)foo {
    //Do something
}
```

## Условия

Условные операторы с единственной операцией внутри всегда должны находится в скобках, чтобы повысить читаемость и убрать возможные ошибки. Ошибки включают в себя такие как добавление второй строки после условия, и в данном случае она не будет входить в условие. Самый опасный вариант - при добавлении комментария, он будет входит в условие, а следующая строка нет.

Например:
```objective-c
if (!error) {
    return success;
}
```
Но не:
```objective-c
if (!error)
    return success;
```
и не
```objective-c
if (!error) return success;
```
## Тернарный оператор

Тернарный оператор, ? , должен быть использован когда это увеличивает читаемость кода. Только единичное условие оформляется с помощью тернарного оператора. Множественные условия не стоит делать в одну строку, либо несколько условий либо рефакторинг.

Например:
```objective-c
result = a > b ? x : y;
```
Но не:
```objective-c
result = a > b ? x = c > d ? c : d : y;
```

## Методы

В объявлении методов должен быть пробел после знаков -/+. Также должен быть пробел между частями метода.

Например:
```objective-c
- (void)setExampleText:(NSString *)text image:(UIImage *)image;
```
или
```objective-c
- (void)setExampleWithText:(NSString *)text andImage:(UIImage *)image;
```
## Переменные

Переменные должны быть названы максимально содержательно. Переменные с названием из одной буквы не должны использоваться за исключением счетчика в циклах (for).

Значок указателя показываем после пробела перед названием переменной, например:
```objective-c
NSString *text
```
но не 
```objective-c
NSString* text
```

или не 

```objective-c
NSString * text.
```

Описание свойств должно находиться отдельно скобок там где это возможно. 

Например:
```objective-c
@interface NYTSection: NSObject

@property (nonatomic) NSString *headline;

@end
```
Но не:
```objective-c
@interface NYTSection : NSObject {
    NSString *headline;
}
```

Модификаторы переменных (__strong, __weak, __unsafe_unretained, __autoreleasing) должны располагаться перед названием класса или перед названием переменной, например NSString * __weak text.

## Наименования

Длинные, понятные имена методов и переменных приветствуются. 

Например:
```objective-c
UIButton *settingsButton;
```
Но не
```objective-c
UIButton *setBut;
```

Свойства и локальные переменные должны начинаться с маленькой буквы. При @synthesize использовать андерскор перед названием.

Например:
```objective-c
@synthesize descriptiveVariableName = _descriptiveVariableName;
```
Но не:
```objective-c
id varnm;
```
## Комментарии

Когда они необходимы, комментарии должны использоваться для объяснения что конкретный кусок кода делает. Все комментарии должны быть актуальны либо удаляться.

Блочные комментарии использовать только для многострочных комментариев, либо при описании каких либо структур или запросов.

## Литералы

Например:
```objective-c
NSArray *names = @[@"Brian", @"Matt", @"Chris", @"Alex", @"Steve", @"Paul"];
NSDictionary *productManagers = @{@"iPhone" : @"Kate", @"iPad" : @"Kamal", @"Mobile Web" : @"Bill"};
NSNumber *shouldUseLiterals = @YES;
NSNumber *buildingZIPCode = @10018;
```
Но не:
```objective-c
NSArray *names = [NSArray arrayWithObjects:@"Brian", @"Matt", @"Chris", @"Alex", @"Steve", @"Paul", nil];
NSDictionary *productManagers = [NSDictionary dictionaryWithObjectsAndKeys: @"Kate", @"iPhone", @"Kamal", @"iPad", @"Bill", @"Mobile Web", nil];
NSNumber *shouldUseLiterals = [NSNumber numberWithBool:YES];
NSNumber *buildingZIPCode = [NSNumber numberWithInteger:10018];
```
## CGRect Функции

Например:
```objective-c
CGRect frame = self.view.frame;

CGFloat x = frame.origin.x;
CGFloat y = frame.origin.y;
CGFloat width = frame.size.width;
CGFloat height = frame.size.height;
```
Но не:
```objective-c
CGRect frame = self.view.frame;

CGFloat x = CGRectGetMinX(frame);
CGFloat y = CGRectGetMinY(frame);
CGFloat width = CGRectGetWidth(frame);
CGFloat height = CGRectGetHeight(frame);
```
## Константы

defines используем только для написания макросов препроцессора.

Например:
```objective-c
static NSString * const NYTAboutViewControllerCompanyName = @"The New York Times Company";

static const CGFloat NYTImageThumbnailHeight = 50.f;
```
Но не:
```objective-c
#define CompanyName @"The New York Times Company"

#define thumbnailHeight 2
```
## Enum

Пример:
```objective-c
typedef NS_ENUM(NSInteger, NYTAdRequestState) {
    NYTAdRequestStateInactive,
    NYTAdRequestStateLoading
};
```
## Битовые маски

Пример:
```objective-c
typedef NS_OPTIONS(NSUInteger, NYTAdCategory) {
  NYTAdCategoryAutos      = 1 << 0,
  NYTAdCategoryJobs       = 1 << 1,
  NYTAdCategoryRealState  = 1 << 2,
  NYTAdCategoryTechnology = 1 << 3
};
```

## Наименование картинок

Для картинок используем image assets, что позволит избежать суффиксов @2x и т.д. Название картинки должно содержать имя класса или свойства к которому оно относится плюс кастомные значения в зависимости от состояний свойств картинки (это может быть цвет, blur, нажатие, и т.д.).

Например:
```objective-c
RefreshBarButtonItem
RefreshBarButtonItemSelected 
ArticleNavigationBarWhite 
ArticleNavigationBarBlackSelected
```
Картинки которые используются в одном классе или для одинаковых целей должны быть сгруппированы в отдельных папках.

## Булевые

Если объект равен nil, то не имеет смысла сравнивать его с nil, так как готовый ответ можно получить проще. Не имеет смысла также сравнивать что-то с YES.

Например:
```objective-c
if (!someObject) {
}
```
Но не:
```objective-c
if (someObject == nil) {
}
```
Для BOOL, 2 примера:
```objective-c
if (isAwesome)
if (![someObject boolValue])
```
Но не:
```objective-c
if (isAwesome == YES) // Never do this.
if ([someObject boolValue] == NO)
```
Если имя BOOL выражается в виде прилагательного, то опционально опустить префикс "is", однако название должно быть смысловым.
```objective-c
@property (assign, getter=isEditable) BOOL editable;
```

## Синглтон

Объекты синглтона должны быть потокобезопасными при создании их единственного экземпляра.
```objective-c
//For .h file
+ (instancetype)alloc NS_UNAVAILABLE;
- (instancetype)init NS_UNAVAILABLE;
+ (instancetype)new NS_UNAVAILABLE;

//For .m file
static SingletonClass sharedObject = nil;

+ (void)initialize {
    sharedObject = [SingletonClass new];
}

+ (instancetype)sharedInstance {
    return sharedObject;
}
```

## Imports

В заголовочных (.h) файлах используем forward declaration (@class, @protocol) вместо import.

Если в файле присутствует более чем один import, то желательно группировать их по типу. Комментирование каждой группы опционально.

```objective-c
// Frameworks
@import QuartzCore;

// Models
#import "NYTUser.h"

// Views
#import "NYTButton.h"
#import "NYTUserView.h"
```

## API

#### Документация методов

Для методов api в моделях описания сетевого взаимодействия добавлять шапку к каждому методу в следующем формате: параметр, название, опциональность, тип и описание.

Например:
```objective-c
/**
 Method for create new user.
 
 TYPE POST
 
 Parameter  name          Is opt	Acc. Value	Description
 
 @param     first_name    no        string      customer's first name
 @param     last_name     yes       string      customer's last name
 @param     email         no        string      customer's email
 @param     avatar     	  yes       string      user's avatar URL
 @param     password      no        string      password
 */
 
- (void)registerWithUserName:(NSString*) userName
                       email:(NSString*) email
                 andPassword:(NSString*) password
                     success:(successBlock) success
                     failure:(errorBlock) failure;
 ```
 
 
