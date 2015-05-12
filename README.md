# DateHour#

Classe que faz tratamento em data e hora.

### Recursos implementados ###

* Todos os recursos da classe DateTime
*  Implementado método checkdate($year, $day, $month)
*  Implementado método checkhour($hour, $minute, $second)
*  Implementado método sumDayUseful($dayToSum)
*  Implementado método getRecess($year)


### Tutorial ###

**Pegando todos os feriados do ano de 2014.**
```
#!php

<?php
include './DateHour.php';

echo '<pre>';
print_r( DateHour::getRecess(2014) ); 
```

Resultado:
```
#!php
Array
(
    [0] => 2014-01-01
    [1] => 2014-03-04
    [2] => 2014-04-18
    [3] => 2014-04-20
    [4] => 2014-04-21
    [5] => 2014-05-01
    [6] => 2014-06-19
    [7] => 2014-09-20
    [8] => 2014-10-12
    [9] => 2014-11-02
    [10] => 2014-11-15
    [11] => 2014-12-25
)
```


**Verificando se uma data é válida:**

```
#!php
<?php
include './DateHour.php';

echo (DateHour::checkdate(2014, 01, 12)) ? 'Data válida' : 'Data inválida';
```

Resultado:
```
#!php
Data válida
```

**Verificando se uma hora é válida:**

```
#!php
<?php
include './DateHour.php';

echo (DateHour::checkhour(23, 59, 59)) ? 'Hora válida' : 'Hora inválida';
```

Resultado:
```
#!php
Hora válida
```

**Somando 10 dias à data atual:**

```
#!php
<?php
include './DateHour.php';
// A data atual do teste foi 19/12/2015 13:42
echo DateHour::sumDayUseful(10)->format('d/m/Y H:i:s');
```

Resultado:
```
#!php
29/12/2014 14:13:42
```

**Somando 10 dias à data específica:**

```
#!php
<?php
include './DateHour.php';
echo DateHour::sumDayUseful(10, '2014-12-25')->format('d/m/Y H:i:s');
```

Resultado:
```
#!php
29/12/2014 14:19:14
```
